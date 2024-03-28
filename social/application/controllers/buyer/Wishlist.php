<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['locations'] = $this->rfq_model->getAllLocs();
        $data['categories'] = $this->rfq_model->getAllCategories();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $this->load->view('buyer/wishlist');
    }

}
