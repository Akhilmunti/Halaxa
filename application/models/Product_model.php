se<?php

class Product_model extends CI_model {

    public function addProducts($data) {
        $query = $this->db->insert('products', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function addProductImages($data) {
        $query = $this->db->insert('productimages', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getProductImages($id) {
        $this->db->select('*');
        $this->db->where('V_Id', $id);
        $query = $this->db->get('productimages');
        return $query->result_array();
    }
    
    public function getProductImagesByid($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('productimages');
        return $query->result_array();
    }

    public function deleteProduct($id) {
        $this->db->where('id', $id);
        $this->db->delete('products');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function updateProduct($id, $data) {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('products');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function updateProductByUserStatus($id, $data) {
        $this->db->set($data);
        $this->db->where('V_Id', $id);
        $this->db->update('products');
    }

    public function addProductsDummy($data) {
        $query = $this->db->insert('dummy', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function addProductsDummyType($data, $id) {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('dummy');
    }

    public function updateProductsFile($data, $id) {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('products');
    }

    public function getProducts($id,$status) {
        $this->db->where('V_Id', $id);
        $this->db->where('status_hide', $status);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    public function getProductsByPriceStatus($id,$status) {
        $this->db->where('V_Id', $id);
        $this->db->where('price_status', $status);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    public function getProductsByUser($id) {
        $this->db->where('V_Id', $id);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    public function getProductsById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    
    public function getProductsByName($id) {
        $this->db->where('product_name', $id);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    public function getProductsByCat($id) {
        $this->db->where('category', $id);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    public function getProductsBySub($id) {
        $this->db->where('subcategory', $id);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    public function getProductsByVendor($id) {
        $this->db->where('V_Id', $id);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    public function getClientsByVendor($id) {
        $this->db->where('User_Id', $id);
        $query = $this->db->get('clientele');
        return $query->result_array();
    }
    
    public function getAllProducts() {
        $query = $this->db->get('products');
        return $query->result_array();
    }

}
