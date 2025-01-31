                                                                                                                                                                                                                                          <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('influencer_model');
        $this->load->model('school_model');
        $this->load->model('hotel_model');
        $this->load->model('rfq_model');
        $this->load->model('users_model');
        $this->load->model('association_model');
        $this->load->model('users_model');
        $this->load->library('upload');
        $this->load->helper('date');
        //error_reporting(0);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $partnerId = $this->session->userdata('login_id');
        if (!empty($partnerId)) {
            $associations = $this->association_model->getAllCommunities();
            $requests = $this->association_model->getAllRequests($partnerId);
            $this->outputData['all'] = $associations;
            $this->outputData['requests'] = $requests;
            $this->outputData['members'] = $this->association_model->getAllMembers($partnerId);
            $this->load->view('partner/followers', $this->outputData);
        } else {
            redirect('partner/home');
        }
    }

}
