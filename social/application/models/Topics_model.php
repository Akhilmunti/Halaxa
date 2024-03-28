<?php

class Topics_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_parent = 'community_topics';
    }

    public function getAllParent() {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentBySchoolKey($mType, $mKey) {
        $this->db->select('*');
        $this->db->where('ct_partner_type', $mType);
        $this->db->where('ct_partner_key', $mKey);
        $this->db->from($this->table_parent);
        $this->db->join('school_info', 'school_info.S_key = community_topics.ct_partner_key');
        $this->db->order_by('ct_id', 'ASC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentByHotelKey($mType, $mKey) {
        $this->db->select('*');
        $this->db->where('ct_partner_type', $mType);
        $this->db->where('ct_partner_key', $mKey);
        $this->db->from($this->table_parent);
        $this->db->join('hotel_info', 'hotel_info.H_key = community_topics.ct_partner_key');
        $this->db->order_by('ct_id', 'ASC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentByAssociationKey($mType, $mKey) {
        $this->db->select('*');
        $this->db->where('ct_partner_type', $mType);
        $this->db->where('ct_partner_key', $mKey);
        $this->db->from($this->table_parent);
        $this->db->join('association_info', 'association_info.A_key = community_topics.ct_partner_key');
        $this->db->order_by('ct_id', 'ASC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    function addParent($data) {
        $query = $this->db->insert($this->table_parent, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getParentByKey($param) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('ct_key', $param);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }

    public function updateParentByKey($param, $data) {
        $this->db->set($data);
        $this->db->where('ct_key', $param);
        $query1 = $this->db->update($this->table_parent);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteParentByKey($param) {
        $this->db->where('ct_key', $param);
        $mDelete = $this->db->delete($this->table_parent);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>