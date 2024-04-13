<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Alternatif extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_alternatif()
    {
        return $this->db->get('alternatif')->result_array();
    }

    public function insert($data = [])
    {
        $result = $this->db->insert('alternatif', $data);

        return $result;
    }

    public function show($id_alternatif)
    {
        $this->db->where('id_alternatif', $id_alternatif);
        $query = $this->db->get('alternatif');

        return $query->row();
    }

    public function update_alternatif($data, $id)
    {
        $this->db->where('id_alternatif', $id);

        return $this->db->update('alternatif', $data);
    }

    public function delete_alternatif($id)
    {
        $this->db->where('id_alternatif', $id);

        return $this->db->delete('alternatif');
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

    // public function cariDataAlternatif()
    // {
    //     $keyword = $this->input->post('keyword', true);

    //     // Gunakan WHERE untuk pencarian yang lebih tepat
    //     $this->db->like('nama', $keyword);
    //     $this->db->or_like('nik', $keyword);
    //     $this->db->or_like('departemen', $keyword);

    //     // Jalankan kueri dan kembalikan hasilnya dalam bentuk array
    //     $result = $this->db->get('alternatif');

    //     return $result->result_array();
    // }

    public function search($keyword)
    {
        $this->db->like('nama', $keyword);
        $this->db->or_like('nik', $keyword);
        $this->db->or_like('nama_departemen', $keyword); // Menyesuaikan dengan kolom di tabel Anda

        return $this->db->get('alternatif')->result_array();
    }

    public function updateStatusModel($id_alternatif, $value)
    {
        // Persiapkan data yang akan diupdate
        $data = [
            'status' => $value,
        ];

        // Lakukan pembaruan di tabel alternatif
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->update('alternatif', $data);

        // Memeriksa apakah pembaruan berhasil atau tidak
        if ($this->db->affected_rows() > 0) {
            return true; // Pembaruan berhasil
        } else {
            return false; // Pembaruan gagal
        }
    }

    public function getCountByGender($gender)
    {
        $this->db->where('jenis_kelamin', $gender);
        $this->db->from('alternatif');

        return $this->db->count_all_results();
    }
}
