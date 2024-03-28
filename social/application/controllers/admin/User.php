<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('vendor_model');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('influencer_model');
        $this->load->model('rfq_model');
        $this->load->library('email');
        date_default_timezone_set('Asia/Calcutta');
    }

    public function index() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['social'] = $this->users_model->getSocialUsers();
            $data['buyer'] = $this->users_model->getBuyerUsers();
            $data['vendor'] = $this->users_model->getVendorUsers();
            $data['influencer'] = $this->users_model->getInfluencerUsers();
            $data['socialStatus'] = "active";
            $this->load->view('admin/users-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function buyer() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['social'] = $this->users_model->getSocialUsers();
            $data['buyer'] = $this->users_model->getBuyerUsers();
            $data['vendor'] = $this->users_model->getVendorUsers();
            $data['influencer'] = $this->users_model->getInfluencerUsers();
            $data['buyerStatus'] = "active";
            $this->load->view('admin/users-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function vendor() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['social'] = $this->users_model->getSocialUsers();
            $data['buyer'] = $this->users_model->getBuyerUsers();
            $data['vendor'] = $this->users_model->getVendorUsers();
            $data['influencer'] = $this->users_model->getInfluencerUsers();
            $data['vendorStatus'] = "active";
            $this->load->view('admin/users-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function influencer() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['social'] = $this->users_model->getSocialUsers();
            $data['buyer'] = $this->users_model->getBuyerUsers();
            $data['vendor'] = $this->users_model->getVendorUsers();
            $data['influencer'] = $this->users_model->getInfluencerUsers();
            $data['influencerStatus'] = "active";
            $this->load->view('admin/users-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function viewSocialUser($socialId) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if (!empty($socialId)) {
                $data['userdata'] = $this->users_model->getSocialUserById($socialId);
                $this->load->view('admin/social-view', $data);
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function viewBuyerUser($buyerId) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if (!empty($buyerId)) {
                $data['userdata'] = $this->users_model->getBuyerUserById($buyerId);
                $this->load->view('admin/buyer-view', $data);
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function editSocialUser($socialId) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if (!empty($socialId)) {
                $data['userdata'] = $this->users_model->getSocialUserById($socialId);
                $this->load->view('admin/social-edit', $data);
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function editBuyerUser($buyerId) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if (!empty($buyerId)) {
                $data['userdata'] = $this->users_model->getSocialUserById($buyerId);
                $this->load->view('admin/buyer-edit', $data);
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function updateSocialUser($socialId) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            // validate numeric id
            if ($socialId) {
                $this->load->library('form_validation');
                // Data validate
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('phone', 'phone', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                if ($this->form_validation->run()) {
                    $userdata = array(
                        'Name' => $this->input->post('name'),
                        'Username' => $this->input->post('username'),
                        'Phone' => $this->input->post('phone'),
                        'Email' => $this->input->post('email'),
                        'Address' => $this->input->post('vendoraddress'),
                    );

                    $this->users_model->update_element_byID($socialId, $userdata);
                    $this->session->set_flashdata('result', 'Social data updated');
                    redirect('admin/user/editSocialUser/' . $socialId);
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                    redirect('admin/user/editSocialUser/' . $socialId);
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function updateBuyerUser($buyerId) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            // validate numeric id
            if ($buyerId) {
                $this->load->library('form_validation');
                // Data validate
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('phone', 'phone', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('cname', 'cname', 'required');
                $this->form_validation->set_rules('cbrief', 'cbrief', 'required');
                $this->form_validation->set_rules('address', 'address', 'required');
                if ($this->form_validation->run()) {
                    $userdata = array(
                        'Name' => $this->input->post('name'),
                        'Username' => $this->input->post('username'),
                        'Phone' => $this->input->post('phone'),
                        'Email' => $this->input->post('email'),
                        'Company_name' => $this->input->post('cname'),
                        'Company_brief' => $this->input->post('cbrief'),
                        'delivery_address' => $this->input->post('address'),
                    );

                    $this->users_model->update_element_byID($buyerId, $userdata);
                    $this->session->set_flashdata('result', 'Buyer data updated');
                    redirect('admin/user/editBuyerUser/' . $buyerId);
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                    redirect('admin/user/editBuyerUser/' . $buyerId);
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function deleteSocialUser($socialId) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if (!empty($socialId)) {
                if ($this->users_model->delete_user($socialId)) {
                    $this->session->set_flashdata('result', 'Social user deleted successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
            }
            redirect('admin/user');
        } else {
            redirect('admin/login');
        }
    }

    public function deleteInfluencerUser($socialId) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if (!empty($socialId)) {
                $userdata = $this->users_model->getSocialUserById($socialId);
                $influencerData = $this->influencer_model->getInfluencerInfoByEmail($userdata->Email);
                $infdata = array(
                    'influencer_status' => "0",
                );
                if ($this->influencer_model->update_element_byID($influencerData['I_Id'], $infdata)) {
                    $this->users_model->delete_user($socialId);
                    $this->session->set_flashdata('result', 'Influencer user deleted successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
            }
            redirect('admin/user');
        } else {
            redirect('admin/login');
        }
    }

    public function deleteBuyerUser($buyerId) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if (!empty($buyerId)) {
                $userdata = array(
                    'Company_name' => "",
                    'Company_brief' => "",
                    'delivery_address' => "",
                    'buyer' => "0",
                    'preferred_lang' => "",
                    'User_Type' => "0",
                );

                if ($this->users_model->update_element_byID($buyerId, $userdata)) {
                    $this->session->set_flashdata('result', 'Buyer user deleted successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
            }
            redirect('admin/user');
        } else {
            redirect('admin/login');
        }
    }

    public function enableUser($socialId) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            // validate numeric id
            if (!empty($socialId)) {
                $userdata = array(
                    'Status' => "1",
                );

                $this->users_model->update_element_byID($socialId, $userdata);
                $this->session->set_flashdata('result', 'User enabled successfully');
                redirect('admin/user');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function disableUser($socialId) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            // validate numeric id
            if (!empty($socialId)) {
                $userdata = array(
                    'Status' => "0",
                );
                $this->users_model->update_element_byID($socialId, $userdata);
                $this->session->set_flashdata('result', 'User disabled successfully');
                redirect('admin/user');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function deleteVendorUser($id = null) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if ($id != '') {
                $userdata = array(
                    'Address' => "",
                    'vendor' => "0",
                );

                if ($this->users_model->update_element_byID($id, $userdata)) {
                    $result = $this->vendor_model->delete_vendor_two($id);
                    if ($result) {
                        $this->session->set_flashdata('result', 'Vendor deleted successfully.');
                    } else {
                        $this->session->set_flashdata('result', 'Something went wrong.');
                    }
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong.');
            }
            redirect('admin/user');
        } else {
            redirect('admin/login');
        }
    }

    public function editVendorUser($id = null) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['categories'] = $this->category_model->get_cats();
            $data['scategories'] = $this->subcategory_model->get_scats();
            $data['cities'] = $this->category_model->get_cities_country();
            // validate numeric id
            if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
                $this->load->library('form_validation');
                // Data validate
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('phone', 'phone', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('vendoraddress', 'vendor address', 'required');
                $this->form_validation->set_rules('cname', 'company name', 'required');
                if ($this->form_validation->run()) {
                    $userdata = array(
                        'Name' => $this->input->post('name'),
                        'Username' => $this->input->post('username'),
                        'Phone' => $this->input->post('phone'),
                        'Email' => $this->input->post('email'),
                        'Address' => $this->input->post('vendoraddress'),
                    );

                    $data = array(
                        'comapany_name' => $this->input->post('cname'),
                        'contact_person' => $this->input->post('contact'),
                        'website' => $this->input->post('website'),
                        'delivery_address' => $this->input->post('vendoraddress'),
                        'categories' => json_encode($this->input->post('categories')),
                        'scategories' => json_encode($this->input->post('subcategories')),
                    );

                    $this->users_model->update_element_byID($id, $userdata);
                    $this->vendor_model->update_element_byIDTwo($id, $data);
                    $this->session->set_flashdata('result', 'Vendor updated successfully');
                    redirect('admin/user/editVendorUser/' . $id);
                } else {
                    if (!empty($this->form_validation->error_array())) {
                        // form get validation issues.
                        $this->session->set_flashdata('result', 'Please fill all the fields.');
                        redirect('admin/user/editVendorUser/' . $id);
                    }
                    // call view
                    if ($temp = $this->vendor_model->get_elementvendor_byID($id)) {
                        $user = $this->users_model->get_user_by_id($id);
                        $data['vendordata'] = $temp;
                        $data['userdata'] = $user;
                        $data['vendoryid'] = $id;
                        $this->load->view('admin/vendor-edit', $data);
                    } else {
                        redirect('admin/user');
                    }
                }
            } else {
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function viewVendorUser($id = null) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['cats'] = $this->rfq_model->getAllCategories();
            $data['scats'] = $this->rfq_model->getAllSubCategories();
            // validate numeric id
            if ($temp = $this->vendor_model->get_elementvendor_byID($id)) {
                $user = $this->users_model->get_user_by_id($id);
                $data['vendordata'] = $temp;
                $data['userdata'] = $user;
                $data['vendoryid'] = $id;
                $this->load->view('admin/vendors-view', $data);
            } else {
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

}
