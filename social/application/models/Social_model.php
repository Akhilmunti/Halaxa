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

    public function getCommunityPost($id) {
        $this->db->select('*');
        $this->db->where('cp_key', $id);
        $query = $this->db->get('community_posts');
        return $query->row_array();
    }

    public function getReply($id) {
        $this->db->select('*');
        $this->db->where('reply_id', $id);
        $query = $this->db->get('replies');
        return $query->row_array();
    }

    public function getComment($id) {
        $this->db->select('*');
        $this->db->where('C_Id', $id);
        $query = $this->db->get('post_comments');
        return $query->row_array();
    }

    public function add_comment($data) {
        $query = $this->db->insert('post_comments', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function add_reply($data) {
        $query = $this->db->insert('replies', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function add_like($data) {
        $query = $this->db->insert('post_likes', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function add_like_community($data) {
        $query = $this->db->insert('community_post_likes', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function add_like_comments($data) {
        $query = $this->db->insert('comment_likes', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function add_community_like_comments($data) {
        $query = $this->db->insert('community_comment_likes', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_post($id) {
        $this->db->where('P_Id', $id);
        $this->db->delete('posts');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_rating($id) {
        $this->db->where('id', $id);
        $this->db->delete('ratings');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_post_comments($id) {
        $this->db->where('C_Id', $id);
        $this->db->delete('post_comments');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_reply($id) {
        $this->db->where('reply_id', $id);
        $this->db->delete('replies');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getCommentedPost($id) {
        $this->db->select('*');
        $this->db->where('C_Id', $id);
        $this->db->from('post_comments');
        $this->db->join('posts', 'posts.P_ID = post_comments.P_ID');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getCommentedCommunityPost($id) {
        $this->db->select('*');
        $this->db->where('cc_key', $id);
        $this->db->from('community_comments');
        //$this->db->join('posts', 'posts.P_ID = post_comments.P_ID');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
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
        $this->db->select('user_signup.Name,user_signup.Photo,user_signup.User_Id,user_signup.Locations,user_signup.Designation,user_signup.Partner_type,posts.*');
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
        $this->db->from('post_comments');
        $this->db->join('user_signup', 'user_signup.User_Id = post_comments.User_commented_id');
        $this->db->order_by('P_ID', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function get_replies($id) {
        $this->db->select('*');
        $this->db->where('reply_to=', $id);
        $this->db->from('replies');
        $this->db->join('user_signup', 'user_signup.User_Id = replies.reply_by');
        $this->db->order_by('reply_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
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

    public function check_like_community($id, $uid) {
        $this->db->select('*');
        $this->db->where('cp_key=', $id);
        $this->db->where('cpl_user_liked_id=', $uid);
        $query = $this->db->get('community_post_likes');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function getAllLikes($id) {
        $this->db->select('*');
        $this->db->where('cp_key=', $id);
        $this->db->where('cpl_status=', 1);
        $query = $this->db->get('community_post_likes');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function check_like_for_comments($id, $uid) {
        $this->db->select('*');
        $this->db->where('C_Id=', $id);
        $this->db->where('User_Liked_Id=', $uid);
        $query = $this->db->get('comment_likes');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function check_community_like_for_comments($id, $uid) {
        $this->db->select('*');
        $this->db->where('cc_key=', $id);
        $this->db->where('ccl_user_liked_id=', $uid);
        $query = $this->db->get('community_comment_likes');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function getAllCommunityCommentsLikes($id) {
        $this->db->select('*');
        $this->db->where('cc_key=', $id);
        $this->db->where('ccl_status=', 1);
        $query = $this->db->get('community_comment_likes');
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

    public function update_community_like($id, $uid, $data) {
        $this->db->where('cp_key=', $id);
        $this->db->where('cpl_user_liked_id=', $uid);
        $this->db->update('community_post_likes', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function update_like_comments($id, $uid, $data) {
        $this->db->where('C_Id=', $id);
        $this->db->where('User_Liked_Id=', $uid);
        $this->db->update('comment_likes', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function update_community_like_comments($id, $uid, $data) {
        $this->db->where('cc_key=', $id);
        $this->db->where('ccl_user_liked_id=', $uid);
        $this->db->update('community_comment_likes', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function update_count($id, $data) {
        $this->db->where('P_ID=', $id);
        $this->db->update('posts', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function update_count_comments($id, $data) {
        $this->db->where('C_Id=', $id);
        $this->db->update('post_comments', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function post_data($uid) {
        $this->db->select('*');
        $this->db->where('Posted_User_Id=', $uid);
        $this->db->from('posts');
        $this->db->join('post_likes', 'post_likes.User_liked_id = posts.Posted_User_Id');
        $query = $this->db->get();
    }
    
    public function getSchoolId($uid) {
        $this->db->select('*');
        $this->db->where('S_key=', $uid);
        $query = $this->db->get('school_info');
        if ($query->num_rows() > 0) {
            return $query->row_array()['S_Id'];
        } else {
            return false;
        }
    }
    
    public function getAssociationId($uid) {
        $this->db->select('*');
        $this->db->where('A_key=', $uid);
        $query = $this->db->get('association_info');
        if ($query->num_rows() > 0) {
            return $query->row_array()['A_Id'];
        } else {
            return false;
        }
    }
    
    public function getHotelId($uid) {
         $this->db->select('*');
        $this->db->where('H_key=', $uid);
        $query = $this->db->get('hotel_info');
        if ($query->num_rows() > 0) {
            return $query->row_array()['H_Id'];
        } else {
            return false;
        }
    }

}
