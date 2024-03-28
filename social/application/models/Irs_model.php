<?php

class Irs_model extends CI_Model {

    private $db_irs;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->library('session');
        $this->db_irs = $this->load->database('irs', TRUE);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function getAllIrsUsers() {
        $query = $this->db_irs->get('users');
        return $query->result_array();
    }

    public function getCountries() {
        $this->db_irs->where('location_type', 0);
        $query = $this->db_irs->get('location');
        return $query->result_array();
    }

    public function getCountryFilter($type, $parentId) {
        $this->db_irs->where('location_type', $type);
        $this->db_irs->where('parent_id', $parentId);
        $query = $this->db_irs->get('location');
        return $query->result_array();
    }

    public function getCourseFilter($type, $parentId) {
        $this->db_irs->where('type', $type);
        $this->db_irs->where('parent_id', $parentId);
        $query = $this->db_irs->get('jobs_seed_data');
        return $query->result_array();
    }

    public function getCourseStreamFilter($parentId) {
        $this->db_irs->where('parent_id', $parentId);
        $query = $this->db_irs->get('jobs_seed_data');
        return $query->result_array();
    }

    public function getIrsUserByEmail($email) {
        $this->db_irs->where('email', $email);
        $query = $this->db_irs->get('users');
        return $query->row_array();
    }

    public function getJobSeekerDataByJsId($id) {
        $this->db_irs->select('*');
        $this->db_irs->where('id', $id);
        $this->db_irs->from('job_seeker');
        $this->db_irs->join('users', 'users.uuid = job_seeker.userid');
        $this->db_irs->join('location', 'location.location_id = job_seeker.countryid', 'left');
        $data = array();
        $mQuery_Res = $this->db_irs->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getJobSeekerDataById($id) {
        $this->db_irs->select('*');
        $this->db_irs->where('userid', $id);
        $this->db_irs->from('job_seeker');
        $this->db_irs->join('users', 'users.uuid = job_seeker.userid');
        $this->db_irs->join('location', 'location.location_id = job_seeker.countryid', 'left');
        $data = array();
        $mQuery_Res = $this->db_irs->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getRecruitDataById($id) {
        $this->db_irs->select('*');
        $this->db_irs->where('userid', $id);
        $this->db_irs->from('employer');
        $this->db_irs->join('users', 'users.uuid = employer.userid');
        $this->db_irs->join('address', 'address.id = employer.addressid', 'left');
        $data = array();
        $mQuery_Res = $this->db_irs->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAddressDataById($id) {
        $this->db_irs->select('*');
        $this->db_irs->where('id', $id);
        $this->db_irs->from('address');
        $data = array();
        $mQuery_Res = $this->db_irs->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getJobSeekerEduById($id) {
        $this->db_irs->where('job_seeker_id', $id);
        //$query = $this->db_irs->get('js_education');
        $query = $this->db_irs->get('js_qualifications');
        return $query->result_array();
    }

    public function getCourseByid($id) {
        $this->db_irs->where('id', $id);
        $query = $this->db_irs->get('jobs_seed_data');
        return $query->row_array();
    }

    public function getJobSeekerCerById($id) {
        $this->db_irs->where('job_seeker_id', $id);
        $this->db_irs->where('isActive', 1);
        $query = $this->db_irs->get('js_certificate_details');
        return $query->result_array();
    }

    public function getJobSeekerProById($id) {
        $this->db_irs->where('job_seeker_id', $id);
        $this->db_irs->where('isActive', 1);
        $query = $this->db_irs->get('js_project_details');
        return $query->result_array();
    }

    public function getJobSeekerExpById($id) {
        $this->db_irs->where('job_seeker_id', $id);
        $this->db_irs->where('isActive', 1);
        $query = $this->db_irs->get('js_experience');
        return $query->result_array();
    }

    public function addExperienceInfo($data) {
        $query = $this->db_irs->insert('js_experience', $data);
        if ($this->db_irs->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateExperienceInfo($mData, $id) {
        $this->db_irs->where('id', $id);
        $query1 = $this->db_irs->update('js_experience', $mData);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function addCertificateInfo($data) {
        $query = $this->db_irs->insert('js_certificate_details', $data);
        if ($this->db_irs->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCertificateInfo($mData, $id) {
        $this->db_irs->where('id', $id);
        $query1 = $this->db_irs->update('js_certificate_details', $mData);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function addEducationInfo($data) {
        $query = $this->db_irs->insert('js_qualifications', $data);
        if ($this->db_irs->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateEducationInfo($mData, $id) {
        $this->db_irs->where('id', $id);
        $query1 = $this->db_irs->update('js_qualifications', $mData);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function addProjectInfo($data) {
        $query = $this->db_irs->insert('js_project_details', $data);
        if ($this->db_irs->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
     public function updateProjectInfo($mData, $id) {
        $this->db_irs->where('id', $id);
        $query1 = $this->db_irs->update('js_project_details', $mData);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function addAddressInfo($data) {
        $query = $this->db_irs->insert('address', $data);
        if ($this->db_irs->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function addRecruitInfo($data) {
        $query = $this->db_irs->insert('employer', $data);
        if ($this->db_irs->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUserdata($mData, $id) {
        $this->db_irs->where('uuid', $id);
        $query1 = $this->db_irs->update('users', $mData);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function updateRecruitdata($mData, $id) {
        $this->db_irs->where('userid', $id);
        $query1 = $this->db_irs->update('employer', $mData);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function updateJsdata($mData, $id) {
        $this->db_irs->where('id', $id);
        $query1 = $this->db_irs->update('job_seeker', $mData);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function updateAddressdata($mData, $id) {
        $this->db_irs->where('id', $id);
        $query1 = $this->db_irs->update('address', $mData);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function JobSeekerProfileView($id) {
        $this->db_irs->select('users.*','job_seeker.*','statelocation.name as statename','countrylocation.name as countryname');
        $this->db_irs->where('job_seeker.id', $id);
        $this->db_irs->from('users');
        $this->db_irs->join('job_seeker', 'users.uuid = job_seeker.userid');
        $this->db_irs->join('location as statelocation', 'statelocation.location_id = job_seeker.regionid', 'left');
        $this->db_irs->join('location as countrylocation', 'countrylocation.location_id = job_seeker.countryid', 'left');
        $this->db_irs->join('images', 'images.id = job_seeker.resumeid', 'left');
        $data = array();
        $mQuery_Res = $this->db_irs->get();
        //echo $this->db_irs->last_query();
        //exit;
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getJobRoles() {
        $myQuery = "SELECT * FROM `jobs_seed_data` WHERE type = 1003 AND `parent_id` IN (SELECT `id` FROM `jobs_seed_data` WHERE type = 1002 AND `parent_id` = -1)";
        $query = $this->db_irs->query($myQuery);
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}
