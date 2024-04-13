<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Penilaian');
        $this->load->model('M_Alternatif');
        $this->load->model('M_Admin');
    }

    public function index()
    {
        $data['title'] = 'Administration';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        // Dapatkan jumlah penilaian yang belum dinilai berdasarkan id_kriteria 25
        $unratedCount = $this->M_Penilaian->getUnratedCountByCriteria(25);

        // Dapatkan jumlah pendaftar laki-laki dan perempuan
        $maleCount = $this->M_Alternatif->getCountByGender('Pria');
        $femaleCount = $this->M_Alternatif->getCountByGender('Wanita');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);

        // Tentukan data yang akan diberikan ke view
        $data = [
            'unratedCount' => $unratedCount,
            // Tambahkan variabel lain yang diperlukan untuk view
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            // Data lain yang diperlukan
        ];

        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function user_admin()
    {
        $data['title'] = 'Data Admin';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        // Mendapatkan data admin dari model
        $data['admin'] = $this->M_Admin->get_all_admin()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user_admin', $data);
        $this->load->view('templates/footer');
    }
}
