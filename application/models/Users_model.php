<?php

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function setSession($res) {
        //print_r($data);
        //echo "<br/>-------------".$data->Username;
        $this->session->set_userdata('Username', $res->Username);
        $this->session->set_userdata('User_Id', $res->User_Id);
        $this->session->set_userdata('Photo', $res->Photo);
    }

    public function get_user_signup() {
        $query = $this->db->get('user_signup');
        return $query->result();
    }

    public function get_user_by_id($id) {
        $this->db->where('User_ID', $id);
        $query = $this->db->get('user_signup');
        return $query->row();
    }

    public function get_connection_by_id($id) {
        $this->db->where('C_ID', $id);
        $query = $this->db->get('connection');
        return $query->row();
    }

    public function getUser($id) {
        $this->db->where('User_ID', $id);
        $query = $this->db->get('user_signup');
        return $query->result_array();
    }

    public function get_user_by_type($id, $type) {
        $this->db->where('User_ID', $id);
        $this->db->where('User_Type', $type);
        $query = $this->db->get('user_signup');
        return $query->row();
    }

    public function updateLogs($data, $id) {
        $this->db->set($data);
        $this->db->where('User_Id', $id);
        $this->db->update('inmail');
    }

    public function getMessages($id) {
        $this->db->order_by("id", "desc");
        $this->db->where('to_user', $id);
        $this->db->where('message_type', "Inmail");
        $query = $this->db->get('inmail');
        return $query->result_array();
    }
    
    public function getMessagesTwo($id) {
        $this->db->order_by("id", "desc");
        $this->db->where('to_user', $id);
        $this->db->where('message_type', "Inmail");
        $query = $this->db->get('inmail');
        return $query->result_array();
    }

    public function getLogs($id) {
        $this->db->order_by("id", "desc");
        $this->db->where('to_user', $id);
        $this->db->where('message_type', "Logs");
        $query = $this->db->get('inmail');
        return $query->result_array();
    }
    
    public function getLogsTwo($id) {
        $this->db->order_by("id", "desc");
        $this->db->where('to_user', $id);
        $this->db->where('message_type', "Logs");
        $query = $this->db->get('inmail');
        return $query->result_array();
    }

    public function getMessagesSent($id) {
        $this->db->order_by("id", "desc");
        $this->db->where('User_Id', $id);
        $this->db->where('message_type', "Inmail");
        $query = $this->db->get('inmail');
        return $query->result_array();
    }

    public function getLogsSent($id) {
        $this->db->order_by("id", "desc");
        $this->db->where('User_Id', $id);
        $this->db->where('message_type', "Logs");
        $query = $this->db->get('inmail');
        return $query->result_array();
    }
    
    public function getAllMessages($id) {
        $this->db->where('User_Id', $id);
        $query = $this->db->get('inmail');
        return $query->result_array();
    }

    public function check_vendor($id) {
        $this->db->where('User_Id', $id);
        $query = $this->db->get('vendor_users');
        return $query->row();
    }

    public function check_email_exist($email) {
        $this->db->where('Email', $email);
        $query = $this->db->get('user_signup');
        return $query->row();
    }

    public function checkFbUser($fbId) {
        $this->db->where('FB_Id', $fbId);
        $this->db->where('Signup_Through', "2");
        $query = $this->db->get('user_signup');
        return $query->row();
    }

    public function getMailsByFlag($id) {
        $this->db->select('*');
        $this->db->where('flag', "0");
        $this->db->where('User_Id', $id);
        $query = $this->db->get('inmail');
        return $query->result_array();
    }

    public function checkGplusUser($fbId) {
        $this->db->where('GPlus_Id', $fbId);
        $this->db->where('Signup_Through', "3");
        $query = $this->db->get('user_signup');
        return $query->row();
    }

    public function checkLinkedinUser($fbId) {
        $this->db->where('Linkedin_Id', $fbId);
        $this->db->where('Signup_Through', "1");
        $query = $this->db->get('user_signup');
        return $query->row();
    }

    public function add_user($data) {
        $query = $this->db->insert('user_signup', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function send_inmail($data) {
        $query = $this->db->insert('inmail', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function add_delivery_address($data) {
        $query = $this->db->insert('delivery_address', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function update_delivery_address($data, $id) {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('delivery_address');
    }

    public function updateUserInfo($data, $id) {
        $this->db->set($data);
        $this->db->where('User_Id', $id);
        $this->db->update('user_signup');
    }
    
    public function updateMessages($data, $id) {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('inmail');
    }


    public function updateSellerInfo($data, $id) {
        $this->db->set($data);
        $this->db->where('User_Id', $id);
        $this->db->update('vendor_users');
    }

    public function addSellerInfo($data) {
        $query = $this->db->insert('vendor_users', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function delete_user($id) {
        $this->db->where('User_ID', $id);
        $this->db->delete('user_signup');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_address_byid($id) {
        $this->db->where('id', $id);
        $this->db->delete('delivery_address');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_element_by($id) {
        $this->db->select('*');
        $this->db->where('User_Id =', $id);
        $query = $this->db->get('user_signup');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_element_by_key($id) {
        $this->db->select('*');
        $this->db->where('RFQ_Key =', $id);
        $query = $this->db->get('user_signup');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_vendor_details($id) {
        $this->db->select('*');
        $this->db->where('User_Id =', $id);
        $query = $this->db->get('vendor_users');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_address_by($id) {
        $this->db->select('*');
        $this->db->where('User_Id =', $id);
        $query = $this->db->get('delivery_address');
        return $query->result_array();
    }

    public function get_address_byid($id) {
        $this->db->select('*');
        $this->db->where('id =', $id);
        $query = $this->db->get('delivery_address');
        return $query->result_array();
    }

    public function get_element_by_name($profileName) {
        $this->db->select('*');
        $this->db->where('User_Id =', $profileName);
        $query = $this->db->get('user_signup');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function login($Username, $Password) {
        $this->db->select('*');
        $where = "Username='$Username' AND Password='$Password'";
        $this->db->where($where);
        $query = $this->db->get('user_signup');
        if ($query->num_rows() > 0) {
            $this->setSession($query->row());
            return $query->row();
        } else {
            return false;
        }
    }

    public function loginbyemail($Username, $Password) {
        $this->db->select('*');
        $where = "Email='$Username' AND Password='$Password'";
        $this->db->where($where);
        $query = $this->db->get('user_signup');
        if ($query->num_rows() > 0) {
            $this->setSession($query->row());
            return $query->row();
        } else {
            return false;
        }
    }

    public function update_element_byID($id, $data) {
        $this->db->where('User_ID', $id);
        $this->db->update('user_signup', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function update_invitations($id, $data) {
        $this->db->where('C_ID', $id);
        $this->db->update('connection', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_users_toconnect() {

        $invitaions = $this->users_model->get_invitations('Requested', $this->session->userdata('User_Id'));

        $inv = array();
        $i = 0;
        foreach ($invitaions as $val) {
            $inv[$i++] = $val->User_Id; //list of user who send request
        }

        $connections = $this->users_model->get_connections('Connected', $this->session->userdata('User_Id'));

        $con = array();
        $i = 0;
        if ($connections) {
            foreach ($connections as $val) {
                $con[$i++] = $val->User_Id; //list of connected users 
            }
        }

        $self = $this->users_model->self_invitations('Connected');
        $sel = array();
        $i = 0;
        foreach ($self as $val) {
            $sel[$i++] = $val->Connected_User_Id; //list of user for whom we send requests
        }

        $arr = array();
        $arr = array_merge($inv, $con); //Helpfull get list of conneted friend & friend request

        $id = $this->session->userdata('User_Id');

        $this->db->select('*');
        $this->db->from('user_signup');

        if ($arr) {
            $this->db->where_not_in('User_Id', $arr); //Eliminate connected and invited and eleminate people who we send requests.
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function get_invitations($status, $Id) {
        $this->db->select('C_ID,Name,user_signup.User_Id,user_signup.Company_name,user_signup.Company_brief,Photo,connection.Status');
        $this->db->from('user_signup');
        $this->db->join('connection', 'connection.User_Id =user_signup.User_Id', 'INNER');
        //$this->db->order_by('User_Id', "desc");
        $where = "connection.Status='$status' and Connected_User_Id='$Id'";
        $this->db->where($where);
        //$this->db->where('project.Active_Status', '1');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_connection_two($status, $Id) {
        $this->db->select('C_ID,Name,user_signup.User_Id,user_signup.Company_name,user_signup.Company_brief,Photo,connection.Status');
        $this->db->from('user_signup');
        $this->db->join('connection', 'connection.User_Id =user_signup.User_Id', 'INNER');
        //$this->db->order_by('User_Id', "desc");
        $where = "connection.Status='$status' and Connected_User_Id='$Id'";
        $this->db->where($where);
        //$this->db->where('project.Active_Status', '1');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_connections($status, $Id) {
        $this->db->select('*');
        $this->db->from('connection');
        $where = "Connected_User_Id='$Id' and Status='Connected'";
        $this->db->where($where);
        $query = $this->db->get();
        $connected1 = $query->result();

        $con1 = array();
        $i = 0;
        foreach ($connected1 as $val) {
            $con1[$i++] = $val->User_Id;
        }

        $this->db->select('*');
        $this->db->from('connection');
        $where = "User_Id='$Id' and Status='Connected'";
        $this->db->where($where);
        $query = $this->db->get();
        $connected2 = $query->result();

        $con2 = array();
        $i = 0;
        foreach ($connected2 as $val) {
            $con2[$i++] = $val->Connected_User_Id;
        }

        $arr = array();
        $arr = array_unique(array_merge($con1, $con2));


        if ($arr) {
            $this->db->select('*');
            $this->db->from('user_signup');


            $this->db->where_in('User_Id', $arr); //Eliminate connected and invited and eleminate people who we send requests.
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function self_invitations($status) {
        $Id = $this->session->userdata('User_Id');
        $this->db->select('*');
        $this->db->from('connection');
        $where = "User_Id='$Id' and Status='$status' ";
        $this->db->where($where);
        //$this->db->where('project.Active_Status', '1');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_request($data) {
        $query = $this->db->insert('connection', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
