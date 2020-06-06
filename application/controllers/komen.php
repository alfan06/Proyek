<?php

defined('BASEPATH') or exit('No direct script access allowed');

class komen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('komen_model');
        $this->load->model('user_model');
        $this->load->model('fotografi_model');
        $this->load->model('cetak_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function kirimKomen() {
        $data['title'] = 'Form Add Transaction Data';
        $this->load->library('form_validation');
        $data['user'] = $this->input->get('id_user', true);
        $data['fotografi'] = $this->input->get('id_penyewa', true);
        $this->form_validation->set_rules('isi', 'isi');

        $this->komen_model->tambahkomen();
        $this->session->set_flashdata('flash-data', 'Added');
        redirect('fotografi', 'refresh');
	}

	public function hapus($id_komen)
    {
        $this->komen_model->hapusdatakomen($id_komen);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('komen', 'refresh');
    }
}

/* End of file Forum.php */
