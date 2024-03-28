<?php

class Groups_model extends CI_Model {

    public function get_groups(){
        $query = $this->db->get('groups');
        return $query->result_array();
    }
    
    public function add_group($data) {
        $query = $this->db->insert('groups', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_group($id) {
        $this->db->where('id', $id);
        $this->db->delete('groups');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getGroupById($id) {
        $this->db->select('*');
        $this->db->from('groups');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    
    public function getGroupByUser($id) {
        $this->db->select('*');
        $this->db->from('groups');
        $this->db->where('User_Id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('groups', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
