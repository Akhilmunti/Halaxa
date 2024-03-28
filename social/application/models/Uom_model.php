<?php

class Uom_model extends CI_Model {

    public function get_uoms() {
        $query = $this->db->get('uoms');
        return $query->result_array();
    }

    public function add_uom($data) {
        $query = $this->db->insert('uoms', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_uom($id) {
        $this->db->where('U_Id', $id);
        $this->db->delete('uoms');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_element_byID($id) {
        $this->db->select('*');
        $this->db->where('U_Id =', $id);
        $query = $this->db->get('uoms');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('U_Id', $id);
        $this->db->update('uoms', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
