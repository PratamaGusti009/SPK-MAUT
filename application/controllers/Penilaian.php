<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Penilaian');
    }

    public function index()
    {
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        // load model
        $this->load->library('pagination');

        // config
        $config['base_url'] = 'http://localhost/viliaalamsejahtera/Penilaian/index';
        $config['total_rows'] = $this->M_Penilaian->count_all_data();
        $config['per_page'] = 10;

        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '>>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<<';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li">';

        $config['attributes'] = ['class' => 'page-link'];

        // initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['alternatif'] = $this->M_Penilaian->getAlternatif($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['alternatif'] = $this->M_Penilaian->cariDataAlternatif();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $allkriteria = $this->M_Penilaian->get_kriteria();
        // var_dump($allkriteria);die;

        $data = [
            'list' => $this->M_Penilaian->get_penilaian(),
            'kriteria' => $this->M_Penilaian->get_kriteria(),
            // 'alternatif'=> $this->M_Penilaian->get_alternatif(),
            'sub_kriteria' => $this->M_Penilaian->get_sub_kriteria(),
            'perhitungan' => $this->M_Penilaian->get_penilaian(),
        ];

        $this->load->view('penilaian/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_penilaian()
    {
        $id_alternatif = $this->input->post('id_alternatif');
        $id_kriteria = $this->input->post('id_kriteria');
        $nilai = $this->input->post('nilai');
        $i = 0;
        // var_dump($nilai);
        // exit;
        foreach ($nilai as $key) {
            $this->M_Penilaian->tambah_penilaian($id_alternatif, $id_kriteria[$i], $key);
            ++$i;
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
        redirect('penilaian');
    }

    public function update_penilaian()
    {
        $id_alternatif = $this->input->post('id_alternatif');
        $id_kriteria = $this->input->post('id_kriteria');
        $nilai = $this->input->post('nilai');
        // var_dump($id_kriteria);
        // exit;
        // foreach ($nilai as $key) {
        //     $cek = $this->M_Penilaian->data_penilaian($id_alternatif, $id_kriteria[$i]);
        //     if ($cek == 0) {
        //         $this->M_Penilaian->tambah_penilaian($id_alternatif, $id_kriteria[$i], $key);
        //     } else {
        //         $this->M_Penilaian->edit_penilaian($id_alternatif, $id_kriteria[$i], $key);
        //     }
        //     ++$i;
        // }
        if (isset($nilai)) {
            $this->M_Penilaian->edit_penilaian($id_alternatif, '25', $nilai[0]);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
        redirect('penilaian');
    }

    // tambah penilaian publik
    public function tambah_penilaian_public()
    {
        $id_alternatif = $this->input->post('id_alternatif');
        $id_kriteria = $this->input->post('id_kriteria');

        $value = $this->input->post();
        // Menghapus elemen-elemen tertentu dari array
        unset($value['id_alternatif']);
        unset($value['id_kriteria']);
        unset($value['nilai']);
        unset($value['0']);
        array_splice($value, 1, 0, '0');

        // Mengatur ulang indeks array
        $nilai = array_values($value);
        // $isMethod = $this->input->post();
        // var_dump($array);
        // exit;
        // $nilai = [];

        // $c1 = $this->input->post('Pengalaman_Kerja_(C1)');
        // // $c2 = $this->input->post('Pengalaman_Kerja_(C1)');
        // $c3 = $this->input->post('Jenjang_Pendidikan_(C3)');
        // $c4 = $this->input->post('Status_Perkawinan_(C4)');
        // $c5 = $this->input->post('Umur_(C5)');

        // array_push($nilai, $c1, '0', $c3, $c4, $c5);

        // ksort($nilai);
        // $nilai = array_map('strval', $nilai);
        // var_dump($nilai);
        // exit;
        // $i = 0;
        foreach ($nilai as $index => $key) {
            $this->M_Penilaian->tambah_penilaian($id_alternatif, $id_kriteria[$index], $key);
        }

        redirect('formulir/detailPenilaian');
    }

    // update peneilaian public
    public function update_penilaian_public()
    {
        $id_alternatif = $this->input->post('id_alternatif');
        $id_kriteria = $this->input->post('id_kriteria');
        $nilai = $this->input->post('nilai');
        // var_dump($id_kriteria);
        // exit;

        if (isset($nilai)) {
            $this->M_Penilaian->edit_penilaian($id_alternatif, '25', $nilai[0]);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
        redirect('formulir/detailPenilaian');
    }
}
