<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Login');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {

            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $cekPelamar = $this->M_Login->cekUser('alternatif', 'email', $email);

        if ($cekPelamar) {
            foreach ($cekPelamar as $pelamar) {

                if (password_verify($password, $pelamar->password)) {

                    $dataPelamar = [
                        'email' => $pelamar->email,
                        'role_id' => $pelamar->role_id
                    ];

                    $this->session->set_userdata($dataPelamar);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert 
                        alert-danger" role="altert"> Password Salah </div>');
                    redirect('auth');
                }
            }
        }


        $cekAdmin = $this->M_Login->cekUser('admin', 'email', $email);

        if ($cekAdmin) {
            foreach ($cekAdmin as $admin) {

                if (password_verify($password, $admin->password)) {

                    $dataAdmin = array(
                        'email' => $admin->email,
                        'role_id' => $admin->role_id
                    );

                    $this->session->set_userdata($dataAdmin);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert 
                        alert-danger" role="altert"> Password Salah </div>');
                    redirect('auth');
                }
            }
        }
        $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="altert"> Email Belum Terdaftar </div>');
        redirect('auth');

    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[alternatif.email]',
            ['is_unique' => 'Email ini sudah terdaftar']
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('alternatif', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda Berhasil Registrasi. Harap Login </div>');
            redirect('auth');
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda Berhasil Keluar </div>');
        redirect('auth');
    }

}