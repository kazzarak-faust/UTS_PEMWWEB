<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
    $data['events'] = $this->db->get('event')->result();
    $this->load->view('event/index', $data);
    }


    public function tambah() {
        $this->load->view('event/tambah');
    }

    public function simpan() {
        $this->form_validation->set_rules('nama_event', 'Nama Event', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('event/tambah');
        } else {
            $this->Event_model->insert();
            redirect('event');
        }
    }

    public function edit($id) {
        $data['event'] = $this->Event_model->get_by_id($id);
        $this->load->view('event/edit', $data);
    }

    public function update($id) {
        $this->form_validation->set_rules('nama_event', 'Nama Event', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['event'] = $this->Event_model->get_by_id($id);
            $this->load->view('event/edit', $data);
        } else {
            $this->Event_model->update($id);
            redirect('event');
        }
    }

    public function hapus($id) {
        $this->Event_model->delete($id);
        redirect('event');
    }
    public function delete($id_event)
{
    $this->db->where('id', $id_event);
    $this->db->delete('event');

    $this->session->set_flashdata('success', 'Event berhasil dihapus.');

    redirect('event');
}
}
