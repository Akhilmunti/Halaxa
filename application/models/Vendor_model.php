<?php

class Vendor_model extends CI_model {

    public function getAllVendors() {
        $query = $this->db->get('vendor_list');
        return $query->result_array();
    }

    public function getAllVendorstwo() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('vendor_users');
        return $query->result_array();
    }

    public function add_vendor($data) {
        $query = $this->db->insert('vendor_list', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_vendor($id) {
        $this->db->where('V_Id', $id);
        $this->db->delete('vendor_list');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function delete_vendor_two($id) {
        $this->db->where('User_Id', $id);
        $this->db->delete('vendor_users');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_element_byID($id) {
        $this->db->select('*');
        $this->db->from('vendor_users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function get_elementvendor_byID($id) {
        $this->db->select('*');
        $this->db->from('vendor_users');
        $this->db->where('User_Id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('V_Id', $id);
        $this->db->update('vendor_list', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function update_element_byIDTwo($id, $data) {
        $this->db->where('User_Id', $id);
        $this->db->update('vendor_users', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function addQuotedRfq($data) {
        $query = $this->db->insert('quoted_rfq', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function addQuotedRfqToDraft($data) {
        $query = $this->db->insert('draft_rfq', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getAllQuotedRFQs($user) {
        $this->db->where('buyer_id =', $user);
        $query = $this->db->get('quoted_rfq');
        return $query->result_array();
    }

    public function getAllQuotedRFQsByPostatus($postatus, $user) {
        $this->db->select('*');
        $this->db->where('po_status =', $postatus);
        $this->db->where('buyer_id =', $user);
        $query = $this->db->get('quoted_rfq');
        return $query->result_array();
    }

    public function getAllFavs($status, $user) {
        $this->db->select('*');
        $this->db->where('status =', $status);
        $this->db->where('User_Id =', $user);
        $query = $this->db->get('favourite');
        return $query->result_array();
    }

    public function getAllPOIssuedRFQs($id, $buyer) {
        $this->db->select('*');
        $this->db->where('po_status =', $id);
        $this->db->where('buyer_id =', $buyer);
        $query = $this->db->get('quoted_rfq');
        return $query->result_array();
    }

    public function getAllPOIssuedRFQsForVendor($id, $buyer) {
        $this->db->select('*');
        $this->db->where('po_status =', $id);
        $this->db->where('vendor_id =', $buyer);
        $query = $this->db->get('quoted_rfq');
        return $query->result_array();
    }

    public function getAllQuotedRFQsByVendor($id) {
        $this->db->select('*');
        $this->db->where('vendor_id =', $id);
        $query = $this->db->get('quoted_rfq');
        return $query->result_array();
    }

    public function getAllQuotedRFQsByVendorPublic($id) {
        $this->db->select('*');
        $this->db->where('V_Public =', $id);
        $query = $this->db->get('rfq_list');
        return $query->result_array();
    }

    public function getAllQuotedRFQsByVendorAndStatus($id, $status) {
        $this->db->select('*');
        $where = "vendor_id='$id' AND q_negotiate='$status'";
        $this->db->where($where);
        $query = $this->db->get('quoted_rfq');
        return $query->result_array();
    }

    public function getAllQuotedRFQsByVendorAndDraft($id) {
        $this->db->select('*');
        $where = "vendor_id='$id'";
        $this->db->where($where);
        $query = $this->db->get('draft_rfq');
        return $query->result_array();
    }

    public function getAllQuotedRFQsById($id) {
        $this->db->select('*');
        $this->db->where('RFQ_Id =', $id);
        $query = $this->db->get('quoted_rfq');
        return $query->result_array();
    }

    public function getQuaoteById($id) {
        $this->db->select('*');
        $this->db->where('id =', $id);
        $query = $this->db->get('quoted_rfq');
        return $query->result_array();
    }

    public function updateQuoteById($data, $id) {
        $this->db->set($data);
        $this->db->where('id =', $id);
        $this->db->update('quoted_rfq');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function updateFav($data, $id) {
        $this->db->set($data);
        $this->db->where('id =', $id);
        $this->db->update('favourite');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function addToFavourite($data) {
        $query = $this->db->insert('favourite', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function checkFavourite($id, $venid) {
        $this->db->select('*');
        $this->db->where('User_Id =', $id);
        $this->db->where('vendor_id =', $venid);
        $query = $this->db->get('favourite');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function getEnddate($id) {
        $this->db->select('*');
        $this->db->where('RFQ_Id =', $id);
        $query = $this->db->get('rfq_list');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function getFavourite($id) {
        $this->db->select('*');
        $this->db->where('Vendor_id =', $id);
        $query = $this->db->get('favourite');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function updateQuotedRfqFileInfo($data, $id) {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('quoted_rfq');
    }

    public function updateQuotedRfqFileInfoDraft($data, $id) {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('draft_rfq');
    }

    public function delete_draft($id) {
        $this->db->where('RFQ_Id', $id);
        $this->db->delete('draft_rfq');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
