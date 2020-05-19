<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_model extends CI_Model
{

    public function getAlltransaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('user u', 'u.id_user = t.id_user');
        $this->db->join('fotografi d', 'd.id_fotografi = t.id_fotografi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTransaksiUser($id_user)
    {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('user u', 'u.id_user = t.id_user');
        $this->db->join('fotografi d', 'd.id_fotografi = t.id_fotografi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambahdatatransaksi()
    {
        $tgl_transaksi=date('y-m-d');
        $data = [
            "id_transaksi" => $this->input->post('id_transaksi', true),
            "id_user" => $this->input->post('id_user', true),
            "id_fotografi" => $this->input->post('id_fotografi', true),
            "tgl_transaksi" => $tgl_transaksi,
            "alamatfotografi" => $this->input->post('alamatfotografi', true)
        ];
        $this->db->insert('transaksi', $data);

    }

    public function hapusdatatransaksi($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
    }

    public function gettransaksiByID($id)
    {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id])->row_array();
    }

    public function getuserByID($id_user)
    {
        return $this->db->get_where('transaksi', ['id_user' => $id_user])->row_array();
    }

    public function ubahdatatransaksi()
    {
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "id_fotografi" => $this->input->post('id_fotografi', true),
            "tgl_transaksi" => $this->input->post('tgl_transaksi', true),
            "alamatfotografi" => $this->input->post('alamatfotografi', true)
        ];
        $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
        $this->db->update('transaksi', $data);

    }

    public function cariDatatransaksi()
    {
        $keyword = $this->input->post('keyword');
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('user u', 'u.id_user = t.id_user');
        $this->db->join('fotografi d', 'd.id_fotografi = t.id_fotografi');
        $this->db->like('id_transaksi', $keyword);
        $this->db->or_like('t.id_fotografi', $keyword);
        $this->db->or_like('u.nama', $keyword);
        $this->db->or_like('d.nama', $keyword);
        $this->db->or_like('t.harga', $keyword);
        $this->db->or_like('t.tgl_transaksi', $keyword);
        $this->db->or_like('t.alamatfotografi', $keyword);
        $query = $this->db->get();
        return $query->result_array();

        // return $this->db-> get('transaksi')->result_array();
    }

    public function datatabels()
    {
        $query = $this->db->order_by('id_transaksi', 'DESC')->get('transaksi');
        return $query->result();
    }
}
/* End of file ModelName.php */
