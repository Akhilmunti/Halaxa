<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
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
        $this->load->model('school_model');
        $this->load->model('hotel_model');
        $this->load->model('users_model');
        $this->load->model('city_model');
        $this->load->model('rfq_model');
        $this->load->model('association_model');
        $this->load->model('influencer_model');
        $this->load->library('upload');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $partnerId = $this->session->userdata('login_id');
        $partnerKey = $this->session->userdata('partner_key');
        if (!empty($partnerId)) {
            $this->outputData['members'] = $this->association_model->getAllMembers($partnerKey);
            $this->outputData['scheduledMembers'] = $this->association_model->getAllScheduledMembers($partnerId);
            $this->outputData['partnerId'] = $partnerId;
            $this->outputData['countries'] = $this->rfq_model->getAllCountries();
            $this->load->view('partner/intern_circle', $this->outputData);
        } else {
            redirect('partner/home');
        }
    }

    public function shareSchedule($param) {
        $partnerId = $this->session->userdata('login_id');
        if ($partnerId) {
            if ($param) {
                $recruiters = $this->input->post('recruiters');
                $recruitersdata = array(
                    'Selected_recruiters' => json_encode($recruiters),
                );
                $action = $this->association_model->updateScheduledMember($recruitersdata, $param);
                if ($action == TRUE) {
                    $this->session->set_flashdata('result', 'Schedule shared successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong, Please try again.');
                }
                redirect('partner/members');
            } else {
                show_404();
            }
        } else {
            redirect('partner/home');
        }
    }
    
    public function acceptSchedule($param) {
        $partnerId = $this->session->userdata('login_id');
        if ($partnerId) {
            if ($param) {
                $recruitersdata = array(
                    'Flag' => 5,
                );
                $action = $this->association_model->updateScheduledMember($recruitersdata, $param);
                if ($action == TRUE) {
                    $this->session->set_flashdata('result', 'Schedule accepted successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong, Please try again.');
                }
                redirect('partner/members');
            } else {
                show_404();
            }
        } else {
            redirect('partner/home');
        }
    }
    
    public function rejectSchedule($param) {
        $partnerId = $this->session->userdata('login_id');
        if ($partnerId) {
            if ($param) {
                $recruitersdata = array(
                    'Flag' => 6,
                );
                $action = $this->association_model->updateScheduledMember($recruitersdata, $param);
                if ($action == TRUE) {
                    $this->session->set_flashdata('result', 'Schedule rejected successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong, Please try again.');
                }
                redirect('partner/members');
            } else {
                show_404();
            }
        } else {
            redirect('partner/home');
        }
    }

    public function addNegotiation($param) {
        $partnerId = $this->session->userdata('login_id');
        if ($partnerId) {
            if ($param) {
                $negotiationMessage = $this->input->post('negotiation');
                $negotiationdata = array(
                    'Negotiation' => trim($negotiationMessage),
                );
                $action = $this->association_model->updateScheduledMember($negotiationdata, $param);
                if ($action == TRUE) {
                    $this->session->set_flashdata('result', 'Negotiation message sent successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong, Please try again.');
                }
                redirect('partner/members');
            } else {
                show_404();
            }
        } else {
            redirect('partner/home');
        }
    }

    public function deleteMembers($id) {
        if (!empty($id)) {
            $action = $this->association_model->deleteScheduled($id);
            if ($action) {
                $this->session->set_flashdata('result', 'Ended.');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again.');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong, Please try again.');
        }
        redirect('partner/members');
    }

    public function inviteMembers() {
        $this->load->view('partner/intern_invite');
    }

    public function profile($id) {
        if (!empty($id)) {
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['user'] = $this->users_model->get_element_by($id);
            $user = $this->users_model->get_element_by($id);
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
            $data['irs_details'] = $this->irs_model->getIrsUserByEmail($user->Email);
            $userIrsId = $data['irs_details']['uuid'];
            if (!empty($userIrsId)) {
                $data['irs_jsd'] = $this->irs_model->getJobSeekerDataById($userIrsId);
            }
            $jobSeekerId = $data['irs_jsd']['id'];
            if (!empty($jobSeekerId)) {
                $data['irs_js_cer'] = $this->irs_model->getJobSeekerCerById($jobSeekerId);
            }
            $this->load->view('partner/profile_tab', $data);
        } else {
            show_404();
        }
    }

    public function addMembers() {
        $partnerId = $this->session->userdata('login_id');
        $partnerName = $this->session->userdata('login_name');
        if (!empty($partnerId)) {
            $members = $this->input->post('member');
            if ($members == NULL) {
                $this->session->set_flashdata('result', 'Please fill all the fields.');
                $this->load->view('partner/member_schedule');
            } else {
                foreach ($members as $key => $itemrow) {
                    $user = $this->users_model->get_user_by_id($itemrow[1]);
                    $userdata = array(
                        'P_Id' => $partnerId,
                        'School_name' => $partnerName,
                        'Schedule_name' => $this->input->post('schedule_name'),
                        'Type' => $this->input->post('type'),
                        'Intern_Type' => $itemrow[1],
                        'Intern_Name' => $user->Username,
                        'Country' => $itemrow[2],
                        'City' => $itemrow[4],
                        'Periodfrom' => $itemrow[5],
                        'Periodto' => $itemrow[6],
                    );
                    $this->association_model->addMembersToScheduled($userdata);
                }
                $this->session->set_flashdata('result', 'Schedule added Successfully.');
                redirect('partner/members');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong, Please try again.');
            redirect('partner/members');
        }
    }

    public function sendRequests() {
        $partnerId = $this->session->userdata('login_id');
        $partnerName = $this->session->userdata('login_name');
        if (!empty($partnerId)) {
            $invitemembers = $this->input->post('invitemember');
            if ($invitemembers == NULL) {
                $this->session->set_flashdata('result', 'Please fill all the fields.');
                redirect('partner/members/inviteMembers');
            } else {
                foreach ($invitemembers as $key => $itemrow) {
                    //$user = $this->users_model->get_user_by_id($itemrow[1]);
                    $this->load->library('email');
                    $config = array(
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'priority' => '1'
                    );
                    $this->email->initialize($config);
                    $this->email->from('info@foodlinked.co.in', 'Invitation from Foodlinked Partner');
                    $this->email->to($itemrow[1]);
                    $this->email->subject('Intern Invitation');
                    $messageLink = "https://foodlinked.com/social/login/addIntern/" . $partnerId;
                    $message = "
<html>
<head>
</head>
<body>
<h3>Dear $itemrow[1],</h3><br>
<a href='{$messageLink}'>Please Click here to become a intern!</a>
<h4>Thank you!</h4>
</body>
</html>";
                    $this->email->message($message);
                    $result = $this->email->send();
                }
                $this->session->set_flashdata('result', 'Interns invited Successfully.');
                redirect('partner/members/inviteMembers');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong, Please try again.');
            redirect('partner/members/inviteMembers');
        }
    }
    
    public function editMembers() {
        $partnerId = $this->session->userdata('login_id');
        $partnerName = $this->session->userdata('login_name');
        if (!empty($partnerId)) {
            $members = $this->input->post('member');
            if ($members == NULL) {
                $this->session->set_flashdata('result', 'Please fill all the fields.');
                $this->load->view('partner/member_schedule');
            } else {
                foreach ($members as $key => $itemrow) {
                    $user = $this->users_model->get_user_by_id($itemrow[1]);
                    $internInfo = $this->association_model->getCircleInfo($partnerId, $this->input->post('schedule_name'), $user->Username);
                    if($internInfo){
                        $userdata = array(
                            'P_Id' => $partnerId,
                            'School_name' => $partnerName,
                            'Schedule_name' => $this->input->post('schedule_name'),
                            'Type' => $this->input->post('type'),
                            'Intern_Type' => $itemrow[1],
                            'Intern_Name' => $user->Username,
                            'Country' => $itemrow[2],
                            'City' => $itemrow[4],
                            'Periodfrom' => $itemrow[5],
                            'Periodto' => $itemrow[6],
                        );
                        $this->association_model->updateScheduledMember($userdata, $internInfo['S_Id']);
                    }else{
                        $userdata = array(
                            'P_Id' => $partnerId,
                            'School_name' => $partnerName,
                            'Schedule_name' => $this->input->post('schedule_name'),
                            'Type' => $this->input->post('type'),
                            'Intern_Type' => $itemrow[1],
                            'Intern_Name' => $user->Username,
                            'Country' => $itemrow[2],
                            'City' => $itemrow[4],
                            'Periodfrom' => $itemrow[5],
                            'Periodto' => $itemrow[6],
                        );
                        $this->association_model->addMembersToScheduled($userdata);
                    }
                   
                }
                $this->session->set_flashdata('result', 'Schedule added Successfully.');
                redirect('partner/members');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong, Please try again.');
            redirect('partner/members');
        }
    }

}
