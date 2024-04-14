<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Pelamar';

        $data['user'] = $this->db->get_where('alternatif', [
            'email' => $this->session->userdata('email'),
        ])->row_array();
        // var_dump($data['user']['status']);
        // exit;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('alternatif', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        // Tetapkan aturan validasi untuk nama
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        // Jika ada gambar yang diunggah
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            // Konfigurasi upload file
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // batas ukuran file dalam KB (2MB)

            // Load library upload
            $this->load->library('upload', $config);

            // Lakukan upload
            if ($this->upload->do_upload('image')) {
                // File berhasil diunggah
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];

                // Perbarui kolom image di database
                $this->db->set('image', $image_name);
                $this->db->where('email', $data['user']['email']);
                $this->db->update('alternatif');

                // Perbarui data user dengan gambar yang baru
                $data['alternatif']['image'] = $image_name;

                // Set success flash data
                $this->session->set_flashdata('success', 'Gambar berhasil diunggah!');
            } else {
                // Set error flash data
                $this->session->set_flashdata('error', 'Gagal mengunggah gambar: '.$this->upload->display_errors());
            }
        }

        // Jika validasi gagal atau ada error
        if ($this->form_validation->run() == false || $this->session->flashdata('error')) {
            // Tampilkan form profil

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('User/profile', $data);
            $this->load->view('templates/footer');
        } else {
            // Jika validasi berhasil, perbarui nama
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // Perbarui data nama pengguna di basis data
            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('alternatif');

            // Set success flash data
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');

            // Redirect ke halaman profile
            redirect('User/profile');
        }
    }
}
