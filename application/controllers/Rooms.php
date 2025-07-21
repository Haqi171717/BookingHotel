<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $this->load->model('Room_model');
    }

    public function index() {

                if ($this->session->userdata('role') == 'admin') {

                    $data['judul'] = 'Daftar Kamar';
                    $data['rooms'] = $this->Room_model->get_all();
                }


        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('rooms/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('rooms/tambah');
        $this->load->view('layouts/footer');
    }

public function simpan() {
    $room_number = $this->input->post('room_number', TRUE);

    // Cek apakah room_number sudah ada
    $existing = $this->db->get_where('rooms', ['room_number' => $room_number])->row();
    if ($existing) {
        $this->session->set_flashdata('error', 'Nomor kamar sudah digunakan!');
        redirect('rooms/tambah');
        return;
    }

    $data = [
        'room_number' => $room_number,
        'type'        => $this->input->post('type', TRUE),
        'price'       => $this->input->post('price', TRUE),
        'description' => $this->input->post('description', TRUE),
        'status'      => $this->input->post('status'),
        'created_at'  => date('Y-m-d H:i:s')
    ];

    $this->Room_model->insert($data);
    $this->session->set_flashdata('success', 'Kamar berhasil ditambahkan.');
    redirect('rooms');
}


    public function edit($id) {
        $data['room'] = $this->Room_model->get_by_id($id);

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('rooms/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update($id) {
        $data = [
            'room_number' => $this->input->post('room_number'),
            'type'        => $this->input->post('type'),
            'price'       => $this->input->post('price'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status')
        ];
        $this->Room_model->update($id, $data);
        redirect('rooms');
    }

    public function delete($id) {
        $this->Room_model->delete($id);
        redirect('rooms');
    }
    // application/controllers/Rooms.php


}
