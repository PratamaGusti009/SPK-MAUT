<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Syarat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_Syarat");
    }

    public function index()
    {
        $data['title'] = 'Kriteria';
        $data['user'] = $this->db->get_where('admin', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();

        $data['_kriteria'] = $this->M_Syarat->get_all_kriteria()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('syarat/index', $data);
        $this->load->view('templates/footer', $data);
    }

    //menampilkan view create
    public function create()
    {
        $data['title'] = 'Kriteria';
        $data['user'] = $this->db->get_where('admin', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('syarat/create', $data);
        $this->load->view('templates/footer', $data);
    }

    //menambahkan data ke database
    public function store()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'keterangan' => $this->input->post('keterangan'),
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'bobot' => $this->input->post('bobot'),
            );

            $this->M_Syarat->insert($data, 'kriteria');
            $this->session->set_flashdata('Pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Data Berhasil Ditambahkan!
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

        $data = array(
            // 'id_alternatif' => $this->input->post(id_alternatif),
            'keterangan' => $this->input->post('keterangan'),
            'kode_kriteria' => $this->input->post('kode_kriteria'),
            'bobot' => $this->input->post('bobot'),
        );

        $result = $this->M_Syarat->update_kriteria($data, $id);
        $this->session->set_flashdata('Pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Data Berhasil Diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
        redirect('Syarat');
    }

    public function destroy($id)
    {
        $this->load->model('M_Syarat');
        $result = $this->M_Syarat->delete_kriteria($id);

        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            redirect('Syarat');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Dihapus!</div>');

        }
    }
}