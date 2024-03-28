<?php
class Item_model extends CI_Model {
    public function get_items(){
        $query = $this->db->get('items');
        return $query->result_array();
    }
    public function add_item($data){
        $query = $this->db->insert('items', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function delete_item($id){
        $this->db->where('I_Id', $id);
        $this->db->delete('items');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_element_byID($id){
        $id = intval($id);
        $this->db->select('*');
        $this->db->where('I_Id =', $id);
        $query = $this->db->get('items');
        
        if($query->num_rows() > 0){
            return $query->row_array();
        }
        else{
            return false;
        }
    }
    public function update_element_byID($id, $data){
        $this->db->where('I_Id',$id);
        $this->db->update('items',$data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
}