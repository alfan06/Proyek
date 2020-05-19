<?php

defined('BASEPATH') or exit('No direct script access allowed');

class komen extends CI_Controller
{

    var $API = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        $this->load->model('forum_model');

        if ($this->session->userdata('level') != "user") {
            redirect('login', 'refresh');
        }
    }


    public function index()
    {
        $data['topic'] = $this->forum_model->getAllTopic();
        $data['title'] = 'Ayo Berdiskusi !';
        // if ($this->input->post('keyword')) {
        //     # code...
        //     $data['topic'] = $this->forum_model->cariTopic();
        // }
        $this->load->view('templates/header', $data);
        $this->load->view('forum/index', $data);
        $this->load->view('templates/footer');
    }
    public function addTopic()
    {
        $this->form_validation->set_rules('oleh', 'oleh', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[8]');
        $this->form_validation->set_rules('asal_kota', 'asal_kota', 'required');
    }
    public function detailForum($id)
    {
        $data['topic'] = $this->forum_model->getTopicByID($id);
        $data['comment'] = $this->forum_model->getCommentByID($id);
        $this->load->view('templates/header', $data);
        $this->load->view('forum/detail', $data);
        $this->load->view('templates/footer');
    }
    public function addComment($id)
    {
        $this->forum_model->addComment();
        $this->session->set_flashdata('flash-data', 'ditambahkan');
        redirect('forum/detailForum/' . $id, 'refresh');
    }
}

/* End of file Forum.php */
