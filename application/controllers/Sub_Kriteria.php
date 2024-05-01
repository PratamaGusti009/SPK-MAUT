<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sub_Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Sub_Kriteria');
    }

    public function index()
    {
        $data['title'] = 'Sub Kriteria';
        $data['user'] = $this->db->get_where('admin', [
            'email' => $this->session->userdata('email'),
        ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);

        $data = [
            'list' => $this->M_Sub_Kriteria->tampil(),
            'kriteria' => $this->M_Sub_Kriteria->get_kriteria(),
            'count_kriteria' => $this->M_Sub_Kriteria->count_kriteria(),
            'sub_kriteria' => $this->M_Sub_Kriteria->tampil(),
        ];

        $this->load->view('sub_syarat/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function store()
    {
        $data = [
            'id_kriteria' => $this->input->post('id_kriteria'),
            'deskripsi' => $this->input->post('deskripsi'),
            'nilai' => $this->input->post('nilai'),
        ];

        $this->form_validation->set_rules('id_kriteria', 'ID Kriteria', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        // var_dump($data);
        // exit;
        if ($this->form_validation->run() != false) {
            $result = $this->M_Sub_Kriteria->insert($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data berhasil disimpan!</div>');
                redirect('sub_kriteria');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
            redirect('sub_kriteria/index');
        }
    }

    public function update($id_sub_kriteria)
    {
        // TODO: implementasi update data berdasarkan $id_sub_kriteria
        $id_sub_kriteria = $this->input->post('id_sub_kriteria');
        $data = [
            'id_kriteria' => $this->input->post('id_kriteria'),
            'deskripsi' => $this->input->post('deskripsi'),
            'nilai' => $this->input->post('nilai'),
        ];

        $this->M_Sub_Kriteria->update($id_sub_kriteria, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data berhasil diupdate!</div>');
        redirect('sub_kriteria');
    }

    public function destroy($id_sub_kriteria)
    {
        $this->M_Sub_Kriteria->delete($id_sub_kriteria);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data berhasil dihapus!</div>');
        redirect('sub_kriteria');
    }
}
