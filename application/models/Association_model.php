<?php

class Association_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_Users = 'users';
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function getAllAssociations() {
        $query = $this->db->get('association_info');
        return $query->result_array();
    }

    public function getAllCommunities() {
        $query = $this->db->get('communities');
        return $query->result_array();
    }

    function setSession($data) {
        $this->session->set_userdata('login_id', $data['A_Id']);
        $this->session->set_userdata('login_name', $data['Association_Name']);
        $this->session->set_userdata('login_email', $data['Email']);
        $this->session->set_userdata('login_type', $data['Role']);
        $this->session->set_userdata('logo', $data['Logo']);
        $this->session->set_userdata('picture', $data['Profile']);
        $this->session->set_userdata('partner_type', "association");
    }

    public function addAssociation($data) {
        $query = $this->db->insert('association_info', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function addUserToCommunities($data) {
        $query = $this->db->insert('communities', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    public function addMembersToScheduled($data) {
        $query = $this->db->insert('scheduled_members', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    public function deleteScheduled($id) {
        $this->db->where('S_Id', $id);
        $this->db->delete('scheduled_members');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function userConversations($data) {
        $query = $this->db->insert('conversations', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getPostsById($id) {
        $this->db->select('*');
        $this->db->where('Posted_User_Id=', $id);
        $query = $this->db->get('posts');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    public function getAllConversationsByPartnerid($id) {
        $this->db->select('*');
        $this->db->where('partner_id=', $id);
        $query = $this->db->get('conversations');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAllAssociationApplications() {
        $query = $this->db->get('association_info');
        return $query->result_array();
    }

    public function getAssociationInfo($id) {
        $this->db->select('*');
        $this->db->where('A_Id=', $id);
        $query = $this->db->get('association_info');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    
    public function getCommunity($id) {
        $this->db->select('*');
        $this->db->where('C_Id=', $id);
        $query = $this->db->get('communities');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    
    public function getAllRequests($id) {
        $this->db->select('*');
        $this->db->where('C_Id=', $id);
        $this->db->where('reject_by_user=', "0");
        $query = $this->db->get('community_followers');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    public function getAllMembers($id) {
        $this->db->select('*');
        $this->db->where('C_Id=', $id);
        $this->db->where('approval=', "1");
        $query = $this->db->get('community_followers');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    public function getAllMembersStatus($id) {
        $this->db->select('*');
        $this->db->where('School_Id=', $id);
        $query = $this->db->get('members_status');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    public function getAllScheduledMembers($id) {
        $this->db->select('*');
        $this->db->where('P_Id=', $id);
        $query = $this->db->get('scheduled_members');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    
    public function getAllCommunitiesByUser($id) {
        $this->db->select('*');
        $this->db->where('User_Id', $id);
        $this->db->where('approval', "1");
        $query = $this->db->get('community_followers');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function updateAssociation($data, $id) {
        $this->db->set($data);
        $this->db->where('A_Id', $id);
        $this->db->update('association_info');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function authenticateLogin($mEmail, $mPassword) {
        $this->db->select('*');
        $this->db->where('Email', $mEmail);
        $this->db->where('Password', $mPassword);
        $this->db->where('Status', 1);
        $this->db->from('association_info');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            if ($data['Status'] == 1) {
                $this->setSession($data);
            }
            return $data;
        } else {
            return false;
        }
    }

    public function requestPartner($data) {
        $query = $this->db->insert('community_followers', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function checkRequest($user, $id) {
        $this->db->select('*');
        $this->db->where('User_Id=', $user);
        $this->db->where('C_Id=', $id);
        $query = $this->db->get('community_followers');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    
    public function rejectPartner($data, $id, $user) {
        $this->db->set($data);
        $this->db->where('C_Id', $id);
        $this->db->where('User_Id', $user);
        $this->db->update('community_followers');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function acceptPartner($data, $id) {
        $this->db->set($data);
        $this->db->where('F_Id', $id);
        $this->db->update('community_followers');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


}
