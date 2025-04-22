<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    public function login_user($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row();
    }
}
