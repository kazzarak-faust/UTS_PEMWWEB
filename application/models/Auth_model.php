<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function cek_mahasiswa($username, $password) {
        $user = $this->db->get_where('mahasiswa', ['username' => $username])->row();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    public function cek_admin($username, $password) {
        $user = $this->db->get_where('admin', ['username' => $username])->row();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }
}
