<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('cetak_model');
        $this->load->model('user_model');

        if ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Sorry You Are Not Active, Please Contact Admin!!";
            $data['title'] = 'Login User';
            $this->load->view('auth/template/headerlogin', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('auth/template/footerlogin', $data);
        } elseif ($this->session->userdata('level') != "user" and $this->session->userdata('level') != "admin") {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        if ($this->session->userdata('level') == "admin") {
            redirect('admin', 'refresh');
        }else{
            $data['title'] = 'User Dashboard';
            $this->load->view('user/template/header3', $data);
            $this->load->view('user/index');
            $this->load->view('user/template/footer', $data);
        }
    }

    public function hapusDataUser($id)
    {

        $this->user_model->hapusDataUser($id);
        $this->session->flashdata('flash-data-hapus', 'Deleted');
        redirect('user/listUser', 'refresh');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail User';
        $data['user'] = $this->user_model->getUserById($id);
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('admin/template/footerAdmin', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit User';
        $data['status'] = ['Aktif', 'Tidak Aktif'];
        $data['level'] = ['admin', 'user'];
        $data['user'] = $this->user_model->getUserById($id);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('admin/template/footerAdmin', $data);
        } else {
            $this->user_model->ubahDataUser();
            $this->session->set_flashdata('flash-data', 'Edited');
            redirect('user/listUser', 'refresh');
        }
    }

    public function listUser()
    {
        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "admin") {
            $data['title'] = 'Data Admin';
            //$data['user'] = $this->user_model->getAllUser();
            $data['user'] = $this->user_model->datatabels();
            if ($this->input->post('keyword')) {
                $data['user'] = $this->user_model->cariDataUser();
            }
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar');
            $this->load->view('user/list', $data);
            $this->load->view('admin/template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }
    public function changePassword($id) {
        $data['title'] = 'Change Password';
        $data['status'] = ['Aktif', 'Tidak Aktif'];
        $data['level'] = ['admin', 'user'];
        $data['user'] = $this->user_model->getUserById($id);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[passwordConf]', [
            'matches' => 'Password Doesn"t Match',
        ]);
        $this->form_validation->set_rules('passwordConf', 'Confirmation Password', 'required|trim|min_length[6]|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header', $data);
            $this->load->view('user/change_password', $data);
        } else {
            $this->user_model->changePassword();
            $this->session->set_flashdata('flash-data', 'Edited');
            redirect('user/listUser', 'refresh');
        }
    }
    public function laporan_pdf() {
        $data['title'] = 'Report User';
        $data['user'] = $this->cetak_model->viewUser();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_user.pdf";
        $this->pdf->load_view('user/laporan', $data);
    }
}
