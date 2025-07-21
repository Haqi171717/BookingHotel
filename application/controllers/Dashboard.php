<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        $this->load->model('Room_model');
        $this->load->model('User_model');
        $this->load->model('Booking_model');
    }

    public function index() {
        $data['judul'] = 'Dashboard';

        if ($this->session->userdata('role') == 'admin') {
            $data['jml_kamar']   = count($this->Room_model->get_all());
            $data['jml_user']    = count($this->User_model->get_all_users());
            $data['jml_booking'] = count($this->Booking_model->get_all());
        } else {
            $user_id = $this->session->userdata('id');
            $data['jml_booking'] = count($this->Booking_model->get_by_user($user_id));
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/index', $data); // cukup satu file index.php
        $this->load->view('layouts/footer');
    }
}
