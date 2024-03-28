<?php

class Rfq_model extends CI_Model {

    public function getAllTypes() {
        $query = $this->db->get('types');
        return $query->result_array();
    }

    public function getUsers() {
        $query = $this->db->get('user_signup');
        return $query->result_array();
    }

    public function getUsersForInmail($id) {
        $this->db->select('*');
        $this->db->where('User_Id !=', $id);
        $query = $this->db->get('user_signup');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAllLocations() {
        $query = $this->db->get('locations');
        return $query->result_array();
    }

    public function getAllCountries() {
        $query = $this->db->get('countries');
        return $query->result_array();
    }

    public function getAllCategories() {
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function getAllSubCategories() {
        $query = $this->db->get('sub_categories');
        return $query->result_array();
    }

    public function getAllCities() {
        $query = $this->db->get('cities');
        return $query->result_array();
    }

    public function getAllItems() {
        $query = $this->db->get('items');
        return $query->result_array();
    }

    public function getAllUoms() {
        $query = $this->db->get('uoms');
        return $query->result_array();
    }

    public function getCatByType($typeid) {
        $this->db->select('*');
        $this->db->where('T_Key=', $typeid);
        $query = $this->db->get('categories');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getCityByLocation($countryid) {
        $this->db->select('*');
        $this->db->where('country_id=', $countryid);
        $query = $this->db->get('states');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getCityByStates($stateid) {
        $this->db->select('*');
        $this->db->where('state_id=', $stateid);
        $query = $this->db->get('city');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getSubCatByCat($subcatid) {
        $this->db->select('*');
        $this->db->where('CT_Key=', $subcatid);
        $query = $this->db->get('sub_categories');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getCountryByName($name) {
        $this->db->select('*');
        $this->db->where('name=', $name);
        $query = $this->db->get('countries');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAllLocs() {
        $query = $this->db->get('locations');
        return $query->result_array();
    }

    public function getAllVendors() {
        $query = $this->db->get('vendor_list');
        return $query->result_array();
    }

    public function getAllVendorsNew() {
        $query = $this->db->get('vendor_users');
        return $query->result_array();
    }
    
    public function getAllCats() {
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    
    public function getAllSubCats() {
        $query = $this->db->get('sub_categories');
        return $query->result_array();
    }
    
    public function getAllVendorsByCompany($id) {
        $this->db->select('*');
        $this->db->where('comapany_name', $id);
        $query = $this->db->get('vendor_users');
        return $query->result_array();
    }

    public function addRfq($data) {
        $query = $this->db->insert('rfq_list', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getAllRFQs() {
        //$this->db->order_by("RFQ_Id", "desc");
        $query = $this->db->get('rfq_list');
        return $query->result_array();
    }

    public function getAllRFQsWithCon($id) {
        $this->db->select('*');
        $this->db->where('User_Id != ', $id);
        $this->db->where('cancel_rfq_status', "0");
        $query = $this->db->get('rfq_list');
        return $query->result_array();
    }

    public function getAllRFQsByVendor($cancel) {
        $this->db->select('*');
        $this->db->where('V_Ids', $cancel);
        $this->db->where('cancel_rfq_status', "0");
        $query = $this->db->get('rfq_list');
        return $query->result_array();
    }

    public function getAllRFQsByfavs($id, $cancel) {
        $this->db->select('*');
        $this->db->order_by("RFQ_Id", "desc");
        $this->db->where('User_Id', $id);
        $this->db->where('cancel_rfq_status', $cancel);
        $query = $this->db->get('rfq_list');
        return $query->result_array();
    }

    public function getRfqByPublic($id, $public) {
        $this->db->select('*');
        $this->db->order_by("RFQ_Id", "desc");
        $this->db->where('User_Id', $id);
        $this->db->where('V_Public', $public);
        $query = $this->db->get('rfq_list');
        return $query->result_array();
    }

    public function getAllRFQsByStatus($status) {
        $this->db->select('*');
        $this->db->where('q_status', $status);
        $query = $this->db->get('rfq_list');
        return $query->result_array();
    }

    public function getAllRFQsByPublicVendor($status, $id) {
        $this->db->select('*');
        $this->db->where('V_Public', $status);
        $this->db->where('cancel_rfq_status', "0");
        $this->db->where('User_Id != ', $id);
        $query = $this->db->get('rfq_list');
        return $query->result_array();
    }

    public function deletebyid($id) {
        $this->db->select('*');
        $this->db->where('RFQ_Id', $id);
        $this->db->delete('rfq_list');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    // public function getRfqById($id){
    //     $this->db->select('rfq_list.*, categories.Category, types.Type, sub_categories.Sub_Category');
    //     $this->db->from('rfq_list');
    //     $this->db->join('types', 'rfq_list.T_Key = types.T_Id');
    //     $this->db->join('categories', 'rfq_list.CT_Key = categories.CT_Id');
    //     $this->db->join('sub_categories', 'rfq_list.SCT_Key = sub_categories.SCT_Id');
    //     $this->db->where('rfq_list.RFQ_Id',$id);
    //     $query = $this->db->get();
    //     if($query->num_rows() > 0){
    //         return $query->row_array();
    //     }
    //     else{
    //         return false;
    //     }
    // }
    public function getRfqById($id) {
        $this->db->select('*');
        $this->db->from('rfq_list');
        $this->db->where('rfq_list.RFQ_Id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function getquotedRfqById($id) {
        $this->db->select('*');
        $this->db->from('quoted_rfq');
        $this->db->where('quoted_rfq.id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    // public function getVendorsByIDS($vendorstring){
    //     $this->db->select('*');
    //     $this->db->where_in('V_Id', $vendorstring);
    //     $query = $this->db->get('vendor_list');
    //     return $query->result_array();
    // }

    public function updateRfqFileInfo($data, $id) {
        $this->db->set($data);
        $this->db->where('RFQ_Id', $id);
        $this->db->update('rfq_list');
    }

    public function updateRfq($data, $id) {
        $this->db->set($data);
        $this->db->where('RFQ_Id', $id);
        $this->db->update('rfq_list');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateRfqCancel($data, $id) {
        $this->db->set($data);
        $this->db->where('RFQ_Id', $id);
        $this->db->update('rfq_list');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getCatById($typeid) {
        $this->db->select('*');
        $this->db->where('CT_Id', $typeid);
        $query = $this->db->get('categories');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getSCatById($typeid) {
        $this->db->select('*');
        $this->db->where('SCT_Id', $typeid);
        $query = $this->db->get('sub_categories');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

}
