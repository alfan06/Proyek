<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function getAllUser()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function datatabels() {
        $query = $this->db->order_by('id_user', 'DESC')->get('user');
        return $query->result();
    }

    public function getUserById($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row();
    }

    public function getUserById2($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->result_array();
    }

    public function ubahDataUser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "username" => $this->input->post('username', true),
            "email" => $this->input->post('email', true),
            // "harga" => $this->input->post('harga',true),
            // "foto" => $this->ubahFoto(),
            "level" => $this->input->post('level', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->where('id_user', $this->input->post('id_user', true));
        $this->db->update('user', $data);
    }

    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get('user')->result_array();
    }

    public function hapusDataUser($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }
    public function changePassword()
    {
        $password = [
            "password" => htmlspecialchars(MD5($this->input->post('password', true)))
        ];
        $this->db->where('id_user', $this->input->post('id_user', true));
        $this->db->update('user', $password);
    }

    private function uploadFoto()
    {
        $config['upload_path']          = './uploads/profil';
        $config['allowed_types']        = 'jpeg|jpg|png|gif|svg';
        $config['max_size']             = '2048';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return "default.jpg";
    }

    private function deleteFoto($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user');
        $row = $query->row();
        unlink("./uploads/profil/$row->foto");
    }

    private function ubahFoto()
    {
        $id_user = $this->input->post('id_user');
        $user = $this->getUserById($id_user);

        if ($user['foto'] == null) {
            # code...
            $foto = $this->uploadFoto();

        }else if (empty($_FILES['image']['name'])) {
            $foto = $this->input->post('fotoLama');

        } else {
            $this->deleteFoto($this->input->post('id_user'));
            $foto = $this->uploadFoto();
        }
        return $foto;
    }
}