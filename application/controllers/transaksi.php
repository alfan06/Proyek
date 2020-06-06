<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
{

    //fungsi yang akan dijalankan saat classnya diinstansiasi
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('user_model');
        $this->load->model('fotografi_model');
        $this->load->model('cetak_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'List Transaksi';
        $data['transaksi'] = $this->Transaksi_model->datatabels();
        $data['transaksi'] = $this->Transaksi_model->getAlltransaksi();

        if ($this->input->post('keyword')) {
            #code...
            $data['transaksi'] = $this->Transaksi_model->cariDatatransaksi();
        }

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('admin/template/footerAdmin');
    }

    public function index_user()
    {
        $data['title'] = 'List Transaksi';
        $data['transaksi'] = $this->Transaksi_model->datatabels();

        $data['transaksi'] = $this->Transaksi_model->getAlltransaksi();

        if ($this->input->post('keyword')) {
            #code...
            $data['transaksi'] = $this->Transaksi_model->cariDatatransaksi();
        }

        $this->load->view('template/header_user', $data);
        $this->load->view('transaksi/index_user', $data);
        $this->load->view('template/footer');
    }

    // public function tambah($id_user,$id_fotografi)
    // {
    //     $data['title'] = 'Form Menambahkan Data Transaksi';
    //     $data=[
    //         "id_user" => $this->input->get('id_user', true),
    //         "id_fotografi" => $this->input->post('id_fotografi', true),
    //     ];
    //     $data['user'] = $this->user_model->getUserById($data['id_user']);
    //     $data['fotografi'] = $this->fotografi_model->getfotografiByID($data['id_fotografi']);
    //     $this->form_validation->set_rules('harga', 'harga', 'required');
    //     $this->form_validation->set_rules('alamatfotografi', 'alamatfotografi', 'required');
        
    //     $status_login = $this->session->userdata('level');
    //     if ($status_login == 'admin') {
    //         if ($this->form_validation->run() == FALSE) {
    //             # code...
    //             $this->load->view('admin/template/header', $data);
    //             $this->load->view('transaksi/tambah', $data);
    //             $this->load->view('template/footer');
    //         } else {
    //             # code...
    //             $this->Transaksi_model->tambahdatatransaksi();
    //             $this->session->set_flashdata('flash-data', 'ditambahkan');
    //             redirect('transaksi', 'refresh');
    //         }
    //     }else{
    //         if ($this->form_validation->run() == FALSE) {
    //             # code...
    //             $this->load->view('user/template/header1', $data);
    //             $this->load->view('fotografi/index_user');
    //             $this->load->view('user/template/footer1', $data);
    //         } else {
    //             # code...
    //             $this->Transaksi_model->tambahdatatransaksi();
    //             $this->session->set_flashdata('flash-data', 'ditambahkan');
    //             redirect('fotografi', 'refresh');
    //         }
    //     }
    // }

    // public function index()
    // {
    //         $data['title'] = 'List fotografi';
    //         $data['fotografi'] = $this->fotografi_model->datatabels();

    //         $data['fotografi']=$this->fotografi_model->getAllfotografi();
    //     $status_login = $this->session->userdata('level');
    //     if ($status_login == 'admin') {
    //         $this->load->view('admin/template/header', $data);
    //         $this->load->view('admin/template/sidebar', $data);
    //         $this->load->view('fotografi/index', $data);
    //         $this->load->view('admin/template/footer', $data);
    //     } elseif ($status_login == 'user') {
    //         $this->load->view('user/template/header1', $data);
    //         $this->load->view('fotografi/index_user');
    //         $this->load->view('user/template/footer1', $data);
    //     } else {
    //         redirect('auth', 'refresh');
    //     }
    // }

    // public function tambah()
    // {
    //     $data['title'] = 'Form Menambahkan Data Transaksi';

    //     //$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'required');
    //     $data['user'] = $this->user_model->getUserById($id_user);
    //     $data['fotografi'] = $this->fotografi_model->getfotografiByID2($id_fotografi);
    //     $this->form_validation->set_rules('harga', 'harga', 'required');
    //     $this->form_validation->set_rules('alamatfotografi', 'alamatfotografi', 'required');

    //                 if ($this->form_validation->run() == FALSE) {
    //                     # code...
    //                     $this->load->view('admin/template/header', $data);
    //                     $this->load->view('transaksi/tambah', $data);
    //                     $this->load->view('template/footer');
    //                 } else {
    //                     # code...
    //                     $this->Transaksi_model->tambahdatatransaksi();
    //                     $this->session->set_flashdata('flash-data', 'ditambahkan');
    //                     redirect('transaksi', 'refresh');
    //                 }
    //         //     
    // }

    public function tambah()
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('transaksi', 'refresh');
        } elseif ($status_login == 'admin') {
            $data['title'] = 'Form Add Transaction Data';
            $this->load->library('form_validation');
            $data['user'] = $this->user_model->getAllUser();
            $data['fotografi'] = $this->fotografi_model->getAllfotografi();
            $this->form_validation->set_rules('alamatfotografi', 'alamatfotografi', 'required');


            if ($this->form_validation->run() == FALSE) {
                #code...
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/template/sidebar', $data);
                $this->load->view('transaksi/tambah', $data);
                $this->load->view('admin/template/footerAdmin');
            } else {
                $this->Transaksi_model->tambahdatatransaksi();
                $this->session->set_flashdata('flash-data', 'Added');
                redirect('transaksi', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    //coba
    public function tambah_user()
    {
            $data['title'] = 'Form Add Transaction Data';
            $this->load->library('form_validation');
            $data['user'] = $this->input->get('id_user', true);
            $data['fotografi'] = $this->input->get('id_penyewa', true);
            $this->form_validation->set_rules('alamatfotografi', 'alamatfotografi', 'required');

            $this->Transaksi_model->tambahdatatransaksi();
            $this->session->set_flashdata('flash-data', 'Added');
            redirect('fotografi', 'refresh');
            
    }

    public function hapus($id)
    {
        $this->Transaksi_model->hapusdatatransaksi($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('transaksi', 'refresh');
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Data Transaksi';
        $data['transaksi'] = $this->Transaksi_model->gettransaksiByID($id);
        $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'required');
        $data['user'] = $this->user_model->getAlluser();
        $data['fotografi'] = $this->fotografi_model->getAllfotografi();
        $this->form_validation->set_rules('tgl_transaksi', 'tgl_transaksi', 'required');
        $this->form_validation->set_rules('alamatfotografi', 'alamatfotografi', 'required');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('transaksi/edit', $data);
            $this->load->view('admin/template/footerAdmin');
        } else {
            # code...
            $this->Transaksi_model->ubahdatatransaksi();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('transaksi', 'refresh');
        }
    }

    public function laporan_pdfTransaksi()
    {

        $this->load->library('pdf');

        $data['transaksi'] = $this->cetak_model->viewTransaksi();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "datatransaksi.pdf";
        $this->pdf->load_view('transaksi/laporan', $data);
    }

    public function user_transaki()
    {
        $data['title'] = 'List Transaksi';
        $data['transaksi'] = $this->Transaksi_model->datatabels();
        $id_user = $this->session->userdata('id_user');
        $data['transaksi'] = $this->Transaksi_model->gettransaksibyidUser($id_user);
        $this->load->view('user/template/header2', $data);
        $this->load->view('user/template/header1', $data);
        $this->load->view('transaksi/index_userID', $data);
        $this->load->view('user/template/footer1', $data);
    }
}

/* End of file transaksi.php */
