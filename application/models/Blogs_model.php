<?php

class Blogs_model extends CI_Model {

    public function add_blog($data) {
        $query = $this->db->insert('blogs', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_blogs() {
        $query = $this->db->get('blogs');
        return $query->result_array();
    }

    public function delete_blog($id) {
        $this->db->where('B_Id', $id);
        $this->db->delete('blogs');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getBlogById($id) {
        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->where('B_Id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('B_Id', $id);
        $this->db->update('blogs', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
