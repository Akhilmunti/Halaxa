<?php

class Product_model extends CI_model {

    public function addProducts($data) {
        $query = $this->db->insert('products', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    public function deleteImage($id) {
        $this->db->where('id', $id);
        $this->db->delete('productimages');
        return ($this->db->affected_rows() > 0) ? true : false;
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
    
    public function getProductImagesByProductId($id, $mProductId) {
        $this->db->select('*');
        $this->db->where('V_Id', $id);
        $this->db->where('id', $mProductId);
        $query = $this->db->get('products');
        return $query->row_array();
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

    public function getProducts($id, $status) {
        $this->db->where('V_Id', $id);
        //$this->db->where('status_hide', $status);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    public function getProductsForSearch($id, $search) {
        $this->db->where('V_Id', $id);
        $this->db->like('product_name', $search);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    public function getProductsForSearchBuyer($search) {
        $this->db->like('product_name', $search);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    public function getProductsFilter($id, $product, $currency, $uom) {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('V_Id', $id);
        
        if($product){
            $this->db->like('product_name', $product);
        }
        
        if($currency){
            $this->db->where('currency', $currency);
        }
        
        if($uom){
            $this->db->where('uom', $uom);
        }
        
        $this->db->order_by('id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getProductsByPriceStatus($id, $status) {
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
    
    public function getProductData($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        return $query->row_array();
    }

    public function getProductsByName($id) {
        $this->db->like('product_name', $id);
        //$this->db->where('product_name', $id);
        $this->db->group_by('product_name');
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function getProductsByCat($id) {
        $this->db->like('categories', $id);
        //$this->db->where('categories', $id);
        $this->db->distinct();
        $query = $this->db->get('cats_search');
        return $query->result_array();
    }

    public function getProductsByCatUserid($id, $userid) {
        $this->db->where('category', $id);
        $this->db->where('V_Id', $userid);
        $this->db->distinct();
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function getProductsBySub($id) {
        $this->db->like('subcategories', $id);
        //$this->db->where('subcategories', $id);
        $query = $this->db->get('scats_search');
        return $query->result_array();
    }

    public function getProductsByBrand($id) {
        $this->db->like('brand', $id);
        //$this->db->where('brand', $id);
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function getProductsByCurrency($id) {
        $this->db->like('currency', $id);
        //$this->db->where('currency', $id);
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function getProductsByVendor($id) {
        $this->db->where('V_Id', $id);
        $this->db->distinct();
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
