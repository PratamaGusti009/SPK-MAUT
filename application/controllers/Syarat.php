<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Syarat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Syarat');
    }

    public function index()
    {
        $data['title'] = 'Kriteria';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();
        // Ambil data kriteria dari model
        $kriterias = $this->M_Syarat->get_all_kriteria()->result_array();

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

           // Penjumlahan nilai normalisasi
        $total_nilai_normalisasi = array_sum($hasil_normalisasi);

        // Mengirimkan data ke view
        $data['nilai_normalisasi'] = $hasil_normalisasi;
        $data['_kriteria'] = $kriterias;
        $data['total'] = $total;
        $data['total_nilai_normalisasi'] = $total_nilai_normalisasi;


        // var_dump($data['kriterias'] = $kriterias);
        // exit;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('syarat/index', $data);
        $this->load->view('templates/footer', $data);
    }

    // menambahkan data ke database
    public function tambah()
    {
        $data = [
            'kode_kriteria' => $this->input->post('kode_kriteria'),
            'keterangan' => $this->input->post('nama_kriteria'),
            'bobot' => $this->input->post('bobot'),
        ];

        $this->M_Syarat->insert($data, 'kriteria');
        $this->session->set_flashdata('psyarat', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
        redirect('Syarat/index');
    }

    public function update($id)
    {
        $data = [
            'kode_kriteria' => $this->input->post('kode_kriteria'), // Sesuaikan dengan nama input pada form
            'keterangan' => $this->input->post('nama_kriteria'), // Sesuaikan dengan nama input pada form
            'bobot' => $this->input->post('bobot'),
        ];

        $result = $this->M_Syarat->update_kriteria($data, $id);
        if ($result) {
            $this->session->set_flashdata('psyarat', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        } else {
            $this->session->set_flashdata('psyarat', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Gagal Mengubah Data! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        }
        redirect('Syarat');
    }

    public function destroy($id)
    {
        $this->load->model('M_Syarat');
        $result = $this->M_Syarat->delete_kriteria($id);

        if ($result) {
            $this->session->set_flashdata('psayarat', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            redirect('Syarat');
        } else {
            $this->session->set_flashdata('psayarat', '<div class="alert alert-danger" role="alert">Data Gagal Dihapus!</div>');
        }
    }
}
