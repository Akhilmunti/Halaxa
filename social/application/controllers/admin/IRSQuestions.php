<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class IRSQuestions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('vendor_model');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('irsquestions_model', 'questions_model');
        $this->load->model('rfq_model');
        $this->load->library('email');
        date_default_timezone_set('Asia/Calcutta');
    }

    public function index() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['result'] = "";
            $data['questions'] = $this->questions_model->getAllParent();
            $this->load->view('admin/irs_questions', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['result'] = "";
            $data['questions'] = $this->questions_model->getAllParent();
            $this->load->view('admin/irs_question_add', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function actionAdd() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('question', 'Question Title', 'required');
            $this->form_validation->set_rules('time', 'Duration', 'required');
            //$this->form_validation->set_rules('note', 'note', 'required');
            if ($this->form_validation->run()) {
                $data = array(
                    'question_key' => $this->mGenerateRandomNumber(),
                    'question_content' => $this->input->post('question'),
                    'question_note' => $this->input->post('note'),
                    'question_max_time' => $this->input->post('time'),
                    'question_date_added' => date('Y-m-d H:i:s'),
                    'question_date_updated' => date('Y-m-d H:i:s'),
                );

                if ($result = $this->questions_model->addParent($data)) {
                    $this->session->set_flashdata('result', 'Question Template added');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
                redirect('admin/IRSQuestions');
            } else {
                $this->session->set_flashdata('result', 'Validation Error.');
                $this->load->view('admin/irs_question_add');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function mGenerateRandomNumber() {
        $key = '';
        $keys = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
        for ($i = 0; $i < 25; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

    public function actionDelete($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if ($id != '') {
                $result = $this->questions_model->deleteParentByKey($id);
                if ($result) {
                    $this->session->set_flashdata('result', 'Question template deleted successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong.');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong.');
            }
            redirect('admin/IRSQuestions');
        } else {
            redirect('admin/login');
        }
    }
    
    public function actionDisable($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if ($id != '') {
                
                $data = array(
                    'question_status' => 0,
                    'question_date_updated' => date('Y-m-d H:i:s'),
                );
                
                $result = $this->questions_model->updateParentByKey($id, $data);
                if ($result) {
                    $this->session->set_flashdata('result', 'Question disabled successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong.');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong.');
            }
            redirect('admin/IRSQuestions');
        } else {
            redirect('admin/login');
        }
    }
    
    public function actionEnable($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if ($id != '') {
                
                $data = array(
                    'question_status' => 1,
                    'question_date_updated' => date('Y-m-d H:i:s'),
                );
                
                $result = $this->questions_model->updateParentByKey($id, $data);
                if ($result) {
                    $this->session->set_flashdata('result', 'Question disabled successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong.');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong.');
            }
            redirect('admin/IRSQuestions');
        } else {
            redirect('admin/login');
        }
    }

    public function edit($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['categories'] = $this->category_model->get_cats();
            $data['scategories'] = $this->subcategory_model->get_scats();
            $data['cities'] = $this->category_model->get_cities_country();
            // validate numeric id
            if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
                $this->load->library('form_validation');
                // Data validate
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('phone', 'phone', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('vendoraddress', 'vendor address', 'required');
                $this->form_validation->set_rules('cname', 'company name', 'required');
                if ($this->form_validation->run()) {
                    $userdata = array(
                        'Name' => $this->input->post('name'),
                        'Username' => $this->input->post('username'),
                        'Phone' => $this->input->post('phone'),
                        'Email' => $this->input->post('email'),
                        'Address' => $this->input->post('vendoraddress'),
                    );

                    $data = array(
                        'comapany_name' => $this->input->post('cname'),
                        'contact_person' => $this->input->post('contact'),
                        'website' => $this->input->post('website'),
                        'delivery_address' => $this->input->post('vendoraddress'),
                        'categories' => json_encode($this->input->post('categories')),
                        'scategories' => json_encode($this->input->post('subcategories')),
                    );

                    $this->users_model->update_element_byID($id, $userdata);
                    $this->vendor_model->update_element_byIDTwo($id, $data);
                    $this->session->set_flashdata('result', 'Vendor updated');
                    redirect('admin/questions');
                } else {
                    if (!empty($this->form_validation->error_array())) {
                        // form get validation issues.
                        redirect('admin/vendors/edit/' . $id);
                    }
                    // call view
                    if ($temp = $this->vendor_model->get_elementvendor_byID($id)) {
                        $user = $this->users_model->get_user_by_id($id);
                        $data['vendordata'] = $temp;
                        $data['userdata'] = $user;
                        $data['vendoryid'] = $id;
                        $this->load->view('admin/vendors-edit', $data);
                    } else {
                        show_404();
                    }
                }
            } else {
                show_404();
            }
        } else {
            redirect('admin/login');
        }
    }

    public function view($id = null) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['cats'] = $this->rfq_model->getAllCategories();
            $data['scats'] = $this->rfq_model->getAllSubCategories();
            // validate numeric id
            if ($temp = $this->vendor_model->get_elementvendor_byID($id)) {
                $user = $this->users_model->get_user_by_id($id);
                $data['vendordata'] = $temp;
                $data['userdata'] = $user;
                $data['vendoryid'] = $id;
                $this->load->view('admin/vendors-view', $data);
            } else {
                show_404();
            }
        } else {
            redirect('admin/login');
        }
    }

}
