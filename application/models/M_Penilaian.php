<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Penilaian extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_penilaian()
    {
        $query = $this->db->get('penilaian');

        return $query->result();
    }

    public function tambah_penilaian($id_alternatif, $id_kriteria, $nilai)
    {
        $query = $this->db->simple_query("INSERT INTO penilaian VALUES (DEFAULT,'$id_alternatif','$id_kriteria',$nilai);");

        return $query;
    }

    public function edit_penilaian($id_alternatif, $id_kriteria, $nilai)
    {
        $query = $this->db->simple_query("UPDATE penilaian SET nilai=$nilai WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria';");

        return $query;
    }

    public function delete($id_penilaian)
    {
        $this->db->where('id_penilaian', $id_penilaian);
        $this->db->delete('penilaian');
    }

    public function get_kriteria()
    {
        $query = $this->db->get('kriteria');

        return $query->result();
    }

    public function get_alternatif()
    {
        $query = $this->db->query('SELECT * FROM alternatif');

        return $query->result();
    }

    public function get_sub_kriteria()
    {
        $query = $this->db->get('sub_kriteria');

        return $query->result();
    }

    public function data_penilaian($id_alternatif, $id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria';");

        return $query->row_array();
    }

    public function untuk_tombol($id_alternatif)
    {
        $query = $this->db->query("SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif';");

        return $query->num_rows();
    }

    public function data_sub_kriteria($id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM sub_kriteria WHERE id_kriteria='$id_kriteria' ORDER BY nilai DESC;");

        return $query->result_array();
    }

    public function data_nilai($id_alternatif, $id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM penilaian JOIN sub_kriteria WHERE penilaian.nilai=sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif='$id_alternatif' AND penilaian.id_kriteria='$id_kriteria';");

        return $query->row_array();
    }

    public function count_all_data()
    {
        // Implementasi untuk menghitung total data dalam tabel
        return $this->db->get('alternatif')->num_rows();
    }

    public function getAlternatif($limit, $start)
    {
        return $this->db->get('alternatif', $limit, $start)->result_array();
    }

    // mencari apakah sudah input penilaian atau tidak
    public function is_input_penilaian($id_alternatif)
    {
        // Lakukan pencarian data berdasarkan id_alternatif
        $query = $this->db->get_where('penilaian', ['id_alternatif' => $id_alternatif]);

        // Periksa apakah ada data yang cocok
        if ($query->num_rows() > 0) {
            // Jika ada, kembalikan data yang cocok
            return $query->row_array();
        } else {
            // Jika tidak, kembalikan null
            return null;
        }
    }

    public function getUnratedCountByCriteria($criteria_id)
    {
        // Tentukan nama tabel yang sesuai (misalnya 'penilaian')
        $this->db->where('id_kriteria', $criteria_id);
        $this->db->where('nilai', 0);
        $this->db->from('penilaian'); // Nama tabel penilaian, sesuaikan dengan database Anda

        return $this->db->count_all_results();
    }
}
