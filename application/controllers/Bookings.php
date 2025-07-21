<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $this->load->model('Booking_model');
        $this->load->model('Room_model');
    }

    public function index() {
        $data['judul'] = 'Data Booking';

        if ($this->session->userdata('role') == 'admin') {
            $data['bookings'] = $this->Booking_model->get_full_bookings();
        } else {
            $user_id = $this->session->userdata('id');
            $data['bookings'] = $this->Booking_model->get_by_user($user_id);
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('bookings/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah() {
    $data['judul'] = 'Booking Kamar';
    $data['rooms'] = $this->Room_model->get_all(); // ambil semua kamar

    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('bookings/tambah', $data);
    $this->load->view('layouts/footer');
}


    public function simpan() {
        $data = [
            'user_id'      => $this->session->userdata('id'),
            'room_id'      => $this->input->post('room_id'),
            'booking_date' => date('Y-m-d'),
            'check_in'     => $this->input->post('check_in'),
            'check_out'    => $this->input->post('check_out'),
            'status'       => 'pending',
            'notes'        => $this->input->post('notes')
        ];
        $this->Booking_model->insert($data);
        redirect('bookings');
    }

    public function update_status($id, $status) {
        if ($this->session->userdata('role') == 'admin') {
            $this->Booking_model->update($id, ['status' => $status]);
        }
        redirect('bookings');
    }

    public function delete($id) {
        $this->Booking_model->delete($id);
        redirect('bookings');
    }
        public function edit($id)
        {
            // Hanya admin yang bisa edit
            if ($this->session->userdata('role') !== 'admin') {
                show_404();
            }

            $data['judul'] = 'Edit Booking';
            $data['booking'] = $this->Booking_model->get_by_id($id);
            $data['rooms'] = $this->Room_model->get_all();

            if (!$data['booking']) {
                show_404(); // jika booking tidak ditemukan
            }

            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('bookings/edit', $data);
            $this->load->view('layouts/footer');
        }
        public function update($id)
        {
            // Hanya admin yang boleh update booking
            if ($this->session->userdata('role') !== 'admin') {
                show_404();
            }

            $data = [
                'room_id'   => $this->input->post('room_id', TRUE),
                'check_in'  => $this->input->post('check_in', TRUE),
                'check_out' => $this->input->post('check_out', TRUE),
                'status'    => $this->input->post('status', TRUE),
            ];

            $this->Booking_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data booking berhasil diperbarui.');
            redirect('bookings');
        }
        }