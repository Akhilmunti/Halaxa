<?php

class Subcategory_model extends CI_Model {

    public function get_scats() {
        $query = $this->db->get('sub_categories');
        return $query->result_array();
    }

    public function get_subcategories() {
        $this->db->select('sub_categories.*,categories.*');
        $this->db->from('sub_categories');
        $this->db->join('categories', 'categories.CT_Id = sub_categories.CT_Key', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_subcategory($data) {
        $query = $this->db->insert('sub_categories', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_subcat($id) {
        $this->db->where('SCT_Id', $id);
        $this->db->delete('sub_categories');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_element_byID($id) {
        $this->db->select('*');
        $this->db->where('SCT_Id =', $id);
        $query = $this->db->get('sub_categories');
        $query2 = $this->db->get('categories');

        if ($query->num_rows() > 0 && $query2->num_rows() > 0) {
            $data['subcategorydata'] = $query->row_array();
            $data['categorydata'] = $query2->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('SCT_Id', $id);
        $this->db->update('sub_categories', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getSubCategoryById($id) {
        $this->db->select('*');
        $this->db->from('sub_categories');
        $this->db->where('SCT_Id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

}
