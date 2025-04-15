<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('event')->result();
    }
    

    public function get_by_id($id) {
        return $this->db->get_where('event', ['id' => $id])->row();
    }

    public function insert() {
        $data = [
            'nama_event' => $this->input->post('nama_event'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal' => $this->input->post('tanggal'),
            'lokasi' => $this->input->post('lokasi')
        ];
        $this->db->insert('event', $data);
    }

    public function update($id) {
        $data = [
            'nama_event' => $this->input->post('nama_event'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal' => $this->input->post('tanggal'),
            'lokasi' => $this->input->post('lokasi')
        ];
        $this->db->where('id', $id)->update('event', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id)->delete('event');
    }
}
