<?php
class Type_model extends CI_Model {
    public function get_types() {
        $query = $this->db->get('types');
        return $query->result_array();
    }

    public function add_type($data){
        $query = $this->db->insert('types', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function delete_type($id){
        $this->db->where('T_Id', $id);
        $this->db->delete('types');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_element_byID($id){
        $id = intval($id);
        $this->db->select('*');
        $this->db->where('T_Id =', $id);
        $query = $this->db->get('types');
        
        if($query->num_rows() > 0){
            return $query->row_array();
        }
        else{
            return false;
        }
    }
    public function update_element_byID($id, $data){
        $this->db->where('T_Id',$id);
        $this->db->update('types',$data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    
    public function getTypeById($id){
        $this->db->select('*');
        $this->db->from('types');
        $this->db->where('T_Id',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row_array();
        }
        else{
            return false;
        }
    }
}