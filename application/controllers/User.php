<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function register() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->User_model->register_user($data);
                $this->session->set_flashdata('success', 'Registration successful. Please login.');
                redirect('login');
            }
        }
        $this->load->view('register');
    }

    public function login() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $user = $this->User_model->login_user($email);

if ($user && password_verify($password, $user->password)) {
    $session_data = [
        'user_id' => $user->id,
        'email' => $user->email,
        'logged_in' => TRUE
    ];
    $this->session->set_userdata($session_data);
    redirect('hotelbooking');
} else {
    $this->session->set_flashdata('error', 'Invalid email or password.');
    redirect('login');
}
            }
        }
        $this->load->view('login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
