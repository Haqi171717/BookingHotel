<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'user') {
            redirect('auth');
        }
    }

    public function dashboard() {
        $data['judul'] = 'Dashboard';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('layouts/footer');
    }
}
