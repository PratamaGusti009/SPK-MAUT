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

        // Mengirimkan data ke view
        $data['nilai_normalisasi'] = $hasil_normalisasi;
        $data['_kriteria'] = $kriterias;

        // var_dump($data['kriterias'] = $kriterias);
        // exit;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('syarat/index', $data);
        $this->load->view('templates/footer', $data);
    }

    // menampilkan view create
    public function create()
    {
        $data['title'] = 'Kriteria';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('syarat/create', $data);
        $this->load->view('templates/footer', $data);
    }

    // menambahkan data ke database
    public function store()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = [
                'keterangan' => $this->input->post('keterangan'),
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'bobot' => $this->input->post('bobot'),
            ];

            $this->M_Syarat->insert($data, 'kriteria');
            $this->session->set_flashdata('psyarat', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('Syarat');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');
    }

    public function update($id)
    {
        $this->load->model('M_Syarat');

        $data = [
            // 'id_alternatif' => $this->input->post(id_alternatif),
            'keterangan' => $this->input->post('keterangan'),
            'kode_kriteria' => $this->input->post('kode_kriteria'),
            'bobot' => $this->input->post('bobot'),
        ];

        $result = $this->M_Syarat->update_kriteria($data, $id);
        $this->session->set_flashdata('psyarat', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
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
