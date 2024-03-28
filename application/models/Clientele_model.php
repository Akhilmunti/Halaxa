<?php

class Clientele_model extends CI_Model {

    public function get_clients(){
        $query = $this->db->get('clientele');
        return $query->result_array();
    }
    
    public function add_client($data) {
        $query = $this->db->insert('clientele', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_client($id) {
        $this->db->where('id', $id);
        $this->db->delete('clientele');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getClientById($id) {
        $this->db->select('*');
        $this->db->from('clientele');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    
    public function getClientByUser($id) {
        $this->db->select('*');
        $this->db->from('clientele');
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
        $this->db->update('clientele', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
