<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    public function get_by_username($username)
    {
        return $this->db->get_where('mahasiswa', ['username' => $username])->row(); 
    }
}

