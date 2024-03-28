<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rfq extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->model('rfq_model');
        $this->load->helper('download');
        $this->load->model('category_model');
        $this->load->model('users_model');
        $this->load->model('subcategory_model');
        $this->load->model('location_model');
        $this->load->model('city_model');
        $this->load->model('type_model');
        $this->load->model('vendor_model');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }

    public function index() {
        $data['sidebar'] = "viewrfq";
        $data['navbar'] = "buyer";
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            $mFilterRfqId = $this->input->post('rfq_id');
            $mFilterRfqStart = $this->input->post('rfq_start');
            $mFilterRfqStatus = $this->input->post('rfq_status');
            if ($mFilterRfqId || $mFilterRfqStart || $mFilterRfqStatus) {
                if ($mFilterRfqId) {
                    $mFilterRfqId = $mFilterRfqId;
                } else {
                    $mFilterRfqId = "";
                }
                if ($mFilterRfqStart) {
                    $mFilterRfqStart = $mFilterRfqStart;
                } else {
                    $mFilterRfqStart = "";
                }
                if ($mFilterRfqStatus) {
                    $mFilterRfqStatus = $mFilterRfqStatus;
                } else {
                    $mFilterRfqStatus = "";
                }
                $data['users'] = $this->rfq_model->getUsers();
                $data['user'] = $this->users_model->get_user_by_id($mUserId);
                $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
                $data['locations'] = $this->rfq_model->getAllLocs();
                $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
                $data['logMessages'] = $this->users_model->getLogs($mUserId);
                $data['categories'] = $this->rfq_model->getAllCategories();
                $data['rfqs'] = $this->rfq_model->getAllRFQsForFilter($mUserId, $mFilterRfqId, $mFilterRfqStart, $mFilterRfqStatus);
                $data['statusfilter'] = $mFilterRfqStatus;
                $mCorporate = $this->session->userdata('Company');
                if ($mCorporate == "") {
                    $this->load->view('buyer/homepage', $data);
                } else {
                    $this->load->view('buyer/rfq-list', $data);
                }
            } else {
                $data['users'] = $this->rfq_model->getUsers();
                $data['user'] = $this->users_model->get_user_by_id($mUserId);
                $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
                $data['locations'] = $this->rfq_model->getAllLocs();
                $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
                $data['logMessages'] = $this->users_model->getLogs($mUserId);
                $data['rfqs'] = $this->rfq_model->getAllRFQsByfavs($mUserId, "0");
                $data['categories'] = $this->rfq_model->getAllCategories();
                $mCorporate = $this->session->userdata('Company');
                if ($mCorporate == "") {
                    $this->load->view('buyer/homepage', $data);
                } else {
                    $this->load->view('buyer/rfq-list', $data);
                }
            }
        } else {
            redirect('social');
        }
    }

    public function bulkAction() {
        $data['sidebar'] = "viewrfq";
        $data['navbar'] = "buyer";
        $mUserId = $this->session->userdata('User_Id');
        $mUsername = $this->session->userdata('Name');
        if ($mUserId) {
            $mAction = $this->input->post('rfq_grp_action');
            $mSelectedRfqs = $this->input->post('select_rfq');
            if (!empty($mSelectedRfqs)) {
                if ($mAction == "1") {
                    foreach ($mSelectedRfqs as $key => $mSelectedRfq) {
                        $this->rfq_model->deletebyid($mSelectedRfq);
                    }
                    $this->session->set_flashdata('result', 'Successfully deleted selected RFQs.');
                } elseif ($mAction == "2") {
                    foreach ($mSelectedRfqs as $key => $mSelectedRfq) {
                        $data = array(
                            'cancel_rfq_status' => "1",
                        );
                        $this->rfq_model->updateRfqCancel($data, $mSelectedRfq);
                        $logData = array(
                            'log' => $mUsername . " Cancelled RFQ #" . $mSelectedRfq,
                            'User_Id' => $mUserId,
                        );
                        $this->users_model->add_log($logData);
                    }
                    $this->session->set_flashdata('result', 'Successfully cancelled selected RFQs.');
                }
            } else {
                $this->session->set_flashdata('result', 'Select RFQs to do a group action.');
            }
            redirect('buyer/rfq');
        } else {
            redirect('social');
        }
    }

    function download() {
        $this->load->helper('download');
        $data = file_get_contents(FCPATH . "user_files/admin/" . $this->uri->segment(3)); // Read the file's contents
        $name = $this->uri->segment(3);
        force_download($name, $data);
    }

    public function uploadTemplate() {
        $tempName = $this->input->post('template');
        $result = count($tempName);
        if (!empty($tempName)) {
            $result = $result . "<option value='" . print_r($tempName) . "'>" . print_r($tempName) . "</option>" . PHP_EOL;
            echo $result;
        } else {
            $result = "<option>No data</option>";
        }
    }

    public function create() {
        $id = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($id);
        $data['inmailMessages'] = $this->users_model->getMessages($id);
        $data['logMessages'] = $this->users_model->getLogs($id);
        $data['user'] = $this->users_model->get_element_by($id);
        $data['country'] = $data['user']->Locations;
        $data['types'] = $this->rfq_model->getAllTypes();
        $data['cities'] = $this->rfq_model->getAllCities();
        $data['locations'] = $this->rfq_model->getAllLocations();
        $data['addresses'] = $this->users_model->get_address_by($id);
        $data['countries'] = $this->rfq_model->getAllCountries();
        $data['items'] = $this->rfq_model->getAllItems();
        $data['uoms'] = $this->rfq_model->getAllUoms();
        $data['locs'] = $this->rfq_model->getAllLocs();
        $data['vendors'] = $this->rfq_model->getAllVendorsNew();
        $data['categories'] = $this->rfq_model->getAllCategories();
        $mCorporate = $this->session->userdata('Company');
        if ($mCorporate == "") {
            $this->load->view('buyer/homepage', $data);
        } else {
            $this->load->view('buyer/rfq-create', $data);
        }
    }

    public function getStateByCountry() {
        $countryName = $this->input->post('location');
        $country = $this->rfq_model->getCountryByName($countryName);
        $countryId = $country[0]['id'];
        if ($countryId != '') {
            if ($states = $this->rfq_model->getCityByLocation($countryId)) {
                $result = '<option selected="" value="" disabled="">Select States</option>';
                foreach ($states as $key => $state) {
                    $result = $result . "<option value='" . $state['id'] . "'>" . $state['name'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function getStateByCountrySign() {
        $countryName = $this->input->post('location');
        $country = $this->rfq_model->getCountryByName($countryName);
        $countryId = $country[0]['id'];
        if ($countryId != '') {
            if ($states = $this->rfq_model->getCityByLocation($countryId)) {
                $result = '<option selected="" value="" disabled="">Select States</option>';
                foreach ($states as $key => $state) {
                    $result = $result . "<option value='" . $state['name'] . "'>" . $state['name'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function getCityByCountry() {
        $countryName = $this->input->post('location');
        $country = $this->rfq_model->getCountryByName($countryName);
        $countryId = $country[0]['id'];
        if ($countryId != '') {
            if ($states = $this->rfq_model->getCityByLocation($countryId)) {
                $result = '<option selected="" value="" disabled="">Select</option>';
                foreach ($states as $key => $state) {
                    $result = $result . "<option value='" . $state['id'] . "'>" . $state['name'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function getCityByState() {
        $stateId = $this->input->post('state');
        if ($stateId != '') {
            if ($cities = $this->rfq_model->getCityByStates($stateId)) {
                $result = '<option selected="" value="" disabled="">Select Cities</option>';
                foreach ($cities as $key => $city) {
                    $result = $result . "<option value='" . $city['name'] . "'>" . $city['name'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function getCatByType() {
        $typeid = trim($this->input->post('type'));
        if ($typeid != '') {
            if ($cats = $this->rfq_model->getCatByType($typeid)) {
                $result = '<option selected="" value="" disabled="">Select</option>';
                foreach ($cats as $key => $cat) {
                    $result = $result . "<option value='" . $cat['CT_Id'] . "'>" . $cat['Category'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function getFoodlinkedUsers() {
        $typeid = trim($this->input->post('users'));
        if ($typeid != '') {
            if ($cats = $this->rfq_model->getUsers($typeid)) {
                $result = '<option selected="" value="" disabled="">Select</option>';
                foreach ($cats as $key => $cat) {
                    $result = $result . "<option value='" . $cat['Email'] . "'>" . $cat['Email'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function getSubCatByCat() {
        $catid = trim($this->input->post('category'));
        if ($catid != '') {
            if ($subcats = $this->rfq_model->getSubCatByCat($catid)) {
                $result = '<option selected="" value="" disabled="">Select</option>';
                foreach ($subcats as $key => $subcat) {
                    $result = $result . "<option value='" . $subcat['SCT_Id'] . "'>" . $subcat['Sub_Category'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }
    
    public function getSubCatByCatByName() {
        $catid = trim($this->input->post('category'));
        if ($catid != '') {
            $cat = $this->rfq_model->getCatByName($catid);
            if ($subcats = $this->rfq_model->getSubCatByCat($cat['CT_Id'])) {
                $result = '<option selected="" value="" disabled="">Select Category</option>';
                foreach ($subcats as $key => $subcat) {
                    $result = $result . "<option value='" . $subcat['Sub_Category'] . "'>" . $subcat['Sub_Category'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function cancelledRFQ() {
        $data['sidebar'] = "canrfq";
        $data['navbar'] = "buyer";
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            $mFilterRfqId = $this->input->post('rfq_id');
            $mFilterRfqStart = $this->input->post('rfq_start');
            $mFilterRfqStatus = $this->input->post('rfq_status');
            if ($mFilterRfqId || $mFilterRfqStart || $mFilterRfqStatus) {
                if ($mFilterRfqId) {
                    $mFilterRfqId = $mFilterRfqId;
                } else {
                    $mFilterRfqId = "";
                }
                if ($mFilterRfqStart) {
                    $mFilterRfqStart = $mFilterRfqStart;
                } else {
                    $mFilterRfqStart = "";
                }
                if ($mFilterRfqStatus) {
                    $mFilterRfqStatus = $mFilterRfqStatus;
                } else {
                    $mFilterRfqStatus = "";
                }
                $data['users'] = $this->rfq_model->getUsers();
                $data['locations'] = $this->rfq_model->getAllLocs();
                $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
                $data['logMessages'] = $this->users_model->getLogs($mUserId);
                $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
                $data['rfqs'] = $this->rfq_model->getAllCanRFQsForFilter($mUserId, $mFilterRfqId, $mFilterRfqStart, $mFilterRfqStatus);
                $data['categories'] = $this->rfq_model->getAllCategories();
                $mCorporate = $this->session->userdata('Company');
                $data['statusfilter'] = $mFilterRfqStatus;
                if ($mCorporate == "") {
                    $this->load->view('buyer/homepage', $data);
                } else {
                    $this->load->view('buyer/rfq-cancelled', $data);
                }
            } else {
                $data['users'] = $this->rfq_model->getUsers();
                $data['locations'] = $this->rfq_model->getAllLocs();
                $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
                $data['logMessages'] = $this->users_model->getLogs($mUserId);
                $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
                $data['rfqs'] = $this->rfq_model->getAllCancelledRfqs($mUserId);
                $data['categories'] = $this->rfq_model->getAllCategories();
                $mCorporate = $this->session->userdata('Company');
                if ($mCorporate == "") {
                    $this->load->view('buyer/homepage', $data);
                } else {
                    $this->load->view('buyer/rfq-cancelled', $data);
                }
            }
        } else {
            redirect('social');
        }
    }

    public function cancelledBulkAction() {
        $data['sidebar'] = "canrfq";
        $data['navbar'] = "buyer";
        $mUserId = $this->session->userdata('User_Id');
        $mUsername = $this->session->userdata('Name');
        if ($mUserId) {
            $mAction = $this->input->post('rfq_grp_action');
            $mSelectedRfqs = $this->input->post('select_rfq');
            if (!empty($mSelectedRfqs)) {
                if ($mAction == "1") {
                    foreach ($mSelectedRfqs as $key => $mSelectedRfq) {
                        $this->rfq_model->deletebyid($mSelectedRfq);
                    }
                    $this->session->set_flashdata('result', 'Successfully deleted selected RFQs.');
                } elseif ($mAction == "2") {
                    foreach ($mSelectedRfqs as $key => $mSelectedRfq) {
                        $data = array(
                            'cancel_rfq_status' => "1",
                        );
                        $this->rfq_model->updateRfqCancel($data, $mSelectedRfq);
                        $logData = array(
                            'log' => $mUsername . " Cancelled RFQ #" . $mSelectedRfq,
                            'User_Id' => $mUserId,
                        );
                        $this->users_model->add_log($logData);
                    }
                    $this->session->set_flashdata('result', 'Successfully cancelled selected RFQs.');
                }
            } else {
                $this->session->set_flashdata('result', 'Select RFQs to do a group action.');
            }
            redirect('buyer/rfq/cancelledRFQ');
        } else {
            redirect('social');
        }
    }

    public function create_submit() {
        $id = $this->session->userdata('User_Id');
        $username = $this->session->userdata('Name');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('types', 'type', 'required');
        $this->form_validation->set_rules('categories', 'category', 'required');
        $this->form_validation->set_rules('subcategories', 'sub-category', 'required');
        $this->form_validation->set_rules('startdate', 'start date', 'required');
        $this->form_validation->set_rules('enddate', 'end date', 'required');
        $this->form_validation->set_rules('location', 'location', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        //$this->form_validation->set_rules('deliveryaddress', 'delivery address', 'required');
        //$this->form_validation->set_rules('paymentmethod', 'payment method', 'required');
        $this->form_validation->set_rules('vendor_id[]', 'vendor', 'required');
        if ($this->form_validation->run()) {
            // Date format conversion
            $startdate = $this->input->post('startdate');

            $enddate = $this->input->post('enddate');

            $public = $this->input->post('public_rfq');

            $items = $this->input->post('iteminfo');

            $mModItems = array();
            foreach ($items as $key => $item) {
                $mTrimmed= array_slice($item, 0, 5, true);
                $mModItems[] = $mTrimmed;
            }

            $data = array(
                'User_Id' => $id,
                'T_Key' => $this->input->post('types'),
                'CT_Key' => $this->input->post('categories'),
                'SCT_Key' => $this->input->post('subcategories'),
                'Start' => $startdate,
                'End' => $enddate,
                'Location' => $this->input->post('location'),
                'State' => $this->input->post('state'),
                'City' => $this->input->post('city'),
                'Deliveryaddress' => "",
                'Paymentmethod' => $this->input->post('paymentmethod'),
                'itemsinfo' => json_encode($mModItems),
                'V_Ids' => json_encode($this->input->post('vendor_id')),
                'V_Public' => $public,
                'Created_On' => date("Y-m-d H:i:s"),
                'Modified_On' => date("Y-m-d H:i:s"),
            );
            if ($insertid = $this->rfq_model->addRfq($data)) {
                $logData = array(
                    'log' => $username . " Created new RFQ - ID : " . $insertid,
                    'User_Id' => $id,
                );
                $this->users_model->add_log($logData);
                if (isset($_FILES['Fichier1'])) {
                    $file1_name = $_FILES['Fichier1']['name'];
                    $file1_type = $_FILES['Fichier1']['type'];
                    $file1_tmp_name = $_FILES['Fichier2']['tmp_name'];

                    $file1 = $file1_name;
                    $fileToUpload = FCPATH . "user_files/rfq_files/" . $file1;
                    move_uploaded_file($file1_tmp_name, $fileToUpload);
                }

                if (isset($_FILES['Fichier2'])) {
                    $file1_name = $_FILES['Fichier2']['name'];
                    $file1_type = $_FILES['Fichier2']['type'];
                    $file1_tmp_name = $_FILES['Fichier2']['tmp_name'];

                    $file2 = $file1_name;
                    $fileToUpload = FCPATH . "user_files/rfq_files/" . $file2;
                    move_uploaded_file($file1_tmp_name, $fileToUpload);
                }

                if ($file1 != '' || $file2 != '') {
                    $keyName = $name = preg_replace('/\s+/', '_', $username . "_" . $insertid);
                    $files = array(
                        'file1' => $file1,
                        'file2' => $file2,
                        'RFQ_Key' => $keyName,
                    );
                    $this->rfq_model->updateRfqFileInfo($files, $insertid);
                } else {
                    $keyName = $name = preg_replace('/\s+/', '_', $username . "_" . $insertid);
                    $files = array(
                        'RFQ_Key' => $keyName,
                    );
                    $this->rfq_model->updateRfqFileInfo($files, $insertid);
                }
                $vendors = $this->input->post('vendor_id');
                foreach ($vendors as $value) {
                    $message = array(
                        'User_Id' => $id,
                        'message' => "A new RFQ with id #{$insertid} has been generated.",
                        'to_user' => $value,
                        'message_type' => "Logs",
                    );
                    $this->users_model->send_inmail($message);
                    $logData = array(
                        'log' => "A new RFQ with id #{$insertid} has been generated.",
                        'User_Id' => $id,
                    );
                    $this->users_model->add_log($logData);
                }
                $this->session->set_flashdata('result', 'RFQ submitted successfully');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            }
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['types'])) {
                $this->session->set_flashdata('types', $error['types']);
            }
            if (isset($error['categories'])) {
                $this->session->set_flashdata('categories', $error['categories']);
            }
            if (isset($error['subcategories'])) {
                $this->session->set_flashdata('subcategories', $error['subcategories']);
            }
            if (isset($error['startdate'])) {
                $this->session->set_flashdata('startdate', $error['startdate']);
            }
            if (isset($error['location'])) {
                $this->session->set_flashdata('location', $error['location']);
            }
            if (isset($error['city'])) {
                $this->session->set_flashdata('city', $error['city']);
            }
        }
        redirect('buyer/rfq');
    }

    public function deletebyid($id = null) {
        $userid = $this->session->userdata('User_Id');
        $username = $this->session->userdata('Name');
        if ($id != '') {
            if ($result = $this->rfq_model->deletebyid($id)) {
                $logData = array(
                    'log' => $username . " Deleted RFQ - ID : " . $id,
                    'User_Id' => $userid,
                );
                $this->users_model->add_log($logData);
                echo "success";
            } else {
                echo "Something wrong";
            }
        } else {
            echo "Something wrong";
        }
    }

    public function show($id) {
        if ($id != '') {
            if ($data['rfqdata'] = $this->rfq_model->getRfqById($id)) {
                $data['qoutes'] = $this->rfq_model->getAllQuoteationsByRfqId($id);
                $data['types'] = $this->rfq_model->getAllTypes();
                $data['cities'] = $this->rfq_model->getAllCities();
                $data['items'] = $this->rfq_model->getAllItems();
                $data['uoms'] = $this->rfq_model->getAllUoms();
                $data['locs'] = $this->rfq_model->getAllLocs();
                $data['vendors'] = $this->rfq_model->getAllVendors();
                $data['rfqid'] = $id;
                $mUserId = $this->session->userdata('User_Id');
                $data['users'] = $this->rfq_model->getUsers();
                $data['inmailMessages'] = $this->users_model->getMessages($id);
                $data['logMessages'] = $this->users_model->getLogs($id);
                $data['usersForMail'] = $this->rfq_model->getUsersForInmail($id);
                $rfqdata = $this->rfq_model->getRfqById($id);
                $ctkey = $rfqdata['CT_Key'];
                $sctkey = $rfqdata['SCT_Key'];
                $data['cat'] = $this->rfq_model->getCatById($ctkey);
                $data['scat'] = $this->rfq_model->getSCatById($sctkey);
                $this->load->view('buyer/rfq-show', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function cancelRfq($id) {
        $userid = $this->session->userdata('User_Id');
        $username = $this->session->userdata('Name');
        if ($id != '') {
            $data = array(
                'cancel_rfq_status' => "1",
            );
            $this->rfq_model->updateRfqCancel($data, $id);
            $logData = array(
                'log' => $username . " Cancelled RFQ #" . $id,
                'User_Id' => $userid,
            );
            $this->users_model->add_log($logData);
            $this->session->set_flashdata('requoteNot', 'RFQ Cancelled successfully.');
            redirect('buyer/rfq');
        } else {
            $this->session->set_flashdata('requoteNot', 'Something went wrong.');
            redirect('buyer/rfq');
        }
    }

    public function publicRFQ() {
        $data['sidebar'] = "publicrfq";
        $data['navbar'] = "buyer";
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            $mFilterRfqId = $this->input->post('rfq_id');
            $mFilterRfqStart = $this->input->post('rfq_start');
            $mFilterRfqStatus = $this->input->post('rfq_status');
            if ($mFilterRfqId || $mFilterRfqStart || $mFilterRfqStatus) {
                if ($mFilterRfqId) {
                    $mFilterRfqId = $mFilterRfqId;
                } else {
                    $mFilterRfqId = "";
                }
                if ($mFilterRfqStart) {
                    $mFilterRfqStart = $mFilterRfqStart;
                } else {
                    $mFilterRfqStart = "";
                }
                if ($mFilterRfqStatus) {
                    $mFilterRfqStatus = $mFilterRfqStatus;
                } else {
                    $mFilterRfqStatus = "";
                }
                $data['users'] = $this->rfq_model->getUsers();
                $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
                $data['logMessages'] = $this->users_model->getLogs($mUserId);
                $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
                $data['rfqs'] = $this->rfq_model->getAllPublicRFQsForFilter($mUserId, $mFilterRfqId, $mFilterRfqStart, $mFilterRfqStatus);
                $data['locations'] = $this->rfq_model->getAllLocs();
                $data['categories'] = $this->rfq_model->getAllCategories();
                $mCorporate = $this->session->userdata('Company');
                $data['statusfilter'] = $mFilterRfqStatus;
                if ($mCorporate == "") {
                    $this->load->view('buyer/homepage', $data);
                } else {
                    $this->load->view('buyer/rfq_public', $data);
                }
            } else {
                $data['users'] = $this->rfq_model->getUsers();
                $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
                $data['logMessages'] = $this->users_model->getLogs($mUserId);
                $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
                $data['rfqs'] = $this->rfq_model->getRfqByPublic($mUserId, "1");
                $data['locations'] = $this->rfq_model->getAllLocs();
                $data['categories'] = $this->rfq_model->getAllCategories();
                $mCorporate = $this->session->userdata('Company');
                if ($mCorporate == "") {
                    $this->load->view('buyer/homepage', $data);
                } else {
                    $this->load->view('buyer/rfq_public', $data);
                }
            }
        } else {
            redirect('social');
        }
    }

    public function publicBulkAction() {
        $data['sidebar'] = "publicrfq";
        $data['navbar'] = "buyer";
        $mUserId = $this->session->userdata('User_Id');
        $mUsername = $this->session->userdata('Name');
        if ($mUserId) {
            $mAction = $this->input->post('rfq_grp_action');
            $mSelectedRfqs = $this->input->post('select_rfq');
            if (!empty($mSelectedRfqs)) {
                if ($mAction == "1") {
                    foreach ($mSelectedRfqs as $key => $mSelectedRfq) {
                        $this->rfq_model->deletebyid($mSelectedRfq);
                    }
                    $this->session->set_flashdata('result', 'Successfully deleted selected RFQs.');
                } elseif ($mAction == "2") {
                    foreach ($mSelectedRfqs as $key => $mSelectedRfq) {
                        $data = array(
                            'cancel_rfq_status' => "1",
                        );
                        $this->rfq_model->updateRfqCancel($data, $mSelectedRfq);
                        $logData = array(
                            'log' => $mUsername . " Cancelled RFQ #" . $mSelectedRfq,
                            'User_Id' => $mUserId,
                        );
                        $this->users_model->add_log($logData);
                    }
                    $this->session->set_flashdata('result', 'Successfully cancelled selected RFQs.');
                }
            } else {
                $this->session->set_flashdata('result', 'Select RFQs to do a group action.');
            }
            redirect('buyer/rfq/publicRFQ');
        } else {
            redirect('social');
        }
    }

    public function reorder($id) {
        if ($id != '') {
            // get selected data
            if ($data['rfqdata'] = $this->rfq_model->getRfqById($id)) {
                $data['types'] = $this->rfq_model->getAllTypes();
                $data['cities'] = $this->rfq_model->getAllCities();
                $data['items'] = $this->rfq_model->getAllItems();
                $data['uoms'] = $this->rfq_model->getAllUoms();
                $data['locs'] = $this->rfq_model->getAllLocs();
                $data['vendors'] = $this->rfq_model->getAllVendors();
                $data['inmailMessages'] = $this->users_model->getMessages($id);
                $data['logMessages'] = $this->users_model->getLogs($id);
                $data['rfqid'] = $id;
                $rfqdata = $this->rfq_model->getRfqById($id);
                $ctkey = $rfqdata['CT_Key'];
                $sctkey = $rfqdata['SCT_Key'];
                $data['cat'] = $this->rfq_model->getCatById($ctkey);
                $data['scat'] = $this->rfq_model->getSCatById($sctkey);
                $this->load->view('buyer/rfq-reorder', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function update_submit($rfqid = null) {
        if ($rfqid != '') {
            $userid = $this->session->userdata('User_Id');
            $username = $this->session->userdata('Name');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('types', 'type', 'required');
            $this->form_validation->set_rules('categories', 'category', 'required');
            $this->form_validation->set_rules('subcategories', 'sub-category', 'required');
            $this->form_validation->set_rules('startdate', 'start date', 'required');
            $this->form_validation->set_rules('enddate', 'end date', 'required');
            $this->form_validation->set_rules('location', 'location', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');
            $this->form_validation->set_rules('deliveryaddress', 'delivery address', 'required');
            //$this->form_validation->set_rules('paymentmethod', 'payment method', 'required');
            $this->form_validation->set_rules('vendor_id[]', 'vendor', 'required');
            if ($this->form_validation->run()) {

// Date format conversion
                $startdate = $this->input->post('startdate');
                $date = DateTime::createFromFormat('m/d/Y', $startdate);
                $Start = $date->format('Y-m-d 00:00:00');

                $enddate = $this->input->post('enddate');
                $date = DateTime::createFromFormat('m/d/Y', $startdate);
                $End = $date->format('Y-m-d 00:00:00');

                $data = array(
                    'T_Key' => $this->input->post('types'),
                    'CT_Key' => $this->input->post('categories'),
                    'SCT_Key' => $this->input->post('subcategories'),
                    'Start' => $Start,
                    'End' => $End,
                    'Location' => $this->input->post('location'),
                    'City' => $this->input->post('city'),
                    'Deliveryaddress' => $this->input->post('deliveryaddress'),
                    'Paymentmethod' => $this->input->post('paymentmethod'),
                    'itemsinfo' => json_encode($this->input->post('iteminfo')),
                    'V_Ids' => json_encode($this->input->post('vendor_id')),
                    'Modified_On' => date("Y-m-d H:i:s"),
                );
                if ($this->rfq_model->updateRfq($data, $rfqid)) {
                    $logData = array(
                        'log' => $username . " Updated RFQ #" . $rfqid,
                        'User_Id' => $userid,
                    );
                    $this->users_model->add_log($logData);

                    $file1 = '';
                    $file2 = '';
                    if (isset($_FILES['Fichier1']) && !empty($_FILES['Fichier1']['name'])) {
                        $file1_name = $_FILES['Fichier1']['name'];
                        $file1_type = $_FILES['Fichier1']['type'];
                        $file1_tmp_name = $_FILES['Fichier1']['tmp_name'];

                        $file1 = $rfqid . "_file1_" . $file1_name;
                        $fileToUpload = FCPATH . "user_files/rfq_files/" . $file1;
                        move_uploaded_file($file1_tmp_name, $fileToUpload);
                    }

                    if (isset($_FILES['Fichier2']) && !empty($_FILES['Fichier2']['name'])) {
                        $file1_name = $_FILES['Fichier2']['name'];
                        $file1_type = $_FILES['Fichier2']['type'];
                        $file1_tmp_name = $_FILES['Fichier2']['tmp_name'];

                        $file2 = $rfqid . "_file2_" . $file1_name;
                        $fileToUpload = FCPATH . "user_files/rfq_files/" . $file2;
                        move_uploaded_file($file1_tmp_name, $fileToUpload);
                    }

                    if ($file1 != '' || $file2 != '') {
                        $files = array(
                            'file1' => $file1,
                            'file2' => $file2
                        );
                        $this->rfq_model->updateRfqFileInfo($files, $rfqid);
                    }

                    $this->session->set_flashdata('result', 'RFQ updated successfully');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                }
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            }
            redirect('buyer/rfq');
        } else {
            show_404();
        }
    }

}
