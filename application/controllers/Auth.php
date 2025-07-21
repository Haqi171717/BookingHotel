<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(['form_validation', 'session']);
    }

    // Tampilkan halaman login
    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $this->load->view('auth/login');
    }

    // Proses login
    public function login() {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $user = $this->User_model->get_by_username($username);
if ($user && password_verify($password, $user->password)) {
    $this->session->set_userdata([
        'id'        => $user->id,
        'username'  => $user->username,
        'nama'      => $user->nama,
        'role'      => $user->role,
        'logged_in' => TRUE
    ]);
    redirect('dashboard'); // cukup redirect ke dashboard
}

    }

    // Tampilkan halaman registrasi
    public function register() {
        $this->load->view('auth/register');
    }

    // Proses registrasi user baru
public function proses_register() {
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required'); // tambahkan validasi role

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('auth/register');
    } else {
        $data = [
            'username'  => $this->input->post('username', TRUE),
            'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama'      => $this->input->post('nama', TRUE),
            'role'      => $this->input->post('role', TRUE), // ambil dari form
            'created_at'=> date('Y-m-d H:i:s')
        ];
        $this->User_model->insert($data);
        $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
        redirect('auth');
    }
}


    // Logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
