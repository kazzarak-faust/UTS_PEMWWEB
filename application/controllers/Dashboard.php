<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->model('Pendaftaran_model');
        $this->load->helper('text');
        if (!$this->session->userdata('mahasiswa')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $mahasiswa = $this->session->userdata('mahasiswa');
        $events = $this->Event_model->get_all();
        $event_terdaftar = $this->Pendaftaran_model->get_event_ids_by_mahasiswa($mahasiswa->id);

        $data['events'] = $events;
        $data['event_terdaftar'] = $event_terdaftar;

        $this->load->view('dashboard/index', $data);
    }
    public function daftar_event($id_event)
{
    if (!$this->session->userdata('mahasiswa')) {
        redirect('auth');
    }

    $mahasiswa = $this->session->userdata('mahasiswa');

    $cek = $this->db->get_where('pendaftaran', [
        'id_event' => $id_event,
        'id_mahasiswa' => $mahasiswa->id
    ])->row();

    if ($cek) {
        $this->session->set_flashdata('error', 'Anda sudah terdaftar di event ini.');
    } else {
        $this->db->insert('pendaftaran', [
            'id_event' => $id_event,
            'id_mahasiswa' => $mahasiswa->id
        ]);
        $this->session->set_flashdata('success', 'Berhasil mendaftar ke event.');
    }

    redirect('dashboard');
}
public function riwayat()
{
    if (!$this->session->userdata('mahasiswa')) {
        redirect('auth');
    }

    $mahasiswa = $this->session->userdata('mahasiswa');

    $this->db->select('event.*');
    $this->db->from('pendaftaran');
    $this->db->join('event', 'event.id = pendaftaran.id_event');
    $this->db->where('pendaftaran.id_mahasiswa', $mahasiswa->id);
    $events = $this->db->get()->result();

    $this->load->view('dashboard/riwayat', ['events' => $events]);
}

}