<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Coba extends CI_Model
{
    public function sumValues()
    {
        $this->db->select_sum('bobot'); // nilai adalah nama kolom yang ingin Anda jumlahkan
        $query = $this->db->get('kriteria'); // ganti nama_tabel dengan nama tabel Anda

        return $query->row()->bobot;
    }
}
