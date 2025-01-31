                                                                                                                                                                                                                                          <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('school_model');
        $this->load->model('hotel_model');
        $this->load->model('association_model');
        $this->load->model('influencer_model');
        $this->load->library('upload');
        $this->load->helper('date');
        //error_reporting(0);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $this->outputData['notification'] = "";
        $isLoggedIn = $this->session->userdata('login_id');
        $userType = $this->session->userdata('partner_type');
        if (!$isLoggedIn) {
            $this->load->view('partner/home');
        } else {
            if ($userType == "school") {
                $this->session->set_flashdata('active', 'dash');
                redirect('partner/school');
            } elseif ($userType == "hotel") {
                $this->session->set_flashdata('active', 'dash');
                redirect('partner/hotel');
            } else {
                $this->session->set_flashdata('active', 'dash');
                redirect('partner/association');
            }
        }
    }

    public function resetPassword() {
        $this->outputData['notification'] = "";
        $userType = $this->session->userdata('partner_type');
        $this->load->view('partner/reset_password', $this->outputData);
        //echo $userType;
    }

    public function reset($mId) {
        $this->outputData['notification'] = "";
        $userType = $this->session->userdata('partner_type');
        if (!empty($mId)) {
            if ($userType == "school") {
                $this->form_validation->set_rules('pPassword', 'Present Password', 'required');
                $this->form_validation->set_rules('nPassword', 'New Password', 'required');
                $this->form_validation->set_rules('cPassword', 'Confirm New Password', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->outputData['notification'] = "Validation Error";
                    $this->load->view('partner/reset_password', $this->outputData);
                } else {
                    $presentPassword = md5($this->input->post('pPassword'));
                    $newPassword = $this->input->post('nPassword');
                    $conPassword = $this->input->post('cPassword');
                    $userData = $this->school_model->getSchoolInfo($mId);
                    if ($presentPassword == $userData['Password']) {
                        if ($newPassword == $conPassword) {
                            $schoolInfo = array(
                                'Password' => md5($newPassword),
                            );
                            if ($this->school_model->updateSchool($schoolInfo, $mId)) {
                                $this->outputData['notification'] = "Password has been updated successfully!";
                            } else {
                                $this->outputData['notification'] = "Please try again later!";
                            }
                            $this->load->view('partner/reset_password', $this->outputData);
                        } else {
                            $this->outputData['notification'] = "New password and confirm password mismatch.";
                            $this->load->view('partner/reset_password', $this->outputData);
                        }
                    } else {
                        $this->outputData['notification'] = "Please enter correct present password.";
                        $this->load->view('partner/reset_password', $this->outputData);
                    }
                }
            } elseif ($userType == "hotel") {
                $this->form_validation->set_rules('pPassword', 'Present Password', 'required');
                $this->form_validation->set_rules('nPassword', 'New Password', 'required');
                $this->form_validation->set_rules('cPassword', 'Confirm New Password', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->outputData['notification'] = "Validation Error";
                    $this->load->view('partner/reset_password', $this->outputData);
                } else {
                    $presentPassword = md5($this->input->post('pPassword'));
                    $newPassword = $this->input->post('nPassword');
                    $conPassword = $this->input->post('cPassword');
                    $userData = $this->school_model->getSchoolInfo($mId);
                    if ($presentPassword == $userData['Password']) {
                        if ($newPassword == $conPassword) {
                            $hotelInfo = array(
                                'Password' => md5($newPassword),
                            );
                            if ($this->hotel_model->updateHotel($hotelInfo, $mId)) {
                                $this->outputData['notification'] = "Password has been updated successfully!";
                            } else {
                                $this->outputData['notification'] = "Please try again later!";
                            }
                            $this->load->view('partner/reset_password', $this->outputData);
                        } else {
                            $this->outputData['notification'] = "New password and confirm password mismatch.";
                            $this->load->view('partner/reset_password', $this->outputData);
                        }
                    } else {
                        $this->outputData['notification'] = "Please enter correct present password.";
                        $this->load->view('partner/reset_password', $this->outputData);
                    }
                }
            } else {
                $this->form_validation->set_rules('pPassword', 'Present Password', 'required');
                $this->form_validation->set_rules('nPassword', 'New Password', 'required');
                $this->form_validation->set_rules('cPassword', 'Confirm New Password', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->outputData['notification'] = "Validation Error";
                    $this->load->view('partner/reset_password', $this->outputData);
                } else {
                    $presentPassword = md5($this->input->post('pPassword'));
                    $newPassword = $this->input->post('nPassword');
                    $conPassword = $this->input->post('cPassword');
                    $userData = $this->school_model->getSchoolInfo($mId);
                    if ($presentPassword == $userData['Password']) {
                        if ($newPassword == $conPassword) {
                            $assInfo = array(
                                'Password' => md5($newPassword),
                            );
                            if ($this->association_model->updateAssociation($assInfo, $mId)) {
                                $this->outputData['notification'] = "Password has been updated successfully!";
                            } else {
                                $this->outputData['notification'] = "Please try again later!";
                            }
                            $this->load->view('partner/reset_password', $this->outputData);
                        } else {
                            $this->outputData['notification'] = "New password and confirm password mismatch.";
                            $this->load->view('partner/reset_password', $this->outputData);
                        }
                    } else {
                        $this->outputData['notification'] = "Please enter correct present password.";
                        $this->load->view('partner/reset_password', $this->outputData);
                    }
                }
            }
        } else {
            $this->load->view('partner/home');
        }
    }

    public function inviteMembers() {
        $this->load->view('partner/invite');
    }

    public function signIn() {
        $this->outputData['notification'] = "";
        $isLoggedIn = $this->session->userdata('login_id');
        $whoIsThis = $this->session->userdata('login_role');
        if (!$isLoggedIn) {
            $this->outputData['notification'] = "";
            $this->form_validation->set_rules('log_type', 'Login Type', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('partner/sign_in', $this->outputData);
            } else {
                $mEmail = $this->input->post('username');
                $mPassword = md5($this->input->post('password'));
                $mUserType = $this->input->post('log_type');
                if ($mUserType == "1") {
                    $mIsValid = $this->school_model->authenticateLogin($mEmail, $mPassword);
                    if ($mIsValid) {
                        $this->outputData['notification'] = "";
                        $partnerId = $this->session->userdata('login_id');
                        $this->outputData['conversations'] = $this->school_model->getAllConversationsByPartnerid($partnerId);
                        redirect('partner/school', $this->outputData);
                    } else {
                        $this->outputData['notification'] = "invalid credentials!!";
                        $this->load->view('partner/sign_in', $this->outputData);
                    }
                } else if ($mUserType == "2") {
                    $mIsValid = $this->hotel_model->authenticateLogin($mEmail, $mPassword);
                    if ($mIsValid) {
                        $this->outputData['notification'] = "";
                        $partnerId = $this->session->userdata('login_id');
                        $this->outputData['conversations'] = $this->school_model->getAllConversationsByPartnerid($partnerId);
                        redirect('partner/hotel', $this->outputData);
                    } else {
                        $this->outputData['notification'] = "invalid credentials!!";
                        $this->load->view('partner/sign_in', $this->outputData);
                    }
                } else if ($mUserType == "3") {
                    $mIsValid = $this->association_model->authenticateLogin($mEmail, $mPassword);
                    if ($mIsValid) {
                        $this->outputData['notification'] = "";
                        $partnerId = $this->session->userdata('login_id');
                        $this->outputData['conversations'] = $this->school_model->getAllConversationsByPartnerid($partnerId);
                        redirect('partner/association', $this->outputData);
                    } else {
                        $this->outputData['notification'] = "invalid credentials!!";
                        $this->load->view('partner/sign_in', $this->outputData);
                    }
                } else {
                    $this->outputData['notification'] = "Please select partner type!!";
                    $this->load->view('partner/sign_in', $this->outputData);
                }
//                else if ($mUserType == "4") {
//                    $checkUser = $this->influencer_model->getInfluencerInfoByEmail($mEmail);
//                    if (!empty($checkUser)) {
//                        $userStatus = $checkUser['influencer_status'];
//                        if ($userStatus == "1") {
//                            $mIsValid = $this->influencer_model->authenticateLogin($mEmail, $mPassword);
//                            if ($mIsValid) {
//                                $this->outputData['notification'] = "";
//                                redirect('social');
//                            } else {
//                                $this->outputData['notification'] = "Influencer not approved by the admin.";
//                                $this->load->view('partner/sign_in', $this->outputData);
//                            }
//                        } else {
//                            $this->outputData['notification'] = "Influencer not approved by the admin.";
//                            $this->load->view('partner/sign_in', $this->outputData);
//                        }
//                    } else {
//                        $this->outputData['notification'] = "Influencer not found.";
//                        $this->load->view('partner/sign_in', $this->outputData);
//                    }
//                }
            }
        } else {
            redirect('partner');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('partner/home');
    }

}
