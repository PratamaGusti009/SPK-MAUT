<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Perhitungan');
        $this->load->model('M_Departemen');
        $this->load->model('M_Alternatif');
    }

    public function index()
    {
        $data['title'] = 'Hasil';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        // Ambil data kriteria dari model
        $kriterias = $this->M_Perhitungan->get_kriteria()->result_array();

        // Inisialisasi array untuk menyimpan bobot
        $bobot_array = [];

        // Menghitung total bobot dan menyimpan bobot ke dalam array baru
        $total = 0;
        foreach ($kriterias as $item) {
            // Menggunakan is_numeric untuk memeriksa apakah nilai bobot berisi angka
            if (is_numeric($item['bobot'])) {
                // Menyimpan nilai bobot ke dalam array baru
                $bobot_array[] = $item['bobot'];
                // Menjumlahkan bobot
                $total += $item['bobot'];
            }
        }

        // Menghitung nilai normalisasi dan menyimpannya dalam array baru
        $hasil_normalisasi = [];
        foreach ($bobot_array as $value) {
            // Menghitung nilai rata-rata normalisasi
            $average = $value / $total;
            // Menambahkan nilai yang telah diformat ke dalam array baru
            $hasil_normalisasi[] = (float) number_format($average, 4);
        }

        // Menambahkan nilai normalisasi ke dalam data kriteria
        for ($i = 0; $i < count($kriterias); ++$i) {
            $kriterias[$i]['nilai_normalisasi'] = $hasil_normalisasi[$i];
        }

        // Mengirimkan data ke view
        $data['nilai_normalisasi'] = $hasil_normalisasi;
        $data['kriteria'] = $kriterias;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);

        $data = [
            'alternatif' => $this->M_Perhitungan->get_alternatif(),
        ];

        $this->load->view('perhitungan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function hasil()
    {
        $data['title'] = 'Hasil';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);

        $kriteria = $this->M_Perhitungan->get_kriteria()->result_array();
        $alternatif = $this->M_Perhitungan->get_alternatif();
        $hasil_akhir = $this->M_Perhitungan->get_hasil();
        // $hasil_ = $this->M_Perhitungan->get_hasil_join_alternatif();
        // var_dump($hasil_akhir);
        // exit;
        // $this->M_Perhitungan->hapus_hasil();
        foreach ($alternatif as $keys) {
            $nilai_total = 0;
            foreach ($kriteria as $key) {
                // Cek apakah data nilai cocok untuk kriteria dan alternatif yang diberikan
                $data_pencocokan = $this->M_Perhitungan->data_nilai($keys['id_alternatif'], $key['id_kriteria']);

                // Jika data_pencocokan tidak null (artinya data ditemukan), lanjutkan perhitungan
                if ($data_pencocokan !== null) {
                    $min_max = $this->M_Perhitungan->get_max_min($key['id_kriteria']);
                    $denominator = ($min_max['max'] - $min_max['min']);
                    if ($denominator != 0) {
                        $hasil_normalisasi = round(($data_pencocokan['nilai'] - $min_max['min']) / $denominator, 4);
                    } else {
                        // Lakukan tindakan yang sesuai jika pembagian dengan nol terjadi
                        $hasil_normalisasi = 0; // Atau atur nilai lain sesuai kebutuhan
                    }
                } else {
                    // Lakukan tindakan yang sesuai jika data tidak ditemukan
                    // Misalnya, lewati perhitungan atau atur nilai default
                    $hasil_normalisasi = 0; // Atau atur nilai lain sesuai kebutuhan
                }
            }
        }

        $data = [
            'hasil' => $hasil_akhir,
        ];
        $this->load->view('Perhitungan/hasil', $data);
        $this->load->view('templates/footer', $data);
    }

    public function updateStatus()
    {
        // Ambil nilai id_alternatif dan value dari permintaan POST
        $id_alternatif = $this->input->post('id_alternatif');
        $value = $this->input->post('status');

        // Panggil model untuk memperbarui status
        $result = $this->M_Alternatif->updateStatusModel($id_alternatif, $value);

        // Tanggapi keberhasilan atau kegagalan operasi
        if ($result) {
            // Pembaruan berhasil
            $this->session->set_flashdata('success', 'Status berhasil diperbarui');
        } else {
            // Pembaruan gagal
            $this->session->set_flashdata('error', 'Gagal memperbarui status');
        }

        // Refresh halaman saat ini dan kirim pesan flash
        redirect('Perhitungan/hasil');
    }
}
