<?php

class Influencer_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_Users = 'users';
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    function setSession($data) {
        $this->session->set_userdata('login_id', $data['I_Id']);
        $this->session->set_userdata('login_name', $data['Username']);
        $this->session->set_userdata('login_email', $data['Email']);
        $this->session->set_userdata('logo', $data['Photo']);
        $this->session->set_userdata('picture', $data['Photo']);
    }

    public function addInfluencer($data) {
        $query = $this->db->insert('influencer_info', $data);
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
        $query = $this->db->get('conversations');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAllInfluencerApplications() {
        $query = $this->db->get('influencer_info');
        return $query->result_array();
    }

    public function getInfluencerInfo($id) {
        $this->db->select('*');
        $this->db->where('I_Id=', $id);
        $query = $this->db->get('influencer_info');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    
    public function getInfluencerInfoByEmail($id) {
        $this->db->select('*');
        $this->db->where('Email=', $id);
        $query = $this->db->get('influencer_info');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function updateInfluencer($data, $id) {
        $this->db->set($data);
        $this->db->where('I_Id', $id);
        $this->db->update('influencer_info');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('I_Id', $id);
        $this->db->update('influencer_info', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function authenticateLogin($mEmail, $mPassword) {
        $this->db->select('*');
        $this->db->where('Email', $mEmail);
        $this->db->where('Password', $mPassword);
        $this->db->where('influencer_status', 1);
        $this->db->from('influencer_info');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            if ($data['influencer_status'] == 1) {
                $this->setSession($data);
            }
            return $data;
        } else {
            return false;
        }
    }

}
