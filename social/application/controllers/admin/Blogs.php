<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->library('upload');
        $this->load->helper('download');
    }

    public function index() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->load->model('blogs_model');
            $blogs = $this->blogs_model->get_blogs();
            $data['blogs'] = $blogs;
            $this->load->view('admin/blogs_manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add_new() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('topic', 'Topic name', 'required');
            $this->form_validation->set_rules('by', 'Blog By', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            if ($this->form_validation->run()) {
                $this->load->model('blogs_model');
                $mPic = $this->input->post('attachment');
                $mPicUniqueId = $this->uploadDocument('attachment', $mPic);
                $data = array(
                    'topic' => $this->input->post('topic'),
                    'blog_by' => $this->input->post('by'),
                    'blog_description' => $this->input->post('description'),
                    'attachment' => $mPicUniqueId,
                );

                if ($result = $this->blogs_model->add_blog($data)) {
                    $this->session->set_flashdata('result', 'Blog added');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
                redirect('admin/blogs');
            } else {
                if (!empty($this->form_validation->error_array())) {
                    // Form submitted with error
                    $error = $this->form_validation->error_array();
                    if (isset($error['topic'])) {
                        $this->session->set_flashdata('topic', $error['topic']);
                    }
                    if (isset($error['by'])) {
                        $this->session->set_flashdata('by', $error['by']);
                    }
                    if (isset($error['description'])) {
                        $this->session->set_flashdata('description', $error['description']);
                    }
                    redirect('admin/blogs/add-new');
                }
                $this->load->view('admin/blogs_addnew');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function delete($id = null) {
        if ($id != '') {
            $this->load->model('blogs_model');
            if ($result = $this->blogs_model->delete_blog($id)) {
                $this->session->set_flashdata('result', 'Blog deleted successfully.');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.');
        }
        redirect('admin/blogs');
    }

    public function edit($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
                $this->load->model('blogs_model');
                $this->load->library('form_validation');

                // Data validate
                $this->form_validation->set_rules('topic', 'Topic name', 'required');
                $this->form_validation->set_rules('by', 'Blog By', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');
                if ($this->form_validation->run()) {
                    // form validated, upadte data
                    $this->load->model('blogs_model');
                    $mPic = $this->input->post('attachment');
                    $mPicUniqueId = $this->uploadDocument('attachment', $mPic);
                    $data = array(
                        'topic' => $this->input->post('topic'),
                        'blog_by' => $this->input->post('by'),
                        'blog_description' => $this->input->post('description'),
                        'attachment' => $mPicUniqueId,
                    );
                    if ($this->blogs_model->update_element_byID($id, $data)) {
                        $this->session->set_flashdata('result', 'Blog updated');
                    } else {
                        $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                    }
                    redirect('admin/blogs');
                } else {
                    if (!empty($this->form_validation->error_array())) {
                        // form get validation issues.
                        redirect('admin/blogs/edit/' . $id);
                    }
                    // call view
                    if ($temp = $this->blogs_model->getBlogById($id)) {
                        $data['itemdata'] = $temp;
                        $data['blogId'] = $id;
                        $this->load->view('admin/blogs_edit', $data);
                    } else {
                        show_404();
                    }
                }
            } else {
                show_404();
            }
        } else {
            redirect('admin/login');
        }
        // validate numeric id
    }

    public function uploadDocument($mId, $mFile) {
        $config['upload_path'] = './uploads/';
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
