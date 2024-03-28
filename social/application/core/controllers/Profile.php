<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('rfq_model');
        $this->load->model('social_model');
        $this->load->model('users_model');
        $this->load->model('irs_model');
        $this->load->model('rfq_model');
        $this->load->model('product_model');
        $this->load->model('vendor_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('blogs_model');
        date_default_timezone_set('Asia/Calcutta');
        //error_reporting(0);
//        error_reporting(E_ALL);
//        ini_set('display_errors', 1);
        is_logged_in();
        error_reporting(0);
    }

    public function getStateByCountry() {
        $countryId = $this->input->post('location');
        if ($countryId != '') {
            if ($states = $this->irs_model->getCountryFilter(1, $countryId)) {
                $result = '<option>Select</option>';
                foreach ($states as $key => $state) {
                    $result = $result . "<option value='" . $state['location_id'] . "'>" . $state['name'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function getCityByState() {
        $stateId = $this->input->post('location');
        if ($stateId != '') {
            if ($states = $this->irs_model->getCountryFilter(3, $stateId)) {
                $result = '<option>Select</option>';
                foreach ($states as $key => $state) {
                    $result = $result . "<option value='" . $state['name'] . "'>" . $state['name'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function getCourseByType() {
        $typeId = $this->input->post('location');
        if ($typeId == "UG") {
            $typeId = 1004;
            $parentId = -1;
        }
        if ($typeId == "PPG") {
            $typeId = 1006;
            $parentId = -1;
        }
        if ($typeId == "PG") {
            $typeId = 1005;
            $parentId = -1;
        }
        if ($typeId != '') {
            if ($courses = $this->irs_model->getCourseFilter($typeId, $parentId)) {
                $result = '<option>Select</option>';
                foreach ($courses as $key => $course) {
                    $result = $result . "<option value='" . $course['id'] . "'>" . $course['value'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function getStreamByCourse() {
        $courseId = $this->input->post('location');
        if ($courseId != '') {
            if ($courses = $this->irs_model->getCourseStreamFilter($courseId)) {
                $result = '<option>Select</option>';
                foreach ($courses as $key => $course) {
                    $result = $result . "<option value='" . $course['value'] . "'>" . $course['value'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function index($id = NULL) {
        $loggedInId = $this->session->userdata('User_Id');
        if (!empty($id)) {
            $id = end($this->uri->segment_array());
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['user'] = $this->users_model->get_element_by($id);
            $data['inmailMessages'] = $this->users_model->getMessages($id);
            $data['logMessages'] = $this->users_model->getLogs($id);
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($id);
            $data['posts'] = $this->social_model->get_elements($id);
            $data['addresses'] = $this->users_model->get_address_by($id);
            $data['vendor_details'] = $this->users_model->get_vendor_details($id);
            $data['cities'] = $this->category_model->get_cities();
            $data['categories'] = $this->category_model->get_cats();
            $data['scategories'] = $this->subcategory_model->get_scats();
            $data['irs_details'] = $this->irs_model->getIrsUserByEmail($mEmail);
            $data['countries'] = $this->irs_model->getCountries();
            $userIrsId = $data['irs_details']['uuid'];
            if (!empty($userIrsId)) {
                $data['irs_jsd'] = $this->irs_model->getJobSeekerDataById($userIrsId);
            }
            $jobSeekerId = $data['irs_jsd']['id'];
            if (!empty($jobSeekerId)) {
                $data['job_seeker_id'] = $jobSeekerId;
                $data['irs_js_cer'] = $this->irs_model->getJobSeekerCerById($jobSeekerId);
                $data['irs_js_edu'] = $this->irs_model->getJobSeekerEduById($jobSeekerId);
                $data['irs_js_pro'] = $this->irs_model->getJobSeekerProById($jobSeekerId);
                $data['irs_js_exp'] = $this->irs_model->getJobSeekerExpById($jobSeekerId);
                if (!empty($data['irs_jsd'])) {
                    $jds = 50;
                }
                if (!empty($data['irs_js_cer'])) {
                    $cer = 20;
                }
                if (!empty($data['irs_js_edu'])) {
                    $pro = 10;
                }
                if (!empty($data['irs_js_pro'])) {
                    $edu = 10;
                }
                if (!empty($data['irs_js_exp'])) {
                    $exp = 10;
                }
                $data['total'] = $jds + $cer + $pro + $edu + $exp;
                if ($data['total'] == 50) {
                    $data['color'] = "green";
                } elseif ($data['total'] == 70) {
                    $data['color'] = "pink";
                } elseif ($data['total'] == 80) {
                    $data['color'] = "black";
                } elseif ($data['total'] == 90) {
                    $data['color'] = "yellow";
                } elseif ($data['total'] == 100) {
                    $data['color'] = "blue";
                }
            }
            $this->load->view('social/profile_tab_read', $data);
        } else {
            $id = $this->session->userdata('User_Id');
            $mEmail = $this->session->userdata('Email');
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['user'] = $this->users_model->get_element_by($id);
            $data['inmailMessages'] = $this->users_model->getMessages($id);
            $data['logMessages'] = $this->users_model->getLogs($id);
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($id);
            $data['posts'] = $this->social_model->get_elements($id);
            $data['addresses'] = $this->users_model->get_address_by($id);
            $data['vendor_details'] = $this->users_model->get_vendor_details($id);
            $data['cities'] = $this->category_model->get_cities();
            $data['categories'] = $this->category_model->get_cats();
            $data['scategories'] = $this->subcategory_model->get_scats();
            $data['irs_details'] = $this->irs_model->getIrsUserByEmail($mEmail);
            $data['countries'] = $this->irs_model->getCountries();
            $userIrsId = $data['irs_details']['uuid'];
            if (!empty($userIrsId)) {
                $data['irs_jsd'] = $this->irs_model->getJobSeekerDataById($userIrsId);
                $data['irs_recruit'] = $this->irs_model->getRecruitDataById($userIrsId);
            }
            $jobSeekerId = $data['irs_jsd']['id'];
            if (!empty($jobSeekerId)) {
                $data['job_seeker_id'] = $jobSeekerId;
                $data['irs_js_cer'] = $this->irs_model->getJobSeekerCerById($jobSeekerId);
                $data['irs_js_edu'] = $this->irs_model->getJobSeekerEduById($jobSeekerId);
                $data['irs_js_pro'] = $this->irs_model->getJobSeekerProById($jobSeekerId);
                $data['irs_js_exp'] = $this->irs_model->getJobSeekerExpById($jobSeekerId);
                if (!empty($data['irs_jsd'])) {
                    $jds = 50;
                }
                if (!empty($data['irs_js_cer'])) {
                    $cer = 20;
                }
                if (!empty($data['irs_js_edu'])) {
                    $pro = 10;
                }
                if (!empty($data['irs_js_pro'])) {
                    $edu = 10;
                }
                if (!empty($data['irs_js_exp'])) {
                    $exp = 10;
                }
                $data['total'] = $jds + $cer + $pro + $edu + $exp;
                if ($data['total'] == 50) {
                    $data['color'] = "green";
                } elseif ($data['total'] == 70) {
                    $data['color'] = "pink";
                } elseif ($data['total'] == 80) {
                    $data['color'] = "black";
                } elseif ($data['total'] == 90) {
                    $data['color'] = "yellow";
                } elseif ($data['total'] == 100) {
                    $data['color'] = "blue";
                }
            }
            $this->load->view('social/profile_tab', $data);
        }
    }

    public function addRecruiterDetails($job_seeker_id) {
        if (!empty($job_seeker_id)) {
            $jsData = $this->irs_model->getJobSeekerDataByJsId($job_seeker_id);
            if (!empty($jsData)) {
                $user_id = $jsData['userid'];
                $recruitData = $this->irs_model->getRecruitDataById($user_id);
                if (empty($recruitData)) {
                    $userdata = array(
                        'company' => $this->input->post('companyname'),
                    );
                    $updateUserData = $this->irs_model->updateUserdata($userdata, $user_id);
                    if ($updateUserData == TRUE) {
                        $str = rand();
                        $resultAddressId = sha1($str);
                        $addAddress = array(
                            'id' => $resultAddressId,
                            'pincode' => $this->input->post('pincode'),
                            'addline1' => $this->input->post('address'),
                        );

                        $addAddressData = $this->irs_model->addAddressInfo($addAddress);
                        if ($addAddressData == TRUE) {
                            $str = rand();
                            $resultId = sha1($str);
                            $data = array(
                                'id' => $resultId,
                                'company_type' => $this->input->post('companytype'),
                                'addressid' => $resultAddressId,
                                'website' => $this->input->post('website'),
                                'about' => $this->input->post('aboutcompany'),
                                'userid' => $user_id,
                            );
                            $updateJsData = $this->irs_model->addRecruitInfo($data);
                            if ($updateJsData == TRUE) {
                                $this->session->set_flashdata('result', 'Recruit data added successfully.');
                            } else {
                                $this->session->set_flashdata('result', 'Failed to update Job Seeker data.');
                            }
                        }
                    } else {
                        $this->session->set_flashdata('result', 'Failed to add data.');
                    }
                } else {
                    $userdata = array(
                        'company' => $this->input->post('companyname'),
                    );
                    $updateUserData = $this->irs_model->updateUserdata($userdata, $user_id);
                    if ($updateUserData == TRUE) {
                        $getAddress = $this->irs_model->getAddressDataById($recruitData['addressid']);

                        if ($getAddress['pincode'] == $this->input->post('pincode')) {
                            $pin = $getAddress['pincode'];
                        } else {
                            $pin = $this->input->post('pincode');
                        }

                        if ($getAddress['addline1'] == $this->input->post('address')) {
                            $add = $getAddress['addline1'];
                        } else {
                            $add = $this->input->post('address');
                        }

                        $addAddress = array(
                            'pincode' => $pin,
                            'addline1' => $add,
                        );

                        $updateAddressData = $this->irs_model->updateAddressdata($addAddress, $recruitData['addressid']);
                        if ($updateAddressData == TRUE) {
                            if ($recruitData['company_type'] == $this->input->post('companytype')) {
                                $ct = $recruitData['company_type'];
                            } else {
                                $ct = $this->input->post('companytype');
                            }

                            if ($recruitData['website'] == $this->input->post('website')) {
                                $website = $recruitData['website'];
                            } else {
                                $website = $this->input->post('website');
                            }

                            if ($recruitData['about'] == $this->input->post('aboutcompany')) {
                                $aboutcompany = $recruitData['about'];
                            } else {
                                $aboutcompany = $this->input->post('aboutcompany');
                            }

                            $data = array(
                                'company_type' => $ct,
                                'website' => $website,
                                'about' => $aboutcompany,
                            );
                            $updateJsData = $this->irs_model->updateRecruitdata($data, $user_id);
                            if ($updateJsData == TRUE) {
                                $this->session->set_flashdata('result', 'Recruit data updated successfully.');
                            } else {
                                $this->session->set_flashdata('result', 'Failed to update Job Seeker data.');
                            }
                        }
                    } else {
                        $this->session->set_flashdata('result', 'Failed to add data.');
                    }
                }
            }
            redirect('profile');
        } else {
            show_404();
        }
    }

    public function addJsPerData($job_seeker_id) {
        if (!empty($job_seeker_id)) {
            $jsData = $this->irs_model->getJobSeekerDataByJsId($job_seeker_id);
            if (!empty($jsData)) {
                $user_id = $jsData['userid'];
                $userdata = array(
                    'email' => $this->input->post('email'),
                    'name' => $this->input->post('name'),
                );

                $updateUserData = $this->irs_model->updateUserdata($userdata, $user_id);
                if ($updateUserData == TRUE) {
                    if ($jsData['about'] == $this->input->post('About')) {
                        $about = $updateUserData['about'];
                    } else {
                        $about = $this->input->post('About');
                    }

                    if ($jsData['website'] == $this->input->post('website')) {
                        $website = $updateUserData['website'];
                    } else {
                        $website = $this->input->post('website');
                    }

                    if ($jsData['permanent_address'] == $this->input->post('Address')) {
                        $permanent_address = $updateUserData['permanent_address'];
                    } else {
                        $permanent_address = $this->input->post('Address');
                    }

                    if ($jsData['show_to_employer'] == $this->input->post('ViewStatus')) {
                        $show_to_employer = $updateUserData['show_to_employer'];
                    } else {
                        $show_to_employer = $this->input->post('ViewStatus');
                    }

                    $jsdata = array(
                        'countryid' => $this->input->post('country'),
                        'gender' => $this->input->post('gender'),
                        'dob' => $this->input->post('DOB'),
                        'marital_status' => $this->input->post('email'),
                        'website' => $website,
                        'permanent_address' => $permanent_address,
                        'about' => $about,
                        'show_to_employer' => $show_to_employer,
                    );
                    $updateJsData = $this->irs_model->updateJsdata($jsdata, $job_seeker_id);
                    if ($updateJsData == TRUE) {
                        $this->session->set_flashdata('result', 'Personal data updated successfully.');
                    } else {
                        $this->session->set_flashdata('result', 'Failed to update Job Seeker data.');
                    }
                } else {
                    $this->session->set_flashdata('result', 'Failed to add data.');
                }
            }
            redirect('profile');
        } else {
            show_404();
        }
    }

    public function addJsExperienceData($job_seeker_id) {
        if (!empty($job_seeker_id)) {
            $str = rand();
            $resultId = sha1($str);
            $data = array(
                'id' => $resultId,
                'job_seeker_id' => $job_seeker_id,
                'designation' => $this->input->post('currentposition'),
                'employment_type' => $this->input->post('emplyment_type'),
                'package' => $this->input->post('current_package'),
                'yearfrom' => $this->input->post('yearfrom'),
                'yearto' => $this->input->post('yearto'),
                'company_nationality' => $this->input->post('Nationality'),
                'company_location' => $this->input->post('company_location'),
                'role_description' => $this->input->post('role_description'),
                'companyname' => $this->input->post('companyname'),
                'about_company' => $this->input->post('about_company'),
                'key_responsibilities' => $this->input->post('tags_2'),
            );
            $added = $this->irs_model->addExperienceInfo($data);
            if ($added == TRUE) {
                $this->session->set_flashdata('result', 'Experience data added successfully.');
            } else {
                $this->session->set_flashdata('result', 'Failed to add data.');
            }
            redirect('profile');
        } else {
            show_404();
        }
    }

    public function addJsProjectData($job_seeker_id) {
        if (!empty($job_seeker_id)) {
            $str = rand();
            $resultId = sha1($str);
            $data = array(
                'id' => $resultId,
                'job_seeker_id' => $job_seeker_id,
                'project_title' => $this->input->post('project_title'),
                'client_name' => $this->input->post('client_name'),
                'project_location' => $this->input->post('project_locat'),
                'project_details' => $this->input->post('project_abtprjct'),
                'team_size' => $this->input->post('team_size'),
                'role' => $this->input->post('role'),
                'skills_used' => $this->input->post('project_skilsused'),
                'duration' => $this->input->post('duration_from') . "-" . $this->input->post('duration_to'),
            );
            $added = $this->irs_model->addProjectInfo($data);
            if ($added == TRUE) {
                $this->session->set_flashdata('result', 'Project data added successfully.');
            } else {
                $this->session->set_flashdata('result', 'Failed to add data.');
            }
            redirect('profile');
        } else {
            show_404();
        }
    }

    public function addJsCertificateData($job_seeker_id) {
        if (!empty($job_seeker_id)) {
            $str = rand();
            $resultId = sha1($str);
            $data = array(
                'id' => $resultId,
                'job_seeker_id' => $job_seeker_id,
                'certificate_name' => $this->input->post('certificate_name'),
                'certificate_authority' => $this->input->post('certificate_authorization'),
                'license_no' => $this->input->post('license_no'),
                'certificate_url' => $this->input->post('certificate_url'),
                'fromdate' => $this->input->post('fromdate'),
                'todate' => $this->input->post('todate'),
            );
            $added = $this->irs_model->addCertificateInfo($data);
            if ($added == TRUE) {
                $this->session->set_flashdata('result', 'Certificate data added successfully.');
            } else {
                $this->session->set_flashdata('result', 'Failed to add data.');
            }
            redirect('profile');
        } else {
            show_404();
        }
    }

    public function addJsEduData($job_seeker_id) {
        if (!empty($job_seeker_id)) {
            $str = rand();
            $resultId = sha1($str);
            $courseID = $this->input->post('courses');
            $course = $this->irs_model->getCourseByid($courseID);
            $data = array(
                'id' => $resultId,
                'job_seeker_id' => $job_seeker_id,
                'course' => $course['value'],
                'year_from' => $this->input->post('yearfromeducation'),
                'year_to' => $this->input->post('yeartoeducation'),
                'medium' => $this->input->post('medium'),
                'education_type' => $this->input->post('educationtype'),
                'specialization' => $this->input->post('sub'),
                'university' => $this->input->post('university'),
                'country' => $this->input->post('countryAddEdu'),
                'state' => $this->input->post('stateAddEdu'),
                'city' => $this->input->post('cityAddEdu'),
            );
            $added = $this->irs_model->addEducationInfo($data);
            if ($added == TRUE) {
                $this->session->set_flashdata('result', 'Educational data added successfully.');
            } else {
                $this->session->set_flashdata('result', 'Failed to add data.');
            }
            redirect('profile');
        } else {
            show_404();
        }
    }

    public function user($id) {
        if (!empty($id)) {
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['user'] = $this->users_model->get_element_by($id);
            $data['inmailMessages'] = $this->users_model->getMessages($id);
            $data['logMessages'] = $this->users_model->getLogs($id);
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($id);
            $data['posts'] = $this->social_model->get_elements($id);
            $data['addresses'] = $this->users_model->get_address_by($id);
            $data['vendor_details'] = $this->users_model->get_vendor_details($id);
            $data['cities'] = $this->category_model->get_cities();
            $data['categories'] = $this->category_model->get_cats();
            $data['scategories'] = $this->subcategory_model->get_scats();
            $data['irs_details'] = $this->irs_model->getIrsUserByEmail($mEmail);
            $userIrsId = $data['irs_details']['uuid'];
            if (!empty($userIrsId)) {
                $data['irs_jsd'] = $this->irs_model->getJobSeekerDataById($userIrsId);
            }
            $jobSeekerId = $data['irs_jsd']['id'];
            if (!empty($jobSeekerId)) {
                $data['irs_js_cer'] = $this->irs_model->getJobSeekerCerById($jobSeekerId);
            }
            $this->load->view('social/profile_tab', $data);
        } else {
            show_404();
        }
    }

    public function buyer() {
        if ($id == NULL)
            $id = $this->session->userdata('User_Id');
        $data['locations'] = $this->rfq_model->getAllLocs();
        $data['user'] = $this->users_model->get_element_by($id);
        $data['inmailMessages'] = $this->users_model->getMessages($id);
        $data['logMessages'] = $this->users_model->getLogs($id);
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($id);
        $data['posts'] = $this->social_model->get_elements($id);
        $data['addresses'] = $this->users_model->get_address_by($id);
        $data['vendor_details'] = $this->users_model->get_vendor_details($id);
        $data['cities'] = $this->category_model->get_cities();
        $data['categories'] = $this->category_model->get_cats();
        $data['scategories'] = $this->subcategory_model->get_scats();
        $this->load->view('social/profile_buyer', $data);
    }

    public function vendor() {
        if ($id == NULL)
            $id = $this->session->userdata('User_Id');
        $data['locations'] = $this->rfq_model->getAllLocs();
        $data['user'] = $this->users_model->get_element_by($id);
        $data['inmailMessages'] = $this->users_model->getMessages($id);
        $data['logMessages'] = $this->users_model->getLogs($id);
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($id);
        $data['posts'] = $this->social_model->get_elements($id);
        $data['addresses'] = $this->users_model->get_address_by($id);
        $data['vendor_details'] = $this->users_model->get_vendor_details($id);
        $data['cities'] = $this->category_model->get_cities();
        $data['categories'] = $this->category_model->get_cats();
        $data['scategories'] = $this->subcategory_model->get_scats();
        $this->load->view('social/profile_vendor', $data);
    }

    public function recruiter() {
        if ($id == NULL)
            $id = $this->session->userdata('User_Id');
        $data['locations'] = $this->rfq_model->getAllLocs();
        $data['user'] = $this->users_model->get_element_by($id);
        $data['inmailMessages'] = $this->users_model->getMessages($id);
        $data['logMessages'] = $this->users_model->getLogs($id);
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($id);
        $data['posts'] = $this->social_model->get_elements($id);
        $data['addresses'] = $this->users_model->get_address_by($id);
        $data['vendor_details'] = $this->users_model->get_vendor_details($id);
        $data['cities'] = $this->category_model->get_cities();
        $data['categories'] = $this->category_model->get_cats();
        $data['scategories'] = $this->subcategory_model->get_scats();
        $this->load->view('social/profile_recruit', $data);
    }

    public function professional() {
        if ($id == NULL)
            $id = $this->session->userdata('User_Id');
        $data['locations'] = $this->rfq_model->getAllLocs();
        $data['user'] = $this->users_model->get_element_by($id);
        $data['inmailMessages'] = $this->users_model->getMessages($id);
        $data['logMessages'] = $this->users_model->getLogs($id);
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($id);
        $data['posts'] = $this->social_model->get_elements($id);
        $data['addresses'] = $this->users_model->get_address_by($id);
        $data['vendor_details'] = $this->users_model->get_vendor_details($id);
        $data['cities'] = $this->category_model->get_cities();
        $data['categories'] = $this->category_model->get_cats();
        $data['scategories'] = $this->subcategory_model->get_scats();
        $this->load->view('social/profile_pro', $data);
    }

    public function view($id = NULL) {
        if ($id == NULL)
            $id = $this->session->userdata('User_Id');
        $data['user'] = $this->users_model->get_element_by($id);
        $data['posts'] = $this->social_model->get_elements($id);
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $this->load->view('social/view-profile', $data);
    }

    public function edit($id) {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['user'] = $this->users_model->get_element_by($id);
        $this->load->view('social/profile-edit', $data);
    }

    public function edit_save($id) {
        $pic_err_flag = 0;
        $Photo = '';
        $pic_err = array();

        if ($_FILES['Photo']['name']) {
            $config['upload_path'] = './assets/photo';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('Photo')) {
                $error = array('error' => $this->upload->display_errors());
                $pic_err['error'] = $error;
                $pic_err_flag = 1;
            } else {
                $upload_data = $this->upload->data();
                $Photo = $upload_data['file_name'];
            }
        }

        if ($Photo == '')
            $Photo = $this->input->post('hidden_photo');

        $data = array(
            'Name' => $this->input->post('Name'),
            'Phone' => $this->input->post('Phone'),
            'Email' => $this->input->post('Email'),
            'Address' => $this->input->post('Address'),
            'Photo' => $Photo,
            'Modified_On' => date("Y-m-d H:m:s")
        );

        if ($pic_err_flag == 0) {
            if ($result = $this->users_model->update_element_byID($id, $data)) {
                $user = $this->users_model->get_element_by($id);
                $this->session->set_userdata('Username', $user->Username);
                $this->session->set_userdata('Name', $user->Name);
                $this->session->set_userdata('Photo', $user->Photo);
                $this->session->set_userdata('Company', $user->Company_name);
                $this->session->set_flashdata('result', 'User data updated successfully');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
        } else {
            $this->session->set_flashdata('result', 'Pic Not Uploaded');
        }
        redirect('profile');
    }

    public function addSellerDetails() {
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('companyname', 'companyname', 'required');
        $this->form_validation->set_rules('prelanguage', 'prelanguage', 'required');
        $this->form_validation->set_rules('deliveryaddress', 'deliveryaddress', 'required');
        if ($this->form_validation->run()) {
            // Date format conversion
            $mUserId = $this->session->userdata('User_Id');
            $mLegaldocs = $this->input->post('documents');
            $mLegalUniqueId = $this->uploadDocument('documents_legal', $mLegaldocs);
            $data = array(
                //here 1 is buyer type
                'User_Id' => $mUserId,
                'comapany_name' => $this->input->post('companyname'),
                'company_brief' => $this->input->post('companybrief'),
                'language' => $this->input->post('prelanguage'),
                'delivery_address' => $this->input->post('deliveryaddress'),
                'documents' => $mLegalUniqueId,
                'delivery_areas' => $this->input->post('deliveryAreas'),
                'payment_mode' => $this->input->post('card'),
                'categories' => json_encode($this->input->post('categories')),
                'scategories' => json_encode($this->input->post('subcategories')),
            );
            $this->users_model->addSellerInfo($data);
            $userData = $this->users_model->get_user_by_id($mUserId);
            $datadelivery = array(
                'User_Id' => $mUserId,
                'delivery_address' => $userData->delivery_address,
            );
            $this->users_model->add_delivery_address($datadelivery);
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['companyname'])) {
                $this->session->set_flashdata('companyname', $error['companyname']);
            }
            if (isset($error['companybrief'])) {
                $this->session->set_flashdata('companybrief', $error['companybrief']);
            }
            if (isset($error['prelanguage'])) {
                $this->session->set_flashdata('prelanguage', $error['prelanguage']);
            }
            if (isset($error['deliveryaddress'])) {
                $this->session->set_flashdata('deliveryaddress', $error['deliveryaddress']);
            }
        }
        $this->session->set_flashdata('result', 'Seller profile successfully updated');
        redirect('profile');
    }

    public function addCorporateDetails() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('companyname', 'companyname', 'required');
        $this->form_validation->set_rules('companybrief', 'companybrief', 'required');
        $this->form_validation->set_rules('prelanguage', 'prelanguage', 'required');
        $this->form_validation->set_rules('deliveryaddress', 'deliveryaddress', 'required');
        if ($this->form_validation->run()) {
            // Date format conversion
            $mUserId = $this->session->userdata('User_Id');
            $data = array(
                //here 1 is buyer type
                'User_Type' => "1",
                'Designation' => $this->input->post('designation'),
                'Company_name' => $this->input->post('companyname'),
                'Company_brief' => $this->input->post('companybrief'),
                'preferred_lang' => $this->input->post('prelanguage'),
                'delivery_address' => $this->input->post('deliveryaddress'),
                'category' => $this->input->post('Preferrence'),
                'payment_mode' => $this->input->post('card'),
                'Locations' => $this->input->post('locations'),
                'payment_structure' => $this->input->post('paymentstructure'),
            );
            $action = $this->users_model->updateUserInfo($data, $mUserId);
            $userData = $this->users_model->get_user_by_id($mUserId);
            $datadelivery = array(
                'User_Id' => $mUserId,
                'delivery_address' => $userData->delivery_address,
            );
            $this->users_model->add_delivery_address($datadelivery);
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['companyname'])) {
                $this->session->set_flashdata('companyname', $error['companyname']);
            }
            if (isset($error['companybrief'])) {
                $this->session->set_flashdata('companybrief', $error['companybrief']);
            }
            if (isset($error['prelanguage'])) {
                $this->session->set_flashdata('prelanguage', $error['prelanguage']);
            }
            if (isset($error['deliveryaddress'])) {
                $this->session->set_flashdata('deliveryaddress', $error['deliveryaddress']);
            }
        }
        $this->session->set_userdata('Company', $this->input->post('companyname'));
        $this->session->set_flashdata('result', 'Buyer corporate profile successfully updated');
        redirect('profile');
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
