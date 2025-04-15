<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {

    public function daftar_event($id_mahasiswa, $id_event) {

        $this->db->where([
            'id_mahasiswa' => $id_mahasiswa,
            'id_event' => $id_event
        ]);
        $cek = $this->db->get('event_mahasiswa')->row();

        if (!$cek) {
            $this->db->insert('event_mahasiswa', [
                'id_mahasiswa' => $id_mahasiswa,
                'id_event' => $id_event
            ]);
        }
    }

    public function get_event_ids_by_mahasiswa($id_mahasiswa)
{
    $this->db->select('id_event');
    $this->db->where('id_mahasiswa', $id_mahasiswa);
    $query = $this->db->get('pendaftaran')->result();

    return array_column($query, 'id_event');
}

}
