<?php

class Category_model extends CI_Model {

    public function get_cats() {
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    
    public function get_cities() {
        $query = $this->db->get('city');
        return $query->result_array();
    }
    
    public function get_cities_country() {
        $query = $this->db->get('cities');
        return $query->result_array();
    }


    public function get_categories() {
        $this->db->select('categories.*,types.*');
        $this->db->from('categories');
        $this->db->join('types', 'categories.T_Key = types.T_Id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_category($data) {
        $query = $this->db->insert('categories', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_cat($id) {
        $this->db->where('CT_Id', $id);
        $this->db->delete('categories');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_element_byID($id) {
        $this->db->select('*');
        $this->db->where('CT_Id =', $id);
        $query = $this->db->get('categories');
        $query2 = $this->db->get('types');

        if ($query->num_rows() > 0 && $query2->num_rows() > 0) {
            $data['categorydata'] = $query->row_array();
            $data['typedata'] = $query2->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getCategoryById($id) {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('CT_Id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('CT_Id', $id);
        $this->db->update('categories', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
