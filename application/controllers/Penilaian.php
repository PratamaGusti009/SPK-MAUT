<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Penilaian');
        $this->load->model('M_Alternatif');
        $this->load->model('M_Departemen');
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
        $list_departemen = $this->M_Departemen->getDataDepartemen();
        
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

    // public function tambah_penilaian()
    // {
    //     $id_alternatif = $this->input->post('id_alternatif');
    //     $id_kriteria = $this->input->post('id_kriteria');
    //     $nilai = $this->input->post('nilai');
    //     $i = 0;
    //     // var_dump($nilai);
    //     // exit;
    //     foreach ($nilai as $key) {
    //         $this->M_Penilaian->tambah_penilaian($id_alternatif, $id_kriteria[$i], $key);
    //         ++$i;
    //     }
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
    //     redirect('penilaian');
    // }

    // public function update_penilaian()
    // {
    //     $id_alternatif = $this->input->post('id_alternatif');
    //     $id_kriteria = $this->input->post('id_kriteria');
    //     $nilai = $this->input->post('nilai');

    //     if (isset($nilai)) {
    //         $this->M_Penilaian->edit_penilaian($id_alternatif, '25', $nilai[0]);
    //     }
    //     var_dump($nilai);
    //     exit;
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
    //     redirect('penilaian');
    // }

    public function update_penilaian_admin()
    {
        // Ambil nilai input dari pengguna
        $value = $this->input->post('nilai');
        $id_alternatif = $this->input->post('id_alternatif'); // Ambil id_alternatif dari input pengguna
        $id_kriteria = $this->input->post('id_kriteria'); // Ambil id_kriteria dari input pengguna

        // var_dump($id_alternatif);
        // exit;
        // Pastikan input nilai tidak kosong atau NULL
        if ($value === null || $value === '') {
            echo 'Nilai tidak boleh kosong.';

            return;
        }

        // Query database untuk mendapatkan rentang nilai yang cocok dari tabel sub_kriteria
        $query = $this->db->get('sub_kriteria');

        $found = false;
        foreach ($query->result() as $row) {
            // Ekstrak min_range dan max_range dari kolom deskripsi
            list($min_range, $max_range) = sscanf($row->deskripsi, '%d - %d');

            // Cek apakah nilai berada dalam rentang
            if ($value >= $min_range && $value <= $max_range) {
                // Jika nilai cocok dengan rentang, simpan data ke tabel penilaian
                $data = [
                    'id_sub_kriteria' => $row->id_sub_kriteria,
                    'nilai' => $value,
                ];

                // Lakukan pembaruan data berdasarkan id_alternatif dan id_kriteria
                $this->db->where('id_alternatif', $id_alternatif);
                $this->db->where('id_kriteria', $id_kriteria);
                $this->db->update('penilaian', $data);

                echo "Nilai $value berada dalam rentang: {$row->deskripsi} (id sub kriteria: {$row->id_sub_kriteria}). Nilai telah disimpan ke dalam tabel penilaian.";
                $found = true;
                break;
            }
        }

        if (!$found) {
            // Jika nilai tidak cocok dengan rentang manapun
            echo "Nilai $value tidak berada dalam rentang yang ditentukan.";
        }

        // Redirect ke halaman penilaian
        redirect('Penilaian/index');
    }

    // Controller USER//

    // jangan diubah
    public function tambah_penilaian_public()
    {
        $id_alternatif = $this->input->post('id_alternatif');
        $id_kriteria = $this->input->post('id_kriteria');

        $value = $this->input->post();
        // Menghapus elemen-elemen tertentu dari array
        unset($value['id_alternatif']);
        unset($value['id_kriteria']);
        unset($value['id_sub_kriteria']);
        unset($value['0']);
        array_splice($value, 1, 0, '0');

        // Pastikan array nilai terurut dan tidak mengandung nilai 0
        $nilai = array_values($value);

        // Iterasi melalui nilai dan id_kriteria
        foreach ($nilai as $index => $key) {
            // Periksa apakah id_kriteria dan nilai bukan 0, kecuali jika id_kriteria adalah 25
            if (isset($id_kriteria[$index]) && ($id_kriteria[$index] != 0 || $key != 0 || $id_kriteria[$index] == 25)) {
                // Panggil metode tambah_penilaian di model
                $this->M_Penilaian->tambah_penilaian_public($id_alternatif, $id_kriteria[$index], $key);
            }
        }

        redirect('formulir/detailPenilaian');
    }
    // jangan diubah

    // update penilaian public
    public function update_penilaian_public()
    {
        $id_alternatif = $this->input->post('id_alternatif');
        $id_kriteria = $this->input->post('id_kriteria');
        $nilai = $this->input->post('nilai');

        // Jika 'nilai' adalah array, maka lakukan pembaruan untuk setiap item
        if (is_array($nilai)) {
            foreach ($nilai as $index => $value) {
                // Filter 'Nilai Test' berdasarkan key index 'C2'
                if (isset($id_kriteria[$index]) && $id_kriteria[$index] != '25') {
                    // Update data penilaian jika bukan 'C2'
                    $this->M_Penilaian->edit_penilaian_public($id_alternatif, $id_kriteria[$index], $value);
                }
            }
        }
        // var_dump($id_kriteria[$index]);
        // exit;
        // Cetak nilai yang diterima untuk verifikasi
        // var_dump($nilai);
        // exit;

        // // Tambahkan exit() agar kode berhenti setelah mencetak nilai
        // exit;

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
        redirect('Formulir/detailPenilaian');
    }

    public function ajax_search()
    {
        // Mengambil kata kunci pencarian dari AJAX
        $keyword = $this->input->post('keyword');

        // Mengambil data dari model berdasarkan kata kunci
        $result = $this->M_Alternatif->search($keyword);

        // Menyimpan data dalam format JSON
        echo json_encode($result);
    }

    
}
