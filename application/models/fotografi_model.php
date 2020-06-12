<?php

defined('BASEPATH') or exit('No direct script access allowed');

class fotografi_model extends CI_Model
{
    public function getAllfotografi()
    {
        // https://www.codeigniter.com/user_guide/database/query_builder.html#selecting-data
        $query = $this->db->get('fotografi');

        // https://www.codeigniter.com/user_guide/database/results.html
        return $query->result_array();
    }

    public function tambahdatafotografi()
    {
        $data=[
            "nama" => $this->input->post('nama',true),
            "harga" => $this->input->post('harga',true),
            "foto" => $this->uploadFoto()
        ];
        $this->db->insert('fotografi', $data);
    }

    public function hapusdatafotografi($id_fotografi){
        $this->deleteFoto($id_fotografi);
        $this->db->where('id_fotografi', $id_fotografi);
        $this->db->delete('fotografi');
    }

    public function getfotografiByID($id_fotografi){
        return $this->db->get_where('fotografi', ['id_fotografi'=> $id_fotografi])->row_array(); 
    }

    public function getfotografiByID2($id_fotografi){
        return $this->db->get_where('fotografi',['id_fotografi'=> $id_fotografi])->result_array(); 
    }

    public function ubahdatafotografi(){
        $data = [
            "nama" => $this->input->post('nama', true),
            "harga" => $this->input->post('harga', true)
            // "foto" => $this->ubahFoto()
        ];
        $this->db->where('id_fotografi', $this->input->post('id_fotografi', true));
        $this->db->update('fotografi', $data);
    }

    public function cariDatafotografi(){
        $keyword=$this->input->post('keyword');
        $this->db->like('id_fotografi',$keyword);
        $this->db->or_like('nama',$keyword);
        $this->db->or_like('harga',$keyword);
        return $this->db-> get('fotografi')->result_array();
    }

    public function datatabels() {
        $query= $this->db->order_by('id_fotografi','DESC')->get('fotografi');
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
    }

    private function deleteFoto($id_fotografi)
    {
        $this->db->where('id_fotografi', $id_fotografi);
        $query = $this->db->get('fotografi');
        $row = $query->row();
        unlink("./uploads/foto/$row->foto");
    }

    // private function ubahFoto()
    // {
    //     $id_fotografi = $this->input->post('id_fotografi');
    //     $fotografi = $this->getfotografiByID($id_fotografi);

    //     if ($fotografi['foto'] == null) {
    //         # code...
    //         $foto = $this->uploadFoto();

    //     }else if (empty($_FILES['image']['name'])) {
    //         $foto = $this->input->post('fotoLama');

    //     } else {
    //         $this->deleteFoto($this->input->post('id_fotografi'));
    //         $foto = $this->uploadFoto();
    //     }
    //     return $foto;
    // }
}