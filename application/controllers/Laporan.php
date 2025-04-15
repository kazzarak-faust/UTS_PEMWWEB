<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->model('Laporan_model');
    }

    public function index()
    {
        $events = $this->db->get('event')->result();
    
        foreach ($events as &$event) {
            $this->db->select('mahasiswa.*');
            $this->db->from('pendaftaran');
            $this->db->join('mahasiswa', 'mahasiswa.id = pendaftaran.id_mahasiswa');
            $this->db->where('pendaftaran.id_event', $event->id);
            $event->peserta = $this->db->get()->result();
        }
    
        $this->load->view('laporan/index', ['events' => $events]);
    }
    

    public function peserta($id_event) {
        $data['event'] = $this->Event_model->get_by_id($id_event);
        $data['peserta'] = $this->Laporan_model->get_peserta_by_event($id_event);
        $this->load->view('laporan/peserta', $data);
    }

    
}
