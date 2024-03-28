<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('association_model');
        $this->load->library('email');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }

    public function index() {
        $pic_err_flag = 0;
        if ($this->input->post()) {
            $this->load->library('form_validation');
            //$this->form_validation->set_rules('Name', 'Name', 'required');
            $this->form_validation->set_rules(
                    'Username', 'Username', 'required|is_unique[user_signup.Username]', array(
                'is_unique' => 'Registration not Successfull. %s already exists.'
                    )
            );
            $this->form_validation->set_rules('Password', 'Password', 'required');
            if ($this->form_validation->run()) {
                $checkEmailExist = $this->users_model->check_email_exist($this->input->post('Email'));
                if ($checkEmailExist) {
                    $this->session->set_flashdata('Error', 'Failed. Email already exists.');
                    $this->load->view('social/register');
                } else {
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

                    $data = array(
                        'Name' => $this->input->post('Username'),
                        'Username' => $this->input->post('Username'),
                        'Password' => md5($this->input->post('Password')),
                        'Phone' => $this->input->post('Phone'),
                        'Email' => $this->input->post('Email'),
                        'Address' => $this->input->post('Address'),
                        'Photo' => $Photo,
                        'social' => "1",
                        'Created_On' => date("Y-m-d H:m:s")
                    );

                    if ($pic_err_flag == 0) {
                        if ($insertid = $this->users_model->add_user($data)) {
                            if (!empty($insertid)) {
                                $logData = array(
                                    'log' => $this->input->post('Username') . " created a new account",
                                    'User_Id' => $insertid,
                                );
                                $this->users_model->add_log($logData);
                                $this->load->library('email');
                                $config = array(
                                    'mailtype' => 'html',
                                    'charset' => 'utf-8',
                                    'priority' => '1'
                                );
                                $this->email->initialize($config);
                                $this->email->from('info@foodlinked.co.in', 'Foodlinked Social');
                                $this->email->to($checkEmailExist->Email);
                                $this->email->subject('Thanks for registering with Foodlinked Social!!');
                                $this->email->message("Thank you:" . $this->input->post('Name'));
                                $result = $this->email->send();
                            }
                            $this->session->set_flashdata('Sucess', 'User added successfully');
                        } else {
                            $this->session->set_flashdata('Error', 'Failed. Something went wrong.');
                        }
                    } else {
                        $this->session->set_flashdata('PicError', 'Pic Not Uploaded');
                    }
                    $data['left_content'] = "network";
                    $this->load->view('social/login_new_halaxa', $pic_err);
                }
            } else {
                $data['left_content'] = "network";
                $this->load->view('social/login_new_halaxa', $data);
            }
        } else {
            $data['left_content'] = "network";
            $this->load->view('social/login_new_halaxa', $data);
        }
    }

    public function irs_login($path) {
        is_logged_in();

        $url;

        if (URL_JOB_SEEKER_JOBS === $path) {

            $data['user'] = $this->users_model->get_element_by($this->session->userdata('User_Id'));

            $Username = $data['user']->Username;

            $userid = $data['user']->Email;

            $token = $data['user']->Password;

            if (strpos($path, URL_EMPLOYER) !== false) {

                $role = strtoupper(URL_EMPLOYER);
            } else if (strpos($path, URL_JOB_SEEKER) !== false) {

                $role = strtoupper(URL_JOB_SEEKER);
            } else if (strpos($path, URL_IRS_HOME) !== false) {

                $role = strtoupper(URL_IRS_HOME); //"USERS";//
            }

            $method = explode("/", $path)[1];

            $url = URL_JOB . "users/create_user?name=$Username&userid=$userid&role=$role&path=$method&token=$token";


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            //curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $data = curl_exec($ch);

            if (curl_errno($ch)) {
                print "Error: " . curl_error($ch);
            }
        }
    }

    public function login() {
        $Username = $this->input->post('Username');
        $Password = md5($this->input->post('Password'));
        $check = $this->checkEmail($Username);
        if ($check) {
            $res = $this->users_model->loginbyemail($Username, $Password);
            if ($res) {
                if ($res->Status == "0") {
                    $this->session->set_flashdata('Error', 'Account has been disabled by admin.');
                    redirect('login');
                } else {
                    $this->session->set_userdata('Username', $res->Username);
                    $this->session->set_userdata('User_Id', $res->User_Id);
                    $this->session->set_userdata('Name', $res->Name);
                    $this->session->set_userdata('Photo', $res->Photo);
                    $this->session->set_userdata('Company', $res->Company_name);
                    $logData = array(
                        'log' => $res->Username . " Logged in successfully",
                        'User_Id' => $res->User_Id,
                    );
                    $this->users_model->add_log($logData);
                    $this->irs_login('job_seeker/jobs');
                    redirect('social');
                }
            } else {
                $this->session->set_flashdata('Error', 'Incorrect Email or password');
                redirect('login');
            }
        } else {
            $res = $this->users_model->login($Username, $Password);
            if ($res) {
                if ($res->Status == "0") {
                    $this->session->set_flashdata('Error', 'Account has been disabled by admin.');
                    redirect('login');
                } else {
                    $this->session->set_userdata('Username', $res->Username);
                    $this->session->set_userdata('User_Id', $res->User_Id);
                    $this->session->set_userdata('Name', $res->Name);
                    $this->session->set_userdata('Photo', $res->Photo);
                    $this->session->set_userdata('Company', $res->Company_name);
                    $logData = array(
                        'log' => $res->Username . " Logged in successfully",
                        'User_Id' => $res->User_Id,
                    );
                    $this->users_model->add_log($logData);
                    $this->irs_login('job_seeker/jobs');
                    redirect('social');
                }
            } else {
                $this->session->set_flashdata('Error', 'Incorrect username or password');
                redirect('login');
            }
        }
    }

    function checkEmail($email) {
        if (strpos($email, '@') !== false) {
            $split = explode('@', $email);
            return (strpos($split['1'], '.') !== false ? true : false);
        } else {
            return false;
        }
    }

    public function forgotPassword() {
        $this->load->view('social/forgot_password');
    }

    public function facebook() {
        $postData = json_decode($_POST['userData']);
        $checkUserFbstatus = $this->users_model->checkFbUser($postData->id);
        if ($checkUserFbstatus != "") {
            $this->session->set_userdata('Username', $checkUserFbstatus->Username);
            $this->session->set_userdata('User_Id', $checkUserFbstatus->User_Id);
            $this->session->set_userdata('Name', $checkUserFbstatus->Name);
            $this->session->set_userdata('Photo', $checkUserFbstatus->Photo);
            $this->session->set_userdata('Company', $checkUserFbstatus->Company_name);
            $result = "true";
            echo $result;
        } else {
            $result = "false";
            echo $result;
        }
    }

    public function linkedin() {
        $userData = json_decode($_POST['userData']);
        if (!empty($userData)) {
            $oauth_uid = $userData->id;
            $checkUserLinkedinstatus = $this->users_model->checkLinkedinUser($oauth_uid);
            if (!empty($checkUserLinkedinstatus)) {
                $this->session->set_userdata('Username', $checkUserLinkedinstatus->Username);
                $this->session->set_userdata('User_Id', $checkUserLinkedinstatus->User_Id);
                $this->session->set_userdata('Name', $checkUserLinkedinstatus->Name);
                $this->session->set_userdata('Photo', $checkUserLinkedinstatus->Photo);
                $this->session->set_userdata('Company', $checkUserLinkedinstatus->Company_name);
                $result = "true";
                echo $result;
            } else {
                $result = "Something went wrong, please try again later.";
                echo $result;
            }
        } else {
            $result = "Something went wrong, please try again later.";
            echo $result;
        }
    }

    public function google() {
        $userData = json_decode($_POST['userData']);
        if (!empty($userData)) {
            $oauth_uid = $userData->id;
            $checkUserFbstatus = $this->users_model->checkGplusUser($oauth_uid);
            if (!empty($checkUserFbstatus)) {
                $this->session->set_userdata('Username', $checkUserFbstatus->Username);
                $this->session->set_userdata('User_Id', $checkUserFbstatus->User_Id);
                $this->session->set_userdata('Name', $checkUserFbstatus->Name);
                $this->session->set_userdata('Photo', $checkUserFbstatus->Photo);
                $this->session->set_userdata('Company', $checkUserFbstatus->Company_name);
                $result = "true";
                echo $result;
            } else {
                $result = "Something went wrong, please try again later.";
                echo $result;
            }
        } else {
            $result = "Something went wrong, please try again later.";
            echo $result;
        }
    }

    public function fbReg() {
        $postData = json_decode($_POST['userData']);
        if (!empty($postData)) {
            $checkUserFbstatus = $this->users_model->checkFbUser($postData->id);
//            $userData['oauth_provider'] = $_POST['oauth_provider'];
//            $userData['oauth_uid'] = $postData->id;
//            $userData['first_name'] = $postData->first_name;
//            $userData['last_name'] = $postData->last_name;
//            $userData['email'] = $postData->email;
//            $userData['gender'] = $postData->gender;
//            $userData['locale'] = $postData->locale;
//            $userData['cover'] = $postData->cover->source;
//            $userData['picture'] = $postData->picture->data->url;
//            $userData['link'] = $postData->link;
            if (!empty($checkUserFbstatus)) {
                if (!empty($checkUserFbstatus)) {
                    $this->session->set_userdata('Username', $checkUserFbstatus->Username);
                    $this->session->set_userdata('User_Id', $checkUserFbstatus->User_Id);
                    $this->session->set_userdata('Name', $checkUserFbstatus->Name);
                    $this->session->set_userdata('Photo', $checkUserFbstatus->Photo);
                    $this->session->set_userdata('Company', $checkUserFbstatus->Company_name);
                } else {
                    $result['status'] = 'Whoops! Incorrect Email & Password. Please try again';
                }
            } else {
                $checkEmailExist = $this->users_model->check_email_exist($postData->email);
                if ($checkEmailExist) {
                    $this->session->set_flashdata('Error', 'Email already exists');
                } else {
                    $data = array(
                        'Name' => $postData->first_name,
                        'Username' => $postData->first_name . $postData->last_name,
                        'Email' => $postData->email,
                        'Created_On' => date("Y-m-d H:m:s"),
                        //here 2 is facebook user
                        'Signup_Through' => "2",
                        'social' => "1",
                        'FB_Id' => $postData->id
                    );
                    $insertid = $this->users_model->add_user($data);
                    if ($insertid) {
                        $logData = array(
                            'log' => $postData->first_name . $postData->last_name . " Registered through Facebook.",
                            'User_Id' => $insertid,
                        );
                        $this->users_model->add_log($logData);
                        $this->load->library('email');
                        $config = array(
                            'mailtype' => 'html',
                            'charset' => 'utf-8',
                            'priority' => '1'
                        );
                        $this->email->initialize($config);
                        $this->email->from('info@foodlinked.co.in', 'Foodlinked Social');
                        $this->email->to($checkEmailExist->Email);
                        $this->email->subject('Thanks for registering with Foodlinked Social!!');
                        $this->email->message("Thank you:" . $this->input->post('Name'));
                        $result = $this->email->send();
                        $this->session->set_flashdata('Error', 'Added Successfully');
                    } else {
                        $this->session->set_flashdata('Error', 'Something went wrong');
                    }
                }
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function googleReg() {
        $userData = json_decode($_POST['userData']);
        if (!empty($userData)) {
            $oauth_uid = !empty($userData->id) ? $userData->id : '';
            $checkUserGooglestatus = $this->users_model->checkGplusUser($oauth_uid);
            $first_name = !empty($userData->name->givenName) ? $userData->name->givenName : '';
            $last_name = !empty($userData->name->familyName) ? $userData->name->familyName : '';
            $email = !empty($userData->emails[0]->value) ? $userData->emails[0]->value : '';
            if (!empty($checkUserGooglestatus)) {
                $this->session->set_userdata('Username', $checkUserGooglestatus->Username);
                $this->session->set_userdata('User_Id', $checkUserGooglestatus->User_Id);
                $this->session->set_userdata('Name', $checkUserGooglestatus->Name);
                $this->session->set_userdata('Photo', $checkUserGooglestatus->Photo);
                $this->session->set_userdata('Company', $checkUserGooglestatus->Company_name);
                $result = 'logged';
                echo $result;
            } else {
                $checkEmailExist = $this->users_model->check_email_exist($email);
                if ($checkEmailExist) {
                    $result = "email";
                    echo $result;
                } else {
                    $data = array(
                        'Name' => $first_name,
                        'Username' => $first_name . $last_name,
                        'Email' => $email,
                        'Created_On' => date("Y-m-d H:m:s"),
                        //here 3 is gplus user
                        'Signup_Through' => "3",
                        'social' => "1",
                        'GPlus_Id' => $oauth_uid
                    );
                    $insertid = $this->users_model->add_user($data);
                    if ($insertid) {
                        $logData = array(
                            'log' => $first_name . $last_name . " Registered through Google.",
                            'User_Id' => $insertid,
                        );
                        $this->users_model->add_log($logData);
                        $this->load->library('email');
                        $config = array(
                            'mailtype' => 'html',
                            'charset' => 'utf-8',
                            'priority' => '1'
                        );
                        $this->email->initialize($config);
                        $this->email->from('info@foodlinked.co.in', 'Foodlinked Social');
                        $this->email->to($checkEmailExist->Email);
                        $this->email->subject('Thanks for registering with Foodlinked Social!!');
                        $this->email->message("Thank you:" . $this->input->post('Name'));
                        $result = $this->email->send();
                        $result = "added";
                        echo $result;
                    } else {
                        $result = "Something went wrong, try again later!!";
                        echo $result;
                    }
                }
            }
        } else {
            $result = "Something went wrong, try again later!!";
            echo $result;
        }
    }

    public function gplusReg() {
        $userData = json_decode($_POST['userData']);
        if (!empty($userData)) {
            $oauth_uid = !empty($userData->id) ? $userData->id : '';
            $checkUserFbstatus = $this->users_model->checkGplusUser($oauth_uid);
            $first_name = !empty($userData->name->givenName) ? $userData->name->givenName : '';
            $last_name = !empty($userData->name->familyName) ? $userData->name->familyName : '';
            $email = !empty($userData->emails[0]->value) ? $userData->emails[0]->value : '';
            $gender = !empty($userData->gender) ? $userData->gender : '';
            $locale = !empty($userData->language) ? $userData->language : '';
            $picture = !empty($userData->image->url) ? $userData->image->url : '';
            $link = !empty($userData->url) ? $userData->url : '';
            if (!empty($checkUserFbstatus)) {
                if (!empty($checkUserFbstatus)) {
                    $this->session->set_userdata('Username', $checkUserFbstatus->Username);
                    $this->session->set_userdata('User_Id', $checkUserFbstatus->User_Id);
                    $this->session->set_userdata('Name', $checkUserFbstatus->Name);
                    $this->session->set_userdata('Photo', $checkUserFbstatus->Photo);
                    $this->session->set_userdata('Company', $checkUserFbstatus->Company_name);
                } else {
                    $result['status'] = 'Whoops! Incorrect Email & Password. Please try again';
                }
            } else {
                $checkEmailExist = $this->users_model->check_email_exist($email);
                $data = array(
                    'Name' => $first_name,
                    'Username' => $first_name . $last_name,
                    'Email' => $email,
                    'Created_On' => date("Y-m-d H:m:s"),
                    //here 3 is gplus user
                    'Signup_Through' => "3",
                    'social' => "1",
                    'GPlus_Id' => $oauth_uid
                );
                $insertid = $this->users_model->add_user($data);
                if ($insertid) {
                    $logData = array(
                        'log' => $first_name . $last_name . " Registered through Google.",
                        'User_Id' => $insertid,
                    );
                    $this->users_model->add_log($logData);
                    $this->session->set_flashdata('Error', 'Added Successfully');
                } else {
                    $this->session->set_flashdata('Error', 'Something went wrong');
                }
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function linkedinReg() {
        $userData = json_decode($_POST['userData']);
        if (!empty($userData)) {
            $oauth_uid = $userData->id;
            $checkUserLinkedinstatus = $this->users_model->checkLinkedinUser($oauth_uid);
            $first_name = $userData->firstName;
            $last_name = $userData->lastName;
            $email = $userData->emailAddress;
            if (!empty($checkUserLinkedinstatus)) {
                $this->session->set_userdata('Username', $checkUserLinkedinstatus->Username);
                $this->session->set_userdata('User_Id', $checkUserLinkedinstatus->User_Id);
                $this->session->set_userdata('Name', $checkUserLinkedinstatus->Name);
                $this->session->set_userdata('Photo', $checkUserLinkedinstatus->Photo);
                $this->session->set_userdata('Company', $checkUserLinkedinstatus->Company_name);
                $result = 'logged';
                echo $result;
            } else {
                $checkEmailExist = $this->users_model->check_email_exist($email);
                if ($checkEmailExist) {
                    $result = "email";
                    echo $result;
                } else {
                    $data = array(
                        'Name' => $first_name,
                        'Username' => $first_name . $last_name,
                        'Email' => $email,
                        'Created_On' => date("Y-m-d H:m:s"),
                        //here 1 is linkedin user
                        'Signup_Through' => "1",
                        'social' => "1",
                        'Linkedin_Id' => $oauth_uid
                    );
                    $insertid = $this->users_model->add_user($data);
                    if ($insertid) {
                        $logData = array(
                            'log' => $first_name . $last_name . " Registered through Linkedin.",
                            'User_Id' => $insertid,
                        );
                        $this->users_model->add_log($logData);
                        $this->load->library('email');
                        $config = array(
                            'mailtype' => 'html',
                            'charset' => 'utf-8',
                            'priority' => '1'
                        );
                        $this->email->initialize($config);
                        $this->email->from('info@foodlinked.co.in', 'Foodlinked Social');
                        $this->email->to($checkEmailExist->Email);
                        $this->email->subject('Thanks for registering with Foodlinked Social!!');
                        $this->email->message("Thank you:" . $this->input->post('Name'));
                        $result = $this->email->send();
                        $result = "added";
                        echo $result;
                    } else {
                        $result = "Something went wrong, try again later!!";
                        echo $result;
                    }
                }
            }
        } else {
            $result = "Something went wrong, try again later!!";
            echo $result;
        }
    }

    public function sendPassword() {
        $email = $this->input->post('email');
        $check = $this->checkEmail($email);
        if ($check) {
            $checkEmailExist = $this->users_model->check_email_exist($email);
            if ($checkEmailExist) {
                $data['user'] = $checkEmailExist;
                $this->load->library('email');
                $config = array(
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'priority' => '1'
                );
                $this->email->initialize($config);
                $this->email->from('info@foodlinked.co.in', 'Forgot Password Mail');
                $this->email->to($checkEmailExist->Email);
                $this->email->subject('Password Recovery Mail');
                $messageLink = "https://foodlinked.com/social/login/newPassword/" . $checkEmailExist->User_Id;
                $message = "
<html>
<head>
</head>
<body>
<h3>Dear $checkEmailExist->Name,</h3><br>
<a href='{$messageLink}'>Please Click here to change your password!</a>
<h4>Thank you!</h4>
</body>
</html>";
                $this->email->message($message);
                $result = $this->email->send();
                $logData = array(
                    'log' => $checkEmailExist->Name . " Requested for password change.",
                    'User_Id' => $checkEmailExist->User_Id,
                );
                $this->users_model->add_log($logData);
                $this->session->set_flashdata('fSucess', "Hi, " . $checkEmailExist->Name . " Check your mailbox.");
            } else {
                $this->session->set_flashdata('fError', 'No Account Found For This Email.');
            }
        } else {
            $this->session->set_flashdata('fError', 'Please enter a valid email address.');
        }
        $this->load->view('social/forgot_password');
    }

    public function newPassword($id) {
        if (!empty($id)) {
            $data['userId'] = $id;
            $this->load->view('social/resetPassword', $data);
        } else {
            $data['userId'] = $id;
            $this->session->set_flashdata('fError', 'Something went wrong, please try again later.');
            $this->load->view('social/forgot_password');
        }
    }

    public function resetPassword($id) {
        if (!empty($id)) {
            $data['userId'] = $id;
            $password = $this->input->post('Password');
            $cpassword = $this->input->post('CPassword');
            if ($password == $cpassword) {
                $data = array(
                    'Password' => md5($this->input->post('Password')),
                );
                $this->users_model->updateUserInfo($data, $id);
                redirect('login');
            } else {
                $this->session->set_flashdata('fError', 'Password and Confirm password mismatched!!');
                redirect('login/newPassword', $data);
            }
        } else {
            $this->session->set_flashdata('fError', 'Something went wrong, please try again later.');
            $this->load->view('social/forgot_password');
        }
    }

    public function addIntern($id) {
        if (!empty($id)) {
            $data['partnerId'] = $id;
            $pic_err_flag = 0;
            if ($this->input->post()) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('Name', 'Name', 'required');
                $this->form_validation->set_rules(
                        'Username', 'Username', 'required|is_unique[user_signup.Username]', array(
                    'is_unique' => 'Registration not Successfull. %s already exists.'
                        )
                );
                $this->form_validation->set_rules('Password', 'Password', 'required');

                if ($this->form_validation->run()) {

                    $checkEmailExist = $this->users_model->check_email_exist($this->input->post('Email'));
                    if ($checkEmailExist) {
                        $this->session->set_flashdata('Error', 'Failed. Email already exists.');
                        $this->load->view('social/intern_login', $data);
                    } else {
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

                        $data = array(
                            'Name' => $this->input->post('Name'),
                            'Username' => $this->input->post('Username'),
                            'Password' => md5($this->input->post('Password')),
                            'Phone' => $this->input->post('Phone'),
                            'Email' => $this->input->post('Email'),
                            'Address' => $this->input->post('Address'),
                            'Photo' => $Photo,
                            'Created_On' => date("Y-m-d H:m:s")
                        );

                        if ($pic_err_flag == 0) {
                            if ($insertid = $this->users_model->add_user($data)) {
                                if (!empty($insertid)) {

                                    $dataIntern = array(
                                        'C_Id' => $id,
                                        'User_Id' => $insertid,
                                        'User_Name' => $this->input->post('Username'),
                                        'Request_status' => "1",
                                        'reject_by_user' => "0",
                                        'approval' => "1",
                                    );
                                    $this->association_model->requestPartner($dataIntern);

                                    $this->load->library('email');
                                    $config = array(
                                        'mailtype' => 'html',
                                        'charset' => 'utf-8',
                                        'priority' => '1'
                                    );
                                    $this->email->initialize($config);
                                    $this->email->from('info@foodlinked.co.in', 'Foodlinked Social');
                                    $this->email->to($checkEmailExist->Email);
                                    $this->email->subject('Thanks for registering with Foodlinked Social!!');
                                    $this->email->message("Thank you:" . $this->input->post('Name'));
                                    $result = $this->email->send();
                                }
                                $this->session->set_flashdata('Sucess', 'User added successfully');
                            } else {
                                $this->session->set_flashdata('Error', 'Failed. Something went wrong.');
                            }
                        } else {
                            $this->session->set_flashdata('PicError', 'Pic Not Uploaded');
                        }
                        $this->load->view('social/intern_login', $pic_err);
                    }
                } else {
                    $this->load->view('social/intern_login', $data);
                }
            } else {
                $this->load->view('social/intern_login', $data);
            }
        } else {
            $this->session->set_flashdata('Error', 'Failed. Something went wrong.');
            $this->load->view('social/intern_login');
        }
    }

    public function logout() {
        $mUserName = $this->session->userdata('Username');
        $mUserId = $this->session->userdata('User_Id');
        $this->session->sess_destroy();
        redirect('login');
    }

}
