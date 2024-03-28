<?php
class Location_model extends CI_Model {
    public function get_locations(){
        $query = $this->db->get('locations');
        return $query->result_array();
    }
    public function add_location($data){
        $query = $this->db->insert('locations', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function delete_location($id){
        $this->db->where('L_Id', $id);
        $this->db->delete('locations');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_element_byID($id){
        $id = intval($id);
        $this->db->select('*');
        $this->db->where('L_Id =', $id);
        $query = $this->db->get('locations');
        
        if($query->num_rows() > 0){
            return $query->row_array();
        }
        else{
            return false;
        }
    }
    public function update_element_byID($id, $data){
        $this->db->where('L_Id',$id);
        $this->db->update('locations',$data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
}