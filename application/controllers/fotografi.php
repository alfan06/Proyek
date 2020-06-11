<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class fotografi extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->helper('url');
         $this->load->helper('form');
         $this->load->library('form_validation');
         $this->load->model('fotografi_model');
         $this->load->model('Transaksi_model');
         $this->load->model('komen_model');
         $this->load->model('user_model');
         $this->load->model('cetak_model');
    }

    public function index()
    {
            $data['title'] = 'List fotografi';
            $data['fotografi'] = $this->fotografi_model->datatabels();

            $data['fotografi']=$this->fotografi_model->getAllfotografi();
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('fotografi/index', $data);
            $this->load->view('admin/template/footer', $data);
        } elseif ($status_login == 'user') {
            $this->load->view('user/template/header1', $data);
            $this->load->view('fotografi/index_user');
            $this->load->view('user/template/footer1', $data);
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function detail($id_fotografi)
    {
            $data['title'] = 'Detail fotografi';
            $data['fotografi'] = $this->fotografi_model->datatabels();
            $data['fotografi']=$this->fotografi_model->getfotografiByID($id_fotografi);
            $data['komen']=$this->komen_model->getkomenbyid($id_fotografi);
            $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('fotografi/detail', $data);
            $this->load->view('admin/template/footerAdmin', $data);
        } elseif ($status_login == 'user') {
            $this->load->view('user/template/header2', $data);
            $this->load->view('user/template/header1', $data);
            $this->load->view('fotografi/detail_user');
            $this->load->view('user/template/footer1', $data);
        } else {
            redirect('auth', 'refresh');
        }
    }

    
    public function tambah(){
        $data['title']='Form Menambahkan Data fotografi';
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        if (empty($_FILES['image']['name'])) {
            $this->form_validation->set_rules('image', 'image', 'required');
        }
        
        if ($this->form_validation->run() == FALSE){
            # code...
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('fotografi/tambah', $data);
            $this->load->view('admin/template/footerAdmin', $data);
        } else{
            # code...
            $this->fotografi_model->tambahdatafotografi();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('fotografi', 'refresh');
        }
        
    }

    public function hapus($id_fotografi){
        $this->fotografi_model->hapusdatafotografi($id_fotografi);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('fotografi','refresh');
    }

    public function edit($id_fotografi){
        $data['title']='Form Edit Data fotografi';
        $data['fotografi']=$this->fotografi_model->getfotografiByID($id_fotografi);
        
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == FALSE){
            # code...
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('fotografi/edit', $data);
            $this->load->view('admin/template/footerAdmin', $data);
        } else{
            # code...
            $this->fotografi_model->ubahdatafotografi();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('fotografi', 'refresh');
        }
    }

    public function laporan_pdf() {
        
        $this->load->library('pdf');

        $data['fotografi']= $this->cetak_model->viewFotografi();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "datafotografi.pdf";
        $this->pdf->load_view('fotografi/laporan', $data);
    }

}

/* End of file Controllername.php */
