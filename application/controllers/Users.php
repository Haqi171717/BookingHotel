<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
        $this->load->model('User_model');
    }

    public function index() {
        $data['judul'] = 'Manajemen Pengguna';
        $data['users'] = $this->User_model->get_all_users();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('users/index', $data);
        $this->load->view('layouts/footer');
    }

    public function edit($id) {
        $data['user'] = $this->User_model->get_by_id($id);

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('users/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update($id) {
        $data = [
            'username' => $this->input->post('username'),
            'nama'     => $this->input->post('nama'),
            'role'     => $this->input->post('role')
        ];
        $this->User_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data pengguna berhasil diperbarui.');
        redirect('users');
    }

    public function delete($id) {
        $this->User_model->delete($id);
        $this->session->set_flashdata('success', 'Pengguna berhasil dihapus.');
        redirect('users');
    }
}
