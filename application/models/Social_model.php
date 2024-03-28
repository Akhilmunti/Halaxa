<?php

class Social_model extends CI_model {

    public function add_post($data) {
        $query = $this->db->insert('posts', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getPost($id) {
        $this->db->select('*');
        $this->db->where('P_Id', $id);
        $query = $this->db->get('posts');
        return $query->row_array();
    }

    public function add_comment($data) {
        $query = $this->db->insert('post_comments', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function add_like($data) {
        $query = $this->db->insert('post_likes', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_post($id) {
        $this->db->where('P_Id', $id);
        $this->db->delete('posts');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function delete_post_comments($id) {
        $this->db->where('C_Id', $id);
        $this->db->delete('post_comments');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function getCommentedPost($id) {
        $this->db->select('*');
        $this->db->where('C_Id', $id);
        $query = $this->db->get('post_comments');
        return $query->row_array();
    }

    public function get_elements($id) {

        $connections = $this->users_model->get_connections('Connected', $this->session->userdata('User_Id'));

        $con = array();
        $i = 1;
        $con[0] = $this->session->userdata('User_Id');
        if ($connections) {
            foreach ($connections as $val) {
                $con[$i++] = $val->User_Id; //list of connected users 
            }
        }
        //echo '<pre>';print_r($con);exit;
        $this->db->select('user_signup.Name,user_signup.Photo,user_signup.User_Id,posts.*');
        if ($id)//other wall view
            $this->db->where('posts.Posted_User_Id=' . $id);
        else
            $this->db->where_in('posts.Posted_User_Id', $con);
        $this->db->from('posts');

        $this->db->join('user_signup', 'user_signup.User_Id =posts.Posted_User_Id', 'INNER');
        $this->db->order_by('P_Id', "desc");

        $query = $this->db->get();

        //echo '<pre>';print_r($query->result());exit;

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('P_Id', $id);
        $this->db->update('posts', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_comments($id) {
        $this->db->select('*');
        $this->db->where('P_ID=', $id);
        $query = $this->db->get('post_comments');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_likes($uid) {
        $this->db->select('*');
        $this->db->where('User_liked_id=', $uid);
        $query = $this->db->get('post_likes');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function check_like($id, $uid) {
        $this->db->select('*');
        $this->db->where('P_ID=', $id);
        $this->db->where('User_liked_id=', $uid);
        $query = $this->db->get('post_likes');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function update_like($id, $uid, $data) {
        $this->db->where('P_ID=', $id);
        $this->db->where('User_liked_id=', $uid);
        $this->db->update('post_likes', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function update_count($id, $data) {
        $this->db->where('P_ID=', $id);
        $this->db->update('posts', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function post_data($uid) {
        $this->db->select('*');
        $this->db->where('Posted_User_Id=', $uid);
        $this->db->from('posts');
        $this->db->join('post_likes', 'post_likes.User_liked_id = posts.Posted_User_Id');
        $query = $this->db->get();
    }

}
