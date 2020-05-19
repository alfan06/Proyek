<?php

defined('BASEPATH') or exit('No direct script access allowed');

class videografi_model extends CI_Model
{
    public function getAllvideografi()
    {
        // https://www.codeigniter.com/user_guide/database/query_builder.html#selecting-data
        $query = $this->db->get('videografi');

        // https://www.codeigniter.com/user_guide/database/results.html
        return $query->result_array();
    }

    public function tambahdatavideografi()
    {
        $data=[
            "nama" => $this->input->post('nama',true),
            "harga" => $this->input->post('harga',true),
            "foto" => $this->uploadFoto()
        ];
        $this->db->insert('videografi', $data);
    }

    public function hapusdatavideografi($id_videografi){
        $this->deleteFoto($id_videografi);
        $this->db->where('id_videografi', $id_videografi);
        $this->db->delete('videografi');
    }

    public function getvideografiByID($id_videografi){
        return $this->db->get_where('videografi',['id_videografi'=> $id_videografi])->row_array(); 
    }

    public function getvideografiByID($id_videografi){
        return $this->db->get_where('videografi',['id_videografi'=> $id_videografi])->row_array(); 
    }

    public function ubahdatavideografi(){
        $data=[
            "nama" => $this->input->post('nama',true),
            "harga" => $this->input->post('harga',true),
            "foto" => $this->ubahFoto()
        ];
        $this->db->where('id_videografi',$this->input->post('id_videografi'));
        $this->db->update('videografi',$data);
    }

    public function cariDatavideografi(){
        $keyword=$this->input->post('keyword');
        $this->db->like('id_videografi',$keyword);
        $this->db->or_like('nama',$keyword);
        $this->db->or_like('harga',$keyword);
        return $this->db-> get('videografi')->result_array();
    }

    public function datatabels() {
        $query= $this->db->order_by('id_videografi','DESC')->get('videografi');
        return $query->result();
    }

    private function uploadFoto()
    {
        $config['upload_path']          = './uploads/foto';
        $config['allowed_types']        = 'jpeg|jpg|png|gif|svg';
        $config['max_size']             = '2048';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return "default.jpg";
    }

    private function deleteFoto($id_videografi)
    {
        $this->db->where('id_videografi', $id_videografi);
        $query = $this->db->get('videografi');
        $row = $query->row();
        unlink("./uploads/foto/$row->foto");
    }

    private function ubahFoto()
    {
        $id_videografi = $this->input->post('id_videografi');
        $videografi = $this->getvideografiByID($id_videografi);

        if ($videografi['foto'] == null) {
            # code...
            $foto = $this->uploadFoto();

        }else if (empty($_FILES['image']['name'])) {
            $foto = $this->input->post('fotoLama');

        } else {
            $this->deleteFoto($this->input->post('id_videografi'));
            $foto = $this->uploadFoto();
        }
        return $foto;
    }
}