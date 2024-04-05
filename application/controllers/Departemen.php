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
            $departemen = $this->input->post('departemen', true);
            $nilai_batas = $this->input->post('nilai_batas', true);
            $jumlah_penerimaan = $this->input->post('jumlah_penerimaan', true);

            // Data untuk ditambahkan
            $dataInsert = [
                'departemen' => $departemen,
                'nilai_batas' => $nilai_batas,
                'jumlah_penerimaan' => $jumlah_penerimaan,
                // Tambahkan field lain sesuai kebutuhan
            ];

            // Panggil model untuk menyimpan dataInsert
            $insert_id = $this->M_Departemen->tambahDepartemen($dataInsert);
            if ($insert_id) {
                $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
                <strong>Selamat!</strong> Departemen Berhasil Ditambah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
                // Jika data berhasil ditambahkan, redirect ke halaman yang sesuai
                redirect('/Departemen/index');
            } else {
                // Jika gagal, tampilkan pesan error atau lakukan sesuatu yang sesuai dengan kebutuhan Anda
                echo 'Gagal menambahkan data departemen.';
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
        $result = $this->M_Departemen->delete_departemen($id);

        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            redirect('Departemen/list_departemen');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Dihapus!</div>');
        }
    }

    public function update($id)
    {
        $data = [
            'departemen' => $this->input->post('departemen'),
            'nilai_batas' => $this->input->post('nilai_batas'),
            'jumlah_penerimaan' => $this->input->post('jumlah_penerimaan'),
        ];

        $result = $this->M_Departemen->update_departemen($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Data Berhasil Diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
        redirect('departemen/list_departemen');
    }
}
