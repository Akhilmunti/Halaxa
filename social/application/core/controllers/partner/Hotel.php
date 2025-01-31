                                                                                                                                                                                                                                          <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('hotel_model');
        $this->load->model('association_model');
        $this->load->model('school_model');
        $this->load->library('upload');
        $this->load->helper('date');
        //error_reporting(0);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $this->outputData['notification'] = "";
        $partnerId = $this->session->userdata('login_id');
        $this->outputData['conversations'] = $this->school_model->getAllConversationsByPartnerid($partnerId);
        $this->outputData['members'] = $this->association_model->getAllMembers($partnerId);
        $this->outputData['info'] = $this->hotel_model->getHotelInfo($partnerId);
        $this->load->view('partner/school_partner', $this->outputData);
    }

    public function reviews() {
        $this->load->view('partner/review_company');
    }

    public function add_post() {
        $this->outputData['notification'] = "";
        $partnerId = $this->session->userdata('login_id');
        $this->form_validation->set_rules('comments', 'Comments', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partner/school_partner');
        } else {
            $mFile = $this->input->post('imageUpload');
            $mFileUniqueId = $this->uploadDocument('imageUpload', $mFile);

            $conversationInfo = array(
                'partner_id' => $partnerId,
                'comment' => $this->input->post('comments'),
                'attachment' => $mFileUniqueId,
            );
            if ($this->school_model->userConversations($conversationInfo)) {
                $this->outputData['notification'] = "Post addded successfully.";
            } else {
                $this->outputData['notification'] = "Please try again later!";
            }
            redirect('partner', $this->outputData);
        }
    }

    public function add_new() {
        $this->outputData['notification'] = "";
        $this->form_validation->set_rules('property_name', 'Property Name', 'required');
        $this->form_validation->set_rules('hotel_address', 'Address', 'required');
        $this->form_validation->set_rules('hotel_location', 'Location', 'required');
        $this->form_validation->set_rules('hotel_city', 'City', 'required');
        $this->form_validation->set_rules('hotel_state', 'State', '');
        $this->form_validation->set_rules('hotel_postal', 'Pincode', '');
        $this->form_validation->set_rules('hotel_country', 'Country', 'required');
        $this->form_validation->set_rules('hotel_rating', 'Rating', 'required');
        $this->form_validation->set_rules('hotel_rooms', 'Rooms', 'required');
        $this->form_validation->set_rules('hotel_type', 'Property Type', 'required');
        $this->form_validation->set_rules('hotel_firstname', 'First Name', 'required');
        $this->form_validation->set_rules('hotel_lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('hotel_role', 'Role', 'required');
        $this->form_validation->set_rules('hotel_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]|matches[password]');
        $this->form_validation->set_rules('contact_type', 'Phone Type', 'required');
        $this->form_validation->set_rules('area_code', 'Area Code', 'required');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        //$this->form_validation->set_rules('fax_type', 'Fax Type', 'required');
        //$this->form_validation->set_rules('fax_area_code', 'Fax Area Code', 'required');
        //$this->form_validation->set_rules('fax_contact', 'Fax Number', 'required');
        //$this->form_validation->set_rules('best_day', 'Best day to contact', 'required');
        //$this->form_validation->set_rules('best_time', 'Best time to contact', 'required');
        $this->form_validation->set_rules('group_description', 'Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partner/hotel_application');
        } else {
            $mLogo = $this->input->post('logo');
            $mLogoUniqueId = $this->uploadDocument('logo', $mLogo);

            $hotelInfo = array(
                'property_name' => $this->input->post('property_name'),
                'Address' => $this->input->post('hotel_address'),
                'Location' => $this->input->post('hotel_location'),
                'City' => $this->input->post('hotel_city'),
                'State' => $this->input->post('hotel_state'),
                'Zip_Code' => $this->input->post('hotel_postal'),
                'Country' => $this->input->post('hotel_country'),
                'hotel_rating' => $this->input->post('hotel_rating'),
                'hotel_source' => "null",
                'hotel_rooms' => $this->input->post('hotel_rooms'),
                'hotel_type' => $this->input->post('hotel_type'),
                'Website' => $this->input->post('hotel_website'),
                'hotel_contact' => "null",
                'First_Name' => $this->input->post('hotel_firstname'),
                'Last_Name' => $this->input->post('hotel_lastname'),
                'Role' => $this->input->post('hotel_role'),
                'Email' => $this->input->post('hotel_email'),
                'Password' => md5($this->input->post('password')),
                'group_description' => $this->input->post('group_description'),
                'Phone_Type' => $this->input->post('contact_type'),
                'Phone_Area_Code' => $this->input->post('area_code'),
                'Phone_No' => $this->input->post('contact'),
                'Fax_Type' => $this->input->post('fax_type'),
                'Fax_Area_Code' => $this->input->post('fax_area_code'),
                'Fax_No' => $this->input->post('fax_contact'),
                'Best_Day' => json_encode($this->input->post('best_day')),
                'Best_Time' => json_encode($this->input->post('best_time')),
                'logo' => $mLogoUniqueId,
            );
            $hotelEnroll = $this->hotel_model->addHotel($hotelInfo);
            if ($hotelEnroll) {
                $communityInfo = array(
                    'Username' => $this->input->post('hotel_firstname'),
                    'Photo' => $mLogoUniqueId,
                    'Groupname' => $this->input->post('property_name'),
                    'group_description' => $this->input->post('group_description'),
                    'Partner_type' => "hotel",
                    'C_Id' => $hotelEnroll,
                );
                $this->association_model->addUserToCommunities($communityInfo);
                $this->session->set_flashdata('result', 'Hotel Application has been submitted successfully!');
                $this->outputData['notification'] = "Hotel Application has been submitted successfully!";
                redirect('partner/home/signIn');
            } else {
                $this->outputData['notification'] = "Please try again later!";
            }
            $this->load->view('partner/hotel_application', $this->outputData);
        }
        $this->load->view('partner/hotel_application', $this->outputData);
    }

    public function getList() {
        $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
        $this->load->view('partner/hotel_list', $this->outputData);
    }

    public function edit($mId) {
        $this->outputData['notification'] = "";
        $this->outputData['mId'] = $mId;
        if ($_POST['edit_hotel']) {
            $this->form_validation->set_rules('property_name', 'Property Name', 'required');
            $this->form_validation->set_rules('hotel_address', 'Address', 'required');
            $this->form_validation->set_rules('hotel_location', 'Location', 'required');
            $this->form_validation->set_rules('hotel_city', 'City', 'required');
            $this->form_validation->set_rules('hotel_state', 'State', '');
            $this->form_validation->set_rules('hotel_postal', 'Pincode', '');
            $this->form_validation->set_rules('hotel_country', 'Country', 'required');
            $this->form_validation->set_rules('hotel_rating', 'Rating', 'required');
            $this->form_validation->set_rules('hotel_rooms', 'Rooms', 'required');
            $this->form_validation->set_rules('hotel_type', 'Property Type', 'required');
            $this->form_validation->set_rules('hotel_firstname', 'First Name', 'required');
            $this->form_validation->set_rules('hotel_lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('hotel_role', 'Role', 'required');
            $this->form_validation->set_rules('contact_type', 'Phone Type', 'required');
            $this->form_validation->set_rules('area_code', 'Area Code', 'required');
            $this->form_validation->set_rules('contact', 'Contact', 'required');
            $this->form_validation->set_rules('fax_type', 'Fax Type', 'required');
            $this->form_validation->set_rules('fax_area_code', 'Fax Area Code', 'required');
            $this->form_validation->set_rules('fax_contact', 'Fax Number', 'required');
            $this->form_validation->set_rules('best_day', 'Best day to contact', 'required');
            $this->form_validation->set_rules('best_time', 'Best time to contact', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('partner/school_edit', $this->outputData);
            } else {
                $hotelInfo = array(
                    'property_name' => $this->input->post('property_name'),
                    'Address' => $this->input->post('hotel_address'),
                    'Location' => $this->input->post('hotel_location'),
                    'City' => $this->input->post('hotel_city'),
                    'State' => $this->input->post('hotel_state'),
                    'Zip_Code' => $this->input->post('hotel_postal'),
                    'Country' => $this->input->post('hotel_country'),
                    'hotel_rating' => $this->input->post('hotel_rating'),
                    'hotel_source' => $this->input->post('hotel_source'),
                    'hotel_rooms' => $this->input->post('hotel_rooms'),
                    'hotel_type' => $this->input->post('hotel_type'),
                    'Website' => $this->input->post('hotel_website'),
                    'hotel_contact' => $this->input->post('hotel_contact'),
                    'First_Name' => $this->input->post('hotel_firstname'),
                    'Last_Name' => $this->input->post('hotel_lastname'),
                    'Role' => $this->input->post('hotel_role'),
                    'Phone_Type' => $this->input->post('contact_type'),
                    'Phone_Area_Code' => $this->input->post('area_code'),
                    'Phone_No' => $this->input->post('contact'),
                    'Fax_Type' => $this->input->post('fax_type'),
                    'Fax_Area_Code' => $this->input->post('fax_area_code'),
                    'Fax_No' => $this->input->post('fax_contact'),
                    'Best_Day' => $this->input->post('best_day'),
                    'Best_Time' => $this->input->post('best_time'),
                );
                if ($this->hotel_model->updateHotel($hotelInfo, $mId)) {
                    $this->outputData['notification'] = "Hotel Application has been updated successfully!";
                } else {
                    $this->outputData['notification'] = "Please try again later!";
                }
                $this->load->view('partner/hotel_edit', $this->outputData);
            }
        } else {
            $this->outputData['hotel_info'] = $this->hotel_model->getHotelInfo($mId);
            $this->load->view('partner/hotel_edit', $this->outputData);
        }
    }

    public function uploadDocument($mId, $mFile) {
        $config['upload_path'] = './uploads/';
        //$config['file_name'] = basename($_FILES['uploadfile']['name']);
        $config['file_name'] = $mFile;
        $config['allowed_types'] = 'jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|.mp3|m4a|ogg|wav|mp4|m4v|mov|wmv';
        $config['overwrite'] = false;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $data = array();
        if (!$this->upload->do_upload($mId)) {
            $mOutPut = $this->upload->data();
            $filename = "";
            $data['file_name'] = "";
            $data['result'] = 'fail';
            $data['message'] = $this->upload->display_errors();
        } else {
            $mOutPut = $this->upload->data();
            $filename = $mOutPut['file_name'];
            $data['file_name'] = $mOutPut['file_name'];
            $data['result'] = 'success';
            $data['message'] = 'file was uploaded fine';
            $data['error'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
        }
        return $filename;
    }

}
