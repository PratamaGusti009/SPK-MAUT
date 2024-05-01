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

    // Metode untuk memperbarui data penilaian
    public function update_penilaian($data)
    {
        // Gunakan CI Query Builder untuk memperbarui data penilaian
        $this->db->where('id_alternatif', $data['id_alternatif']);
        $this->db->where('id_kriteria', $data['id_kriteria']);

        return $this->db->update('penilaian', ['nilai' => $data['nilai']]);
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

    // Metode untuk mengambil data sub kriteria berdasarkan ID kriteria
    public function data_sub_kriteria($id_kriteria)
    {
        // Query untuk mendapatkan data sub kriteria berdasarkan ID kriteria
        $this->db->select('*');
        $this->db->from('sub_kriteria');
        $this->db->where('id_kriteria', $id_kriteria);
        $query = $this->db->get();

        return $query->result_array();
    }

    // Metode untuk mendapatkan data penilaian berdasarkan ID alternatif dan ID kriteria
    public function data_penilaian($id_alternatif, $id_kriteria)
    {
        // Query untuk mendapatkan data penilaian berdasarkan ID alternatif dan ID kriteria
        $this->db->select('id_sub_kriteria, nilai');
        $this->db->from('penilaian');
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->where('id_kriteria', $id_kriteria);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function untuk_tombol($id_alternatif)
    {
        $query = $this->db->query("SELECT * FROM penilaian WHERE id_alternatif = '$id_alternatif';");

        return $query->num_rows();
    }

    public function data_nilai($id_alternatif, $id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM penilaian JOIN sub_kriteria WHERE penilaian.nilai = sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif = '$id_alternatif' AND penilaian.id_kriteria = '$id_kriteria';");

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
        $this->db->where('id_sub_kriteria', 0);
        $this->db->from('penilaian'); // Nama tabel penilaian, sesuaikan dengan database Anda

        return $this->db->count_all_results();
    }


    // public function edit_penilaian_admin($id_alternatif, $id_kriteria, $nilai)
    // {
    //     // Mencari id_sub_kriteria berdasarkan id_kriteria dan range nilai yang sesuai
    //     // Menggunakan REGEXP untuk mencocokkan nilai dengan deskripsi rentang
    //     $this->db->select('id_sub_kriteria');
    //     $this->db->from('sub_kriteria');
    //     $this->db->where('id_kriteria', $id_kriteria);

    //     // Gunakan REGEXP untuk mencocokkan nilai dalam rentang deskripsi (format "80 - 100")
    //     $this->db->where("CONCAT('$', deskripsi, '$') REGEXP", "$nilai - $");

    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         $result = $query->row();
    //         $id_sub_kriteria = $result->id_sub_kriteria;

    //         // Masukkan nilai penilaian ke tabel penilaian
    //         $data = [
    //             'id_alternatif' => $id_alternatif,
    //             'id_kriteria' => $id_kriteria,
    //             'id_sub_kriteria' => $id_sub_kriteria,
    //             'nilai' => $nilai,
    //         ];

    //         $this->db->insert('penilaian', $data);

    //         return true;
    //     } else {
    //         return false; // Jika tidak menemukan id_sub_kriteria
    //     }
    // }

    // Model USER//

    // jangan diubah
    public function tambah_penilaian_public($id_alternatif, $id_kriteria, $id_sub_kriteria)
    {
        $query = $this->db->simple_query("INSERT INTO penilaian (id_alternatif, id_kriteria, id_sub_kriteria) VALUES ('$id_alternatif', '$id_kriteria', '$id_sub_kriteria')");

        return $query;
    }
    // jangan diubah

    public function edit_penilaian_public($id_alternatif, $id_kriteria, $id_sub_kriteria)
    {
        // Query untuk memperbarui nilai penilaian berdasarkan id_alternatif dan id_kriteria
        $this->db->set('id_sub_kriteria', $id_sub_kriteria);
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->where('id_kriteria', $id_kriteria);

        // Eksekusi pembaruan
        $query = $this->db->update('penilaian');

        // Cek hasil query dan kembalikan true atau false
        if ($query) {
            return true;
        } else {
            // Menangani error jika diperlukan
            log_message('error', 'Gagal memperbarui penilaian untuk id_alternatif: '.$id_alternatif.' dan id_kriteria: '.$id_kriteria);

            return false;
        }
    }
}
