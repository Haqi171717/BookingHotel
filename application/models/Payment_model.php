<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

    // Ambil semua pembayaran
public function get_all() {
    $this->db->select('payments.*, users.nama AS nama_user, rooms.room_number');
    $this->db->from('payments');
    $this->db->join('bookings', 'bookings.id = payments.booking_id');
    $this->db->join('users', 'users.id = bookings.user_id');
    $this->db->join('rooms', 'rooms.id = bookings.room_id');
    return $this->db->get()->result();
}


    // Ambil pembayaran berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where('payments', ['id' => $id])->row();
    }

    // Ambil pembayaran berdasarkan booking_id
    public function get_by_booking($booking_id) {
        return $this->db->get_where('payments', ['booking_id' => $booking_id])->result();
    }

    // Tambah pembayaran
    public function insert($data) {
        return $this->db->insert('payments', $data);
    }

    // Update pembayaran
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('payments', $data);
    }

    // Hapus pembayaran
    public function delete($id) {
        return $this->db->delete('payments', ['id' => $id]);
    }
public function get_by_user($user_id)
{
    $this->db->select('payments.*, users.nama AS nama_user, rooms.room_number');
    $this->db->from('payments');
    $this->db->join('bookings', 'bookings.id = payments.booking_id');
    $this->db->join('users', 'users.id = bookings.user_id');
    $this->db->join('rooms', 'rooms.id = bookings.room_id');
    $this->db->where('users.id', $user_id);
    return $this->db->get()->result();
}
}