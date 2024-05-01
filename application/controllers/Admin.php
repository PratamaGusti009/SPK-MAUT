<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Penilaian');
        $this->load->model('M_Alternatif');
        $this->load->model('M_Admin');
        $this->load->model('M_Syarat');
        $this->load->model('M_Sub_Kriteria');
    }

    public function index()
    {
        $data['title'] = 'Administration';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        $hitung_alternatif = $this->M_Alternatif->count_all_data();

        // Dapatkan lihat berapa kriteria
        $hitung_kriteria = $this->M_Syarat->hitungkriteria(25);

        // Dapatkan jumlah penilaian yang belum dinilai berdasarkan id_kriteria 25
        $unratedCount = $this->M_Penilaian->getUnratedCountByCriteria(25);

        // Dapatkan jumlah pendaftar laki-laki dan perempuan
        $maleCount = $this->M_Alternatif->getCountByGender('Pria');
        $femaleCount = $this->M_Alternatif->getCountByGender('Wanita');

        // Tampilkan data penilaian yang belum di hitung
        $hitung_penilaian = $this->M_Alternatif->get_unrated_count();

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

            'hitung_penilaian' => $hitung_penilaian,
            // Tampilkan hasil akhir yang belum dihitung

            'hitung_kriteria' => $hitung_kriteria,

            'hitung_alternatif' => $hitung_alternatif,

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

    public function tambah_admin()
    {
        $data['title'] = 'Tambah Admin';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[admin.email]',
            ['is_unique' => 'Email ini sudah terdaftar']
        );
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password Terlalu Pendek',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_admin', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time(),
            ];
            $this->db->insert('admin', $data);
            redirect('Admin/user_admin');
        }
    }

    public function destroy($id)
    {
        $result = $this->M_Admin->delete_admin($id);

        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            redirect('Admin/user_admin');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Dihapus!</div>');
        }
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('admin', [
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
                $this->db->update('admin');

                // Perbarui data user dengan gambar yang baru
                $data['admin']['image'] = $image_name;

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
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('templates/footer');
        } else {
            // Jika validasi berhasil, perbarui nama
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // Perbarui data nama pengguna di basis data
            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('admin');

            // Set success flash data
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');

            var_dump($nama);
            die;
            // Redirect ke halaman profile
            redirect('Admin/profile');
        }
    }
}
