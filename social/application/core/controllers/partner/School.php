                                                                                                                                                                                                                                          <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('school_model');
        $this->load->model('users_model');
        $this->load->model('location_model');
        $this->load->model('city_model');
        $this->load->model('rfq_model');
        $this->load->model('association_model');
        $this->load->library('upload');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $this->outputData['notification'] = "";
        $partnerId = $this->session->userdata('login_id');
        $this->outputData['conversations'] = $this->school_model->getAllConversationsByPartnerid($partnerId);
        $this->outputData['info'] = $this->school_model->getSchoolInfo($partnerId);
        $this->outputData['ratings'] = $this->school_model->getSchoolRatings($partnerId);
        $this->outputData['members'] = $this->association_model->getAllMembers($partnerId);
        $this->load->view('partner/school_partner', $this->outputData);
    }

    public function publishRating($id) {
        if (!empty($id)) {
            $data = array(
                'status' => 1
            );
            $publish = $this->school_model->publishRating($data, $id);
            if ($publish == TRUE) {
                $this->session->set_flashdata('result', 'Published successfully.');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
        }
        $this->session->set_flashdata('activeTab', 'ratings');
        redirect('partner/school');
    }

    public function reviews() {
        $this->load->view('partner/review_company');
    }

    public function add_post() {
        $this->outputData['notification'] = "";
        $partnerId = $this->session->userdata('login_id');
        $this->form_validation->set_rules('comments', 'Comments', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partner/school_partner');
        } else {
            $mFile = $this->input->post('imageUpload');
            $mFileUniqueId = $this->uploadDocument('imageUpload', $mFile);

            $conversationInfo = array(
                'partner_id' => $partnerId,
                'comment' => $this->input->post('comments'),
                'attachment' => $mFileUniqueId,
            );
            
            if ($this->school_model->userConversations($conversationInfo)) {
                $this->outputData['notification'] = "Post addded successfully.";
            } else {
                $this->outputData['notification'] = "Please try again later!";
            }
            redirect('partner', $this->outputData);
        }
    }

    public function add_new() {
        $this->outputData['notification'] = "";
        $this->form_validation->set_rules('school_name', 'School Name', 'required');
        $this->form_validation->set_rules('school_address', 'Address', 'required');
        $this->form_validation->set_rules('school_location', 'Location', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', '');
        $this->form_validation->set_rules('pincode', 'Pincode', '');
        $this->form_validation->set_rules('country', 'Country', 'required');
        //$this->form_validation->set_rules('website', 'Website', 'required');
        $this->form_validation->set_rules('hyperlink', 'Hyperlink', 'required');
        $this->form_validation->set_rules('overview', 'Overview', 'required');
        $this->form_validation->set_rules('no_of_students', 'No Of Students', 'required');
        $this->form_validation->set_rules('salutation', 'Salutation', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('no_of_students', 'No Of Students', 'required|numeric');
        $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('contact_type', 'Phone Type', 'required');
        $this->form_validation->set_rules('area_code', 'Area Code', 'required');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        //$this->form_validation->set_rules('fax_type', 'Fax Type', 'required');
        //$this->form_validation->set_rules('fax_area_code', 'Fax Area Code', 'required');
        //$this->form_validation->set_rules('fax_contact', 'Fax Number', 'required');
        //$this->form_validation->set_rules('best_day', 'Best day to contact', 'required');
        //$this->form_validation->set_rules('best_time', 'Best time to contact', 'required');
        $this->form_validation->set_rules('group_description', 'Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partner/school_application');
        } else {
            $mLogo = $this->input->post('school_logo');
            $mLogoUniqueId = $this->uploadDocument('school_logo', $mLogo);

            $mProfile = $this->input->post('school_profile');
            $mProfileUniqueId = $this->uploadDocument('school_profile', $mProfile);

            $schoolInfo = array(
                'School_Name' => $this->input->post('school_name'),
                'Address' => $this->input->post('school_address'),
                'Location' => $this->input->post('school_location'),
                'City' => $this->input->post('city'),
                'State' => $this->input->post('state'),
                'Zip_Code' => $this->input->post('pincode'),
                'Country' => $this->input->post('country'),
                'Website' => $this->input->post('website'),
                'Video_Url' => $this->input->post('hyperlink'),
                'Overview' => $this->input->post('overview'),
                'No_Of_Students' => $this->input->post('no_of_students'),
                'group_description' => $this->input->post('group_description'),
                'Logo' => $mLogoUniqueId,
                'Profile' => $mProfileUniqueId,
                'Salutation' => $this->input->post('salutation'),
                'First_Name' => $this->input->post('first_name'),
                'Last_Name' => $this->input->post('last_name'),
                'Role' => $this->input->post('role'),
                'Email' => $this->input->post('email_id'),
                'Password' => md5($this->input->post('password')),
                'Phone_Type' => $this->input->post('contact_type'),
                'Phone_Area_Code' => $this->input->post('area_code'),
                'Phone_No' => $this->input->post('contact'),
                'Fax_Type' => $this->input->post('fax_type'),
                'Fax_Area_Code' => $this->input->post('fax_area_code'),
                'Fax_No' => $this->input->post('fax_contact'),
                'Best_Day' => json_encode($this->input->post('best_day')),
                'Best_Time' => json_encode($this->input->post('best_time')),
            );
            $shoolEnroll = $this->school_model->addSchool($schoolInfo);
            if ($shoolEnroll) {
                $communityInfo = array(
                    'Username' => $this->input->post('first_name'),
                    'Photo' => $mLogoUniqueId,
                    'Groupname' => $this->input->post('school_name'),
                    'group_description' => $this->input->post('group_description'),
                    'Partner_type' => "school",
                    'C_Id' => $shoolEnroll,
                );
                $this->association_model->addUserToCommunities($communityInfo);
                $this->session->set_flashdata('result', 'School Application has been submitted successfully!');
                $this->outputData['notification'] = "School Application has been submitted successfully!";
                redirect('partner/home/signIn');
            } else {
                $this->outputData['notification'] = "Please try again later!";
            }
            $this->load->view('partner/school_application', $this->outputData);
        }
    }

    public function getList() {
        $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
        $this->load->view('partner/school_list', $this->outputData);
    }

    public function edit($mId) {
        $this->outputData['city'] = $this->rfq_model->getAllCity();
        $this->outputData['states'] = $this->rfq_model->getAllStates();
        $this->outputData['states'] = $this->rfq_model->getAllStates();
        $this->outputData['countries'] = $this->rfq_model->getAllCountries();
        $this->outputData['notification'] = "";
        $this->outputData['mId'] = $mId;
        if ($_POST['edit_school']) {
            $this->outputData['notification'] = "";
            $this->form_validation->set_rules('school_name', 'School Name', 'required');
            $this->form_validation->set_rules('school_address', 'Address', 'required');
            $this->form_validation->set_rules('school_location', 'Location', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('state', 'State', '');
            $this->form_validation->set_rules('pincode', 'Pincode', '');
            $this->form_validation->set_rules('country', 'Country', 'required');
            //$this->form_validation->set_rules('website', 'Website', 'required');
            $this->form_validation->set_rules('hyperlink', 'Hyperlink', 'required');
            $this->form_validation->set_rules('overview', 'Overview', 'required');
            $this->form_validation->set_rules('no_of_students', 'No Of Students', 'required');
            $this->form_validation->set_rules('salutation', 'Salutation', 'required');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');
            $this->form_validation->set_rules('no_of_students', 'No Of Students', 'required|numeric');
            $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('role', 'Role', 'required');
            $this->form_validation->set_rules('contact_type', 'Phone Type', 'required');
            $this->form_validation->set_rules('area_code', 'Area Code', 'required');
            $this->form_validation->set_rules('contact', 'Contact', 'required');
            //$this->form_validation->set_rules('fax_type', 'Fax Type', 'required');
            //$this->form_validation->set_rules('fax_area_code', 'Fax Area Code', 'required');
            //$this->form_validation->set_rules('fax_contact', 'Fax Number', 'required');
            //$this->form_validation->set_rules('best_day', 'Best day to contact', 'required');
            //$this->form_validation->set_rules('best_time', 'Best time to contact', 'required');
            $this->form_validation->set_rules('group_description', 'Description', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('partner/school_edit', $this->outputData);
            } else {
                $school_info = $this->school_model->getSchoolInfo($mId);
                $mLogo = $this->input->post('school_logo');
                $mLogoUniqueId = $this->uploadDocument('school_logo', $mLogo);

                $mProfile = $this->input->post('school_profile');
                $mProfileUniqueId = $this->uploadDocument('school_profile', $mProfile);

                if (!empty($mProfileUniqueId)) {
                    $mEProfile = $mProfileUniqueId;
                } else {
                    $mEProfile = $school_info['Profile'];
                }

                if (!empty($mLogoUniqueId)) {
                    $mELogo = $mLogoUniqueId;
                } else {
                    $mELogo = $school_info['Logo'];
                }

                $schoolInfo = array(
                    'School_Name' => $this->input->post('school_name'),
                    'Address' => $this->input->post('school_address'),
                    'Location' => $this->input->post('school_location'),
                    'City' => $this->input->post('city'),
                    'State' => $this->input->post('state'),
                    'Zip_Code' => $this->input->post('pincode'),
                    'Country' => $this->input->post('country'),
                    'Website' => $this->input->post('website'),
                    'Video_Url' => $this->input->post('hyperlink'),
                    'Overview' => $this->input->post('overview'),
                    'No_Of_Students' => $this->input->post('no_of_students'),
                    'group_description' => $this->input->post('group_description'),
                    'Logo' => $mELogo,
                    'Profile' => $mEProfile,
                    'Salutation' => $this->input->post('salutation'),
                    'First_Name' => $this->input->post('first_name'),
                    'Last_Name' => $this->input->post('last_name'),
                    'Role' => $this->input->post('role'),
                    'Email' => $this->input->post('email_id'),
                    'Phone_Type' => $this->input->post('contact_type'),
                    'Phone_Area_Code' => $this->input->post('area_code'),
                    'Phone_No' => $this->input->post('contact'),
                    'Fax_Type' => $this->input->post('fax_type'),
                    'Fax_Area_Code' => $this->input->post('fax_area_code'),
                    'Fax_No' => $this->input->post('fax_contact'),
                    'Best_Day' => json_encode($this->input->post('best_day')),
                    'Best_Time' => json_encode($this->input->post('best_time')),
                );
                if ($this->school_model->updateSchool($schoolInfo, $mId)) {
                    $this->outputData['notification'] = "School Application has been updated successfully!";
                } else {
                    $this->outputData['notification'] = "Please try again later!";
                }
                $this->load->view('partner/school_edit', $this->outputData);
            }
        } else {
            $this->outputData['city'] = $this->rfq_model->getAllCity();
            $this->outputData['states'] = $this->rfq_model->getAllStates();
            $this->outputData['countries'] = $this->rfq_model->getAllCountries();
            $this->outputData['school_info'] = $this->school_model->getSchoolInfo($mId);
            $this->load->view('partner/school_edit', $this->outputData);
        }
    }

    public function uploadDocument($mId, $mFile) {
        $config['upload_path'] = './uploads/';
        //$config['file_name'] = basename($_FILES['uploadfile']['name']);
        $config['file_name'] = $mFile;
        $config['allowed_types'] = 'jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|.mp3|m4a|ogg|wav|mp4|m4v|mov|wmv';
        $config['overwrite'] = false;
        $config['encrypt_name'] = true;
        //$this->load->library('upload', $config);
        $this->upload->initialize($config);
        $data = array();
        if (!$this->upload->do_upload($mId)) {
            $mOutPut = $this->upload->data();
            $filename = "";
            $data['file_name'] = "";
            $data['result'] = 'fail';
            $data['message'] = $this->upload->display_errors();
        } else {
            $mOutPut = $this->upload->data();
            $filename = $mOutPut['file_name'];
            $data['file_name'] = $mOutPut['file_name'];
            $data['result'] = 'success';
            $data['message'] = 'file was uploaded fine';
            $data['error'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
        }
        return $filename;
    }

}
