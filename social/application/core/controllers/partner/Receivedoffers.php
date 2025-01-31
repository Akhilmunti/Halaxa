                                                                                                                                                                                                                                          <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receivedoffers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('school_model');
        $this->load->model('hotel_model');
        $this->load->model('users_model');
        $this->load->model('city_model');
        $this->load->model('rfq_model');
        $this->load->model('association_model');
        $this->load->model('influencer_model');
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
            $this->outputData['members'] = $this->association_model->getAllMembers($partnerId);
            $this->outputData['scheduledMembersStatus'] = $this->association_model->getAllMembersStatus($partnerId);
            $this->outputData['scheduledMembers'] = $this->association_model->getAllScheduledMembers($partnerId);
            $this->outputData['partnerId'] = $partnerId;
            $this->outputData['countries'] = $this->rfq_model->getAllCountries();
            $this->load->view('partner/received_offers', $this->outputData);
        } else {
            redirect('partner/home');
        }
    }

}
