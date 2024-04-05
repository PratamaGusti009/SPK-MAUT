<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{

    public function index()
    {
        $shouldShowSubmit = true; // Ganti dengan logika yang sesuai

        // Set session untuk menentukan status tombol di halaman index
        $this->session->set_userdata('showSubmit', $shouldShowSubmit);

        $this->load->view('Coba/index');
    }

    public function process_form()
    {
        // Proses data formulir

        // Redirect ke halaman baru setelah data berhasil diproses
        redirect('Coba/success_page');
    }

    public function success_page()
    {
        // Tampilkan halaman sukses
        $this->load->view('Coba/muncul');
    }
}
