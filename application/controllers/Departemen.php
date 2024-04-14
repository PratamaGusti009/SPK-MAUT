<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Departemen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // Load model Departemen_model.php
        $this->load->model('M_Departemen');
    }

    public function index()
    {
        if ($this->input->method() == 'post') {
            // Ambil data yang dikirimkan melalui form
            $nama_departemen = $this->input->post('nama_departemen', true);
            $nilai_batas = $this->input->post('nilai_batas', true);
            $jumlah_penerimaan = $this->input->post('jumlah_penerimaan', true);

            // Data untuk ditambahkan
            $dataInsert = [
                'nama_departemen' => $nama_departemen,
                'nilai_batas' => $nilai_batas,
                'jumlah_penerimaan' => $jumlah_penerimaan,
                // Tambahkan field lain sesuai kebutuhan
            ];

            // Panggil model untuk menyimpan dataInsert
            $insert_id = $this->M_Departemen->tambahDepartemen($dataInsert);
            if ($insert_id) {
                $this->session->set_flashdata('flash', 'Data berhasil ditambahkan!');
                // Jika data berhasil ditambahkan, redirect ke halaman yang sesuai
                redirect('/Departemen/list_departemen');
            } else {
                // Jika gagal, tampilkan pesan error atau lakukan sesuatu yang sesuai dengan kebutuhan Anda
                this->session->set_flashdata('flash', 'Data gagal ditambahkan!');
            }
        } else {
            $data['title'] = 'Departemen';
            $data['user'] = $this->db->get_where('admin', [
                'email' => $this->session->userdata('email'),
            ])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);

            // Lebih baik memisahkan pemrosesan data dari rendering view
            $this->load->view('departemen/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function list_departemen()
    {
        $data['title'] = 'Departemen';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        $data['list_departemen'] = $this->M_Departemen->getDataDepartemen();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('departemen/list_departemen', $data);
        $this->load->view('templates/footer', $data);
    }

    public function destroy($id)
    {
        // Lakukan operasi penghapusan data
        $result = $this->M_Departemen->delete_departemen($id);

        // Periksa apakah operasi penghapusan berhasil
        if ($result) {
            // Set flash data untuk pesan sukses
            $this->session->set_flashdata('flash', 'Data berhasil Dihapus!');
        } else {
            // Set flash data untuk pesan error
            $this->session->set_flashdata('flash', 'Data gagal Dihapus!');
        }

        // Redirect ke halaman departemen
        redirect('Departemen/list_departemen');
    }

    public function update($id)
    {
        $data = [
            'nama_departemen' => $this->input->post('nama_departemen'),
            'nilai_batas' => $this->input->post('nilai_batas'),
            'jumlah_penerimaan' => $this->input->post('jumlah_penerimaan'),
        ];

        $result = $this->M_Departemen->update_departemen($data, $id);
        $this->session->set_flashdata('flash', 'Data berhasil diubah!');
        redirect('departemen/list_departemen');
    }
}
