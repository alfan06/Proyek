<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class galeri extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->helper('url');
         $this->load->helper('form');
         $this->load->library('form_validation');
         $this->load->model('galeri_model');
         $this->load->model('cetak_model');
    }
    

    public function index()
    {
            $data['title'] = 'List galeri';
            $data['galeri'] = $this->galeri_model->datatabels();

            $data['galeri']=$this->galeri_model->getAllgaleri();
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('galeri/index', $data);
            $this->load->view('admin/template/footer', $data);
        } elseif ($status_login == 'user') {
            $this->load->view('user/template/header1', $data);
            $this->load->view('galeri/index_user');
            $this->load->view('user/template/footer1', $data);
        } else {
            $this->load->view('auth/template/header2', $data);
            $this->load->view('galeri/index_user');
            $this->load->view('auth/template/footer', $data);
        }
    }

    
    public function tambah(){
        $data['title']='Form Menambahkan Data galeri';
        $this->form_validation->set_rules('tgl_upload', 'tgl_upload','required');
        if (empty($_FILES['image']['name'])) {
            $this->form_validation->set_rules('image', 'image', 'required');
        }
        
        if ($this->form_validation->run() == FALSE){
            # code...
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('galeri/tambah', $data);
            $this->load->view('admin/template/footerAdmin', $data);
        } else{
            # code...
            $this->galeri_model->tambahdatagaleri();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('galeri', 'refresh');
        }
        
    }

    public function hapus($id){
        $this->galeri_model->hapusdatagaleri($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('galeri','refresh');
    }

    public function edit($id){
        $data['title']='Form Edit Data galeri';
        $data['galeri']=$this->galeri_model->getgaleriByID($id);
        
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        
        if ($this->form_validation->run() == FALSE){
            # code...
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('galeri/edit', $data);
            $this->load->view('admin/template/footerAdmin', $data);
        } else{
            # code...
            $this->galeri_model->ubahdatagaleri();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('galeri', 'refresh');
        }
    }

    public function laporan_pdf() {
        
        $this->load->library('pdf');

        $data['galeri']= $this->cetak_model->view();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "datagaleri.pdf";
        $this->pdf->load_view('galeri/laporan', $data);
    }

}

/* End of file Controllername.php */
