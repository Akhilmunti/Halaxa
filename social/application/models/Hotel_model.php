<?php

class Hotel_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_Users = 'users';
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function getAllHotels() {
        $query = $this->db->get('hotel_info');
        return $query->result_array();
    }

    function setSession($data) {
        $this->session->set_userdata('login_id', $data['H_Id']);
        $this->session->set_userdata('login_name', $data['property_name']);
        $this->session->set_userdata('login_email', $data['Email']);
        $this->session->set_userdata('login_type', $data['Role']);
        $this->session->set_userdata('logo', $data['logo']);
        $this->session->set_userdata('picture', $data['logo']);
        $this->session->set_userdata('partner_type', "hotel");
        $this->session->set_userdata('partner_key', $data['H_key']);
    }

    public function addHotel($data) {
        $query = $this->db->insert('hotel_info', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function userConversations($data) {
        $query = $this->db->insert('conversations', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    public function getAllConversationsByPartnerid($id) {
        $this->db->select('*');
        $this->db->where('partner_id=', $id);
        $this->db->from('conversations');
        $this->db->join('hotel_info', 'hotel_info.H_Id = conversations.partner_id');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllHotelApplications() {
        $query = $this->db->get('hotel_info');
        return $query->result_array();
    }

    public function getHotelInfo($id) {
        $this->db->select('*');
        $this->db->where('H_Id=', $id);
        $query = $this->db->get('hotel_info');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    
    public function deleteHotel($id) {
        $this->db->where('H_Id', $id);
        $this->db->delete('hotel_info');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function deleteHotelCommunity($id) {
        $this->db->where('C_Id', $id);
        $this->db->delete('communities');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


    public function updateHotel($data, $id) {
        $this->db->set($data);
        $this->db->where('H_Id', $id);
        $this->db->update('hotel_info');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function authenticateLogin($mEmail, $mPassword) {
        $this->db->select('*');
        $this->db->where('Email', $mEmail);
        $this->db->where('Password', $mPassword);
        $this->db->where('Status', 1);
        $this->db->from('hotel_info');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            if ($data['Status'] == 1) {
                $this->setSession($data);
            }
            return $data;
        } else {
            return false;
        }
    }

}
