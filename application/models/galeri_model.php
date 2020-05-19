<?php

defined('BASEPATH') or exit('No direct script access allowed');

class galeri_model extends CI_Model
{
    public function getAllgaleri()
    {
        // https://www.codeigniter.com/user_guide/database/query_builder.html#selecting-data
        $query = $this->db->get('galeri');

        // https://www.codeigniter.com/user_guide/database/results.html
        return $query->result_array();
    }

    public function tambahdatagaleri()
    {
        $tgl_upload=date('yy-m-d');
        $data=[
            "tgl_upload" => $tgl_upload,
            "foto" => $this->uploadFoto()
        ];
        $this->db->insert('galeri', $data);
    }

    public function hapusdatagaleri($id){
        $this->deleteFoto($id);
        $this->db->where('id', $id);
        $this->db->delete('galeri');
    }

    public function getgaleriByID($id){
        return $this->db->get_where('galeri',['id'=> $id])->row_array(); 
    }

    public function ubahdatagaleri(){
        $data=[
            "tgl_upload" => $this->input->get('tgl_upload',true),
            "foto" => $this->ubahFoto()
        ];
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('galeri',$data);
    }

    public function cariDatagaleri(){
        $keyword=$this->input->post('keyword');
        $this->db->like('id',$keyword);
        return $this->db-> get('galeri')->result_array();
    }

    public function datatabels() {
        $query= $this->db->order_by('id','DESC')->get('galeri');
        return $query->result();
    }

    private function uploadFoto()
    {
        $config['upload_path']          = './uploads/galeri';
        $config['allowed_types']        = 'jpeg|jpg|png|gif|svg';
        $config['max_size']             = '2048';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return "default.jpg";
    }

    private function deleteFoto($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('galeri');
        $row = $query->row();
        unlink("./uploads/galeri/$row->foto");
    }

    private function ubahFoto()
    {
        $id_fotografi = $this->input->post('id');
        $fotografi = $this->getfotografiByID($id);

        if ($fotografi['foto'] == null) {
            # code...
            $foto = $this->uploadFoto();

        }else if (empty($_FILES['image']['name'])) {
            $foto = $this->input->post('fotoLama');

        } else {
            $this->deleteFoto($this->input->post('id'));
            $foto = $this->uploadFoto();
        }
        return $foto;
    }
}