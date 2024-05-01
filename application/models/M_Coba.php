<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Coba extends CI_Model
{
    // Fungsi untuk mengambil semua data penilaian dan nama_alternatif dari tabel alternatif
    public function get_all_penilaian()
    {
        // Lakukan join antara tabel penilaian dan alternatif
        $this->db->select('penilaian.id_alternatif, alternatif.nama AS nama_alternatif');
        $this->db->from('penilaian');
        $this->db->join('alternatif', 'penilaian.id_alternatif = alternatif.id_alternatif');
        $query = $this->db->get();

        return $query->result_array();
    }

    // Fungsi untuk memperbarui data penilaian
    public function update_penilaian($id_alternatif, $nama_alternatif)
    {
        // Update data di tabel alternatif
        $data = [
            'nama' => $nama_alternatif,
        ];
        $this->db->where('id', $id_alternatif);
        $this->db->update('alternatif', $data);
    }
}
