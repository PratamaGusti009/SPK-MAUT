<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{
    public function index()
    {
        // Load view
        $this->load->view('coba/index');
    }

    public function check_range()
    {
        // Ambil nilai input dari pengguna
        $value = $this->input->post('value');

        // Query database untuk mendapatkan rentang nilai yang cocok dari tabel sub_kriteria
        $query = $this->db->get('sub_kriteria');

        $found = false;
        foreach ($query->result() as $row) {
            // Ekstrak min_range dan max_range dari kolom deskripsi
            list($min_range, $max_range) = sscanf($row->deskripsi, '%d - %d');

            // Cek apakah nilai berada dalam rentang
            if ($value >= $min_range && $value <= $max_range) {
                // Jika nilai cocok dengan rentang, simpan id_sub_kriteria ke tabel penilaian
                $data = [
                    'id_sub_kriteria' => $row->id_sub_kriteria,
                    // Masukkan value ke dalam kolom nilai pada tabel penilaian
                    'nilai' => $value,
                ];
                $this->db->insert('penilaian', $data);

                echo "Nilai $value berada dalam rentang: {$row->deskripsi} (id sub kriteria: {$row->id_sub_kriteria}). Nilai telah disimpan ke dalam tabel penilaian.";
                $found = true;
                break;
            }
        }

        if (!$found) {
            // Jika nilai tidak cocok dengan rentang manapun
            echo "Nilai $value tidak berada dalam rentang yang ditentukan.";
        }
    }
}
