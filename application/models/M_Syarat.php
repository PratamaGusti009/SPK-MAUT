<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Syarat extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_kriteria()
    {
        $result = $this->db->get('kriteria');
        return $result;
    }

    public function insert($data = [])
    {
        $result = $this->db->insert('kriteria', $data);

        return $result;
    }

    public function show($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        $query = $this->db->get('kriteria');

        return $query->row();
    }

    public function update_kriteria($data, $id)
    {
        $this->db->where('id_kriteria', $id);

        return $this->db->update('kriteria', $data);
    }

    public function delete_kriteria($id)
    {
        $this->db->where('id_kriteria', $id);

        return $this->db->delete('kriteria');
    }

    public function hitungkriteria()
    {
        $this->db->where('id_kriteria', null);
        $this->db->from('kriteria');; // Ubah 'penilaian' ke nama tabel Anda

        return $this->db->count_all_results();
    }
}
