<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Departemen extends CI_Model
{
    public function tambahDepartemen($data)
    {
        $this->db->insert('departemen', $data);

        return $this->db->insert_id();
    }

    public function getDataDepartemen()
    {
        // Ambil data dari tabel 'departemen'
        $query = $this->db->get('departemen');

        // Cek apakah ada data yang ditemukan
        if ($query->num_rows() > 0) {
            // Jika ada, kembalikan data dalam bentuk array
            return $query->result_array();
        } else {
            // Jika tidak ada data, kembalikan array kosong
            return [];
        }
    }

    public function delete_departemen($id)
    {
        $this->db->where('id_departemen', $id);

        return $this->db->delete('departemen');
    }

    public function getDataDepartemenById($id)
    {
        // Ambil data departemen berdasarkan ID
        $this->db->where('id_departemen', $id);
        $query = $this->db->get('departemen');

        // Cek apakah ada data yang ditemukan
        if ($query->num_rows() > 0) {
            // Jika ada, kembalikan data dalam bentuk objek
            return $query->row();
        } else {
            // Jika tidak ada data, kembalikan null
            return null;
        }
    }

    public function update_departemen($data, $id)
    {
        $this->db->where('id_departemen', $id);

        return $this->db->update('departemen', $data);
    }

    public function search($keyword)
    {
        $this->db->like('departemen', $keyword); // Menyesuaikan dengan kolom di tabel Anda

        return $this->db->get('departemen')->result_array();
    }

    public function getDepartemenNameById($id)
    {
        // Ambil data departemen berdasarkan ID
        $this->db->where('nama_departemen', $id);
        $query = $this->db->get('departemen');

        // Cek apakah ada data yang ditemukan
        if ($query->num_rows() > 0) {
            // Jika ada, kembalikan data dalam bentuk objek
            return $query->row();
        } else {
            // Jika tidak ada data, kembalikan null
            return null;
        }
    }
}
