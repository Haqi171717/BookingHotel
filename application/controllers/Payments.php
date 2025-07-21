<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $this->load->model('Payment_model');
        $this->load->model('Booking_model');
    }
    public function user()
    {
        $user_id = $this->session->userdata('user_id');
        $data['judul'] = 'Pembayaran Saya';
        $data['payments'] = $this->Payment_model->get_by_user($user_id);

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('payments/index', $data); // Bisa pakai view yg sama
        $this->load->view('layouts/footer');
    }

    public function index() {
        $data['judul'] = 'Data Pembayaran';

        $data['payments'] = $this->Payment_model->get_all();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('payments/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah($booking_id) {
        $data['booking_id'] = $booking_id;

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('payments/tambah', $data);
        $this->load->view('layouts/footer');
    }

    public function simpan() {
        $data = [
            'booking_id' => $this->input->post('booking_id'),
            'payment_date' => date('Y-m-d'), // Tanggal hari ini
            'amount' => $this->input->post('amount'),
            'method' => $this->input->post('method'),
            'status' => 'pending' // Atau 'approved', sesuai logika kamu
        ];

        $this->Payment_model->insert($data);
        $this->session->set_flashdata('success', 'Pembayaran berhasil ditambahkan.');
        redirect('bookings/index');
    }



    public function delete($id) {
        $this->Payment_model->delete($id);
        redirect('payments');
    }
}