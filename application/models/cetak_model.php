<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cetak_model extends CI_Model
{
    public function viewFotografi()
    {
        $this->db->select('*');
        $query = $this->db->get('fotografi');
        return $query->result();
    }

    public function viewTransaksi()
    {
        $query = $this->db->query("select * from transaksi t join user p on p.id_user = t.id_user join fotografi k on k.id_fotografi = t.id_fotografi");
        return $query->result();
    }

    public function viewUser()
    {
        $this->db->select('*');
        $query = $this->db->get('user');
        return $query->result();
    }
}
