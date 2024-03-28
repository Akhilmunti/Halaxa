<?php

class Currency_model extends CI_Model {

    public function get_currency() {
        $query = $this->db->get('currency');
        return $query->result_array();
    }

    public function add_currency($data) {
        $query = $this->db->insert('currency', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_currency($id) {
        $this->db->where('id', $id);
        $this->db->delete('currency');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_element_byID($id) {
        $this->db->select('*');
        $this->db->where('id =', $id);
        $query = $this->db->get('currency');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('currency', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
