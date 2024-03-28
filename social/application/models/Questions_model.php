<?php

class Questions_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_parent = 'questions';
    }
    
    public function getAllParent() {
        $this->db->select('*');
        $query = $this->db->get($this->table_parent);
        return $query->result_array();
    }
    
    public function getAllParentForSite() {
        $this->db->select('*');
        $this->db->where('question_status', 1);
        $query = $this->db->get($this->table_parent);
        return $query->result_array();
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
        $this->db->where('question_key', $param);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function deleteParentByKey($param) {
        $this->db->where('question_key', $param);
        $this->db->delete($this->table_parent);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function updateParentByKey($param, $data) {
        $this->db->set($data);
        $this->db->where('question_key', $param);
        $query1 = $this->db->update($this->table_parent);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>
