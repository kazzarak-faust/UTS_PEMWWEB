<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        if ($this->session->userdata('admin')) {
            $data['role'] = 'admin';
            $data['user'] = $this->session->userdata('admin');
        } else if ($this->session->userdata('mahasiswa')) {
            $data['role'] = 'mahasiswa';
            $data['user'] = $this->session->userdata('mahasiswa');
        } else {
            redirect('auth');
        }

        $this->load->view('home/index', $data);
    }
}
