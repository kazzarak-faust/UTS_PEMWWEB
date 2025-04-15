<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Mahasiswa_model');
    }

    public function index() {
        $this->load->view('auth/login');
    }

    public function login_admin() {
        $this->load->view('auth/login_admin');

    }

    public function register_mahasiswa() {
        $this->load->view('auth/register_mahasiswa');
    }

    public function do_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->Auth_model->cek_admin($username, $password);
        if ($admin) {
            $this->session->set_userdata('admin', $admin);
            redirect('home');
        }

    $mahasiswa = $this->Auth_model->cek_mahasiswa($username, $password);
    if ($mahasiswa) {

        $mahasiswa_lengkap = $this->Mahasiswa_model->get_by_username($username);

        $this->session->set_userdata('mahasiswa', $mahasiswa_lengkap);
        redirect('home');
}


        $this->session->set_flashdata('error', 'Username atau password salah.');
        redirect('auth');
    }

    public function do_register_mahasiswa() {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];

        $this->db->insert('mahasiswa', $data);
        $this->session->set_flashdata('sukses', 'Registrasi berhasil, silakan login.');
        redirect('auth');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}