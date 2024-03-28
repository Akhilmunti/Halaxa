<?php

class City_model extends CI_Model {

    public function get_cities() {
        $query = $this->db->get('cities');
        return $query->result_array();
    }

    public function add_city($data) {
        $query = $this->db->insert('cities', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_city($id) {
        $this->db->where('C_Id', $id);
        $this->db->delete('cities');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_element_byID($id) {
        $id = intval($id);
        $this->db->select('*');
        $this->db->where('C_Id =', $id);
        $query = $this->db->get('cities');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('C_Id', $id);
        $this->db->update('cities', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
