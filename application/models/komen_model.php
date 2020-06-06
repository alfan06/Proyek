<?php

defined('BASEPATH') or exit('No direct script access allowed');

class komen_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('komen t');
        $this->db->join('user u', 'u.id_user = t.id_user');
        $this->db->join('fotografi d', 'd.id_fotografi = t.id_fotografi');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tambahkomen()
    {
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "id_fotografi" => $this->input->post('id_fotografi', true),
            "isi" => $this->input->post('isi', true)
        ];
        $this->db->insert('komen', $data);

    }

    public function hapusdatakomentar($id_komentar)
    {
        $this->db->where('id_komentar', $id_komentar);
        $this->db->delete('komen');
    }

    public function getkomenbyid($id_fotografi)
    {
        $this->db->select('*');
        $this->db->from('komen t');
        $this->db->join('user u', 'u.id_user = t.id_user');
        $this->db->where(['t.id_fotografi' => $id_fotografi]);
        $query = $this->db->get();
        return $query->result_array();
    }
}