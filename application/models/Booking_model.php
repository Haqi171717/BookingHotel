<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    // Ambil semua booking (admin)
    public function get_all() {
        return $this->db->get('bookings')->result();
    }

    // Ambil booking berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where('bookings', ['id' => $id])->row();
    }

    // Ambil booking berdasarkan user_id, lengkap dengan join user dan room
    public function get_by_user($user_id) {
        $this->db->select('bookings.*, users.nama AS nama_user, rooms.room_number');
        $this->db->from('bookings');
        $this->db->join('users', 'users.id = bookings.user_id');
        $this->db->join('rooms', 'rooms.id = bookings.room_id');
        $this->db->where('bookings.user_id', $user_id);
        return $this->db->get()->result();
    }

    // Tambah booking baru
    public function insert($data) {
        return $this->db->insert('bookings', $data);
    }

    // Update booking
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('bookings', $data);
    }

    // Hapus booking
    public function delete($id) {
        return $this->db->delete('bookings', ['id' => $id]);
    }

    // Ambil semua data lengkap booking (untuk admin)
    public function get_full_bookings() {
        $this->db->select('bookings.*, users.nama AS nama_user, rooms.room_number');
        $this->db->from('bookings');
        $this->db->join('users', 'users.id = bookings.user_id');
        $this->db->join('rooms', 'rooms.id = bookings.room_id');
        return $this->db->get()->result();
    }
}
