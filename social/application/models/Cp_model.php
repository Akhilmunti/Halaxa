<?php

class Cp_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_parent = 'community_posts';
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
    
    public function getAllParentByTopicKey($mTopicKey) {
        $this->db->select('*');
        $this->db->where('cp_topic_key', $mTopicKey);
        $this->db->from($this->table_parent);
        //$this->db->join('school_info', 'school_info.S_key = community_posts.cp_partner_key');
        $this->db->order_by('cp_id', 'DESC');
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
    
    function addComment($data) {
        $query = $this->db->insert('community_comments', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    function getCommentsByPostKey($param) {
        $this->db->select('*');
        $this->db->where('cc_post_key', $param);
        $this->db->from('community_comments');
        //$this->db->join('school_info', 'school_info.S_key = community_posts.cp_partner_key');
        //$this->db->order_by('cc_id', 'ASC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getParentByKey($param) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('cp_key', $param);
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
        $this->db->where('cp_key', $param);
        $query1 = $this->db->update($this->table_parent);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteParentByKey($param) {
        $this->db->where('cp_key', $param);
        $mDelete = $this->db->delete($this->table_parent);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>