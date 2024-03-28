<?php

class Logs_model extends CI_Model {

    public function add_log($data) {
        $query = $this->db->insert('logs', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_logs() {
        $query = $this->db->get('logs');
        return $query->result_array();
    }

    public function delete_log($id) {
        $this->db->where('L_Id', $id);
        $this->db->delete('logs');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getlogById($id) {
        $this->db->select('*');
        $this->db->from('logs');
        $this->db->where('L_Id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('L_Id', $id);
        $this->db->update('logs', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
