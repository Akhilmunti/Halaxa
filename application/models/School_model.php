<?php

class School_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_Users = 'users';
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function getAllSchools() {
        $query = $this->db->get('school_info');
        return $query->result_array();
    }

    function setSession($data) {
        $this->session->set_userdata('login_id', $data['S_Id']);
        $this->session->set_userdata('login_name', $data['School_Name']);
        $this->session->set_userdata('login_email', $data['Email']);
        $this->session->set_userdata('login_type', $data['Role']);
        $this->session->set_userdata('logo', $data['Logo']);
        $this->session->set_userdata('picture', $data['Profile']);
        $this->session->set_userdata('partner_type', "school");
    }

    public function addSchool($data) {
        $query = $this->db->insert('school_info', $data);
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

    public function getAllSchoolApplications() {
        $query = $this->db->get('school_info');
        return $query->result_array();
    }

    public function getSchoolInfo($id) {
        $this->db->select('*');
        $this->db->where('S_Id=', $id);
        $query = $this->db->get('school_info');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function updateSchool($data, $id) {
        $this->db->set($data);
        $this->db->where('S_Id', $id);
        $this->db->update('school_info');
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
        $this->db->from('school_info');
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

    public function getAllTypes() {
        $query = $this->db->get('types');
        return $query->result_array();
    }

    public function getAllLocations() {
        $query = $this->db->get('locations');
        return $query->result_array();
    }

    public function getAllCities() {
        $query = $this->db->get('cities');
        return $query->result_array();
    }

    public function getAllItems() {
        $query = $this->db->get('items');
        return $query->result_array();
    }

    public function getAllUoms() {
        $query = $this->db->get('uoms');
        return $query->result_array();
    }

    public function getCatByType($typeid) {
        $this->db->select('*');
        $this->db->where('T_Key=', $typeid);
        $query = $this->db->get('categories');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getSubCatByCat($subcatid) {
        $this->db->select('*');
        $this->db->where('CT_Key=', $subcatid);
        $query = $this->db->get('sub_categories');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAllLocs() {
        $query = $this->db->get('locations');
        return $query->result_array();
    }

    public function getAllVendors() {
        $query = $this->db->get('vendor_list');
        return $query->result_array();
    }

    public function getAllRFQs() {
        $query = $this->db->get('rfq_list');
        return $query->result_array();
    }

    public function deletebyid($id) {
        $this->db->where('RFQ_Id', $id);
        $this->db->delete('rfq_list');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    // public function getRfqById($id){
    //     $this->db->select('rfq_list.*, categories.Category, types.Type, sub_categories.Sub_Category');
    //     $this->db->from('rfq_list');
    //     $this->db->join('types', 'rfq_list.T_Key = types.T_Id');
    //     $this->db->join('categories', 'rfq_list.CT_Key = categories.CT_Id');
    //     $this->db->join('sub_categories', 'rfq_list.SCT_Key = sub_categories.SCT_Id');
    //     $this->db->where('rfq_list.RFQ_Id',$id);
    //     $query = $this->db->get();
    //     if($query->num_rows() > 0){
    //         return $query->row_array();
    //     }
    //     else{
    //         return false;
    //     }
    // }
    public function getRfqById($id) {
        $this->db->select('*');
        $this->db->from('rfq_list');
        $this->db->where('rfq_list.RFQ_Id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    // public function getVendorsByIDS($vendorstring){
    //     $this->db->select('*');
    //     $this->db->where_in('V_Id', $vendorstring);
    //     $query = $this->db->get('vendor_list');
    //     return $query->result_array();
    // }

    public function updateRfqFileInfo($data, $id) {
        $this->db->set($data);
        $this->db->where('RFQ_Id', $id);
        $this->db->update('rfq_list');
    }

    public function updateRfq($data, $id) {
        $this->db->set($data);
        $this->db->where('RFQ_Id', $id);
        $this->db->update('rfq_list');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
