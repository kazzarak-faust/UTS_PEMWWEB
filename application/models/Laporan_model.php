<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function get_peserta_by_event($id_event) {
        $this->db->select('mahasiswa.nama, mahasiswa.email');
        $this->db->from('event_mahasiswa');
        $this->db->join('mahasiswa', 'mahasiswa.id = event_mahasiswa.id_mahasiswa');
        $this->db->where('event_mahasiswa.id_event', $id_event);
        return $this->db->get()->result();
    }
}
