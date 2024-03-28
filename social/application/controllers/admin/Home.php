<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('vendor_model');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('influencer_model');
        $this->load->model('school_model');
        $this->load->model('hotel_model');
        $this->load->model('association_model');
        $this->load->model('rfq_model');
        $this->load->model('type_model');
        $this->load->model('category_model');
        $this->load->model('uom_model');
        $this->load->model('blogs_model');
        $this->load->model('logs_model');
        $this->load->model('subcategory_model');
        $this->load->model('item_model');
        $this->load->library('email');
        date_default_timezone_set('Asia/Calcutta');
    }

    public function index() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['logs'] = $this->logs_model->get_logs();
            $data['social'] = $this->users_model->getSocialUsers();
            $data['buyer'] = $this->users_model->getBuyerUsers();
            $data['vendor'] = $this->users_model->getVendorUsers();
            $data['influencer'] = $this->influencer_model->getAllInfluencerApplications();
            $data['school_list'] = $this->school_model->getAllSchoolApplications();
            $data['hotel_list'] = $this->hotel_model->getAllHotelApplications();
            $data['association_list'] = $this->association_model->getAllAssociationApplications();
            $data['types'] = $this->type_model->get_types();
            $data['cats'] = $this->category_model->get_categories();
            $data['scats'] = $this->subcategory_model->get_subcategories();
            $data['blogs'] = $this->blogs_model->get_blogs();
            $data['items'] = $this->item_model->get_items();
            $data['uom'] = $this->uom_model->get_uoms();
            $this->load->view('admin/dashboard', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function login() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('Username', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('Password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('result', 'Validation Error');
                $this->load->view('admin/login');
            } else {
                $mUsername = $this->input->post('Username');
                $mPassword = $this->input->post('Password');
                $mSecretPassword = md5($this->input->post('Password'));

                $mIsAuthenticated = $this->users_model->adminLogin($mUsername, $mSecretPassword);
                if ($mIsAuthenticated == TRUE) {
                    redirect('admin/home');
                } else {
                    $this->session->set_flashdata('result', 'Admin not found.');
                    $this->load->view('admin/login');
                }
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong.');
            $this->load->view('admin/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

}
