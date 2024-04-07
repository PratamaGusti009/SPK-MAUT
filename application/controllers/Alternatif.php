<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Alternatif');
        $this->load->model('M_Departemen');
    }

    public function index()
    {
        $data['title'] = 'Alternatif';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        // $data['_alternatif'] = $this->M_Alternatif->get_all_alternatif()->result_array();

        // load model
        $this->load->library('pagination');

        // config
        $config['base_url'] = 'http://localhost/viliaalamsejahtera/Alternatif/index';
        $config['total_rows'] = $this->M_Alternatif->count_all_data();
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
        $data['alternatif'] = $this->M_Alternatif->getAlternatif($config['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('alternatif/index', $data);
        $this->load->view('templates/footer', $data);
    }

    // public function create()
    // {
    //     $data['title'] = 'Tambah Alternatif';
    //     $data['user'] = $this->db->get_where('alternatif', ['email' => $this->session->userdata('email')])->row_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar_admin', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('alternatif/create', $data);
    //     $this->load->view('templates/footer', $data);
    // }

    public function store()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = [
                'keterangan' => $this->input->post('keterangan'),
                'tahun' => $this->input->post('tahun'),
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'departemen' => $this->input->post('departemen'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
            ];

            $this->M_Alternatif->insert($data, 'alternatif');
            $this->session->set_flashdata('Pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Data Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('Alternatif');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
    }

    public function detail($id_alternatif)
    {
        $alternatif = $this->M_Alternatif->show($id_alternatif);
        $data = [
            'page' => 'Alternatif',
            'alternatif' => $alternatif,
        ];
        $data['title'] = 'Detail Alternatif';
        $data['user'] = $this->db->get_where(
            'admin',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('alternatif/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    // public function update($id)
    // {

    //     $data = array(
    //         'nama' => $this->input->post('nama'),
    //         'nik' => $this->input->post('nik'),
    //         'ttl' => $this->input->post('ttl'),
    //         'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    //         'status' => $this->input->post('status'),
    //         'departemen' => $this->input->post('departemen'),
    //         'email' => $this->input->post('email'),
    //         'no_telp' => $this->input->post('no_telp'),
    //         'alamat' => $this->input->post('alamat'),
    //         // 'file' => $this->input->post('file'),
    //     );

    //     $result = $this->M_Alternatif->update_alternatif($data, $id);
    //     var_dump($data);
    //     die;
    //     $this->session->set_flashdata('Pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    //         <strong>Holy guacamole!</strong> Data Berhasil Diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span></button></div>');
    //     redirect('Alternatif');
    // }

    public function destroy($id)
    {
        $this->load->model('M_Alternatif');
        $result = $this->M_Alternatif->delete_alternatif($id);

        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            redirect('alternatif');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Dihapus!</div>');
        }
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
