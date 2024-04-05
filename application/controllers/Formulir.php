<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Formulir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Formulir');
        $this->load->model('M_Sub_Kriteria');
        $this->load->model('M_Penilaian');
        $this->load->model('M_Departemen');
    }

    public function index()
    {
        $data['title'] = 'Pelamar';
        $data['user'] = $this->db->get_where('alternatif', [
            'email' => $this->session->userdata('email'),
        ])->row_array();
        $getDepartemen = $this->M_Departemen->getDataDepartemen();
        $data['departemens'] = $getDepartemen;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Formulir/index', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $config['upload_path'] = './pdf/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pdf')) {
            // $error = array('error' => $this->upload->display_errors());
            echo 'Gagal Tambah : '.$this->upload->display_errors();
        } else {
            $file = $this->upload->data();
            $file = $file['file_name'];
            $nik = $this->input->post('nik', true);
            $ttl = $this->input->post('ttl', true);
            $jenis_kelamin = $this->input->post('jenis_kelamin', true);
            $departemen = $this->input->post('departemen', true);
            $no_telp = $this->input->post('no_telp', true);
            $alamat = $this->input->post('alamat', true);

            $data = [
                'nik' => $nik,
                'ttl' => $ttl,
                'jenis_kelamin' => $jenis_kelamin,
                'departemen' => $departemen,
                'no_telp' => $no_telp,
                'alamat' => $alamat,
                'file' => $file,
            ];
            $this->M_Formulir->update_alternatif($data, $id);
            $this->session->set_flashdata('Pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Data Berhasil Ditambah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
            redirect('Formulir/detail');
        }
    }

    public function detail()
    {
        $data['title'] = 'Data Pribadi';
        $data['status'] = 0;
        $data['user'] = $this->db->get_where('alternatif', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Formulir/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('alternatif', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Formulir/edit', $data);
        $this->load->view('templates/footer');
    }

    public function uploadData()
    {
        $config['upload_path'] = './assets/pdf/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            // $error = array('error' => $this->upload->display_errors());
            echo 'Gagal Tambah';
        } else {
            $data = ['upload_data' => $this->upload->data()];
            $this->load->view('upload_success', $data);
        }
    }

    public function tambahPenilaian()
    {
        $data['title'] = 'Halaman Tambah penilaian';
        $data['user'] = $this->db->get_where('alternatif', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        // var_dump($data['kriteria']);die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);

        $i = 0;
        $data = [
            'user' => $this->db->get_where('alternatif', [
                'email' => $this->session->userdata('email'),
            ])->row_array(),
            'sub_kriteria' => $this->M_Penilaian->get_sub_kriteria(),
            'kriteria' => $this->M_Sub_Kriteria->get_kriteria(),
            'sub_kriteria' => $this->M_Sub_Kriteria->tampil(),
            'alternatif' => $this->M_Penilaian->get_alternatif(),
        ];
        $this->load->view('Formulir/penilaian', $data);
        $this->load->view('templates/footer');
    }

    public function Edit_Penilaian()
    {
        $data['title'] = 'Halaman Edit Penilaian';
        $data['user'] = $this->db->get_where('alternatif', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        // var_dump($data['kriteria']);die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);

        $i = 0;
        $data = [
            'user' => $this->db->get_where('alternatif', [
                'email' => $this->session->userdata('email'),
            ])->row_array(),
            'sub_kriteria' => $this->M_Penilaian->get_sub_kriteria(),
            'kriteria' => $this->M_Sub_Kriteria->get_kriteria(),
            'sub_kriteria' => $this->M_Sub_Kriteria->tampil(),
            'alternatif' => $this->M_Penilaian->get_alternatif(),
        ];
        $this->load->view('Formulir/editPenilaian', $data);
        $this->load->view('templates/footer');
    }

    public function get_kriteria()
    {
        $query = $this->db->get('kriteria');

        return $query->result();
    }

    public function detailPenilaian()
    {
        $data['title'] = 'Data Pribadi';
        $data['status'] = 0;
        $data['user'] = $this->db->get_where('alternatif', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);

        $data = [
            'user' => $this->db->get_where('alternatif', [
                'email' => $this->session->userdata('email'),
            ])->row_array(),
            'sub_kriteria' => $this->M_Penilaian->get_sub_kriteria(),
            'kriteria' => $this->M_Sub_Kriteria->get_kriteria(),
            'sub_kriteria' => $this->M_Sub_Kriteria->tampil(),
            'alternatif' => $this->M_Penilaian->get_alternatif(),
        ];
        $this->load->view('Formulir/detailPenilaian', $data);
        $this->load->view('templates/footer', $data);
    }
}
