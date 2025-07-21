<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // Ambil data user berdasarkan username (untuk login)
    public function get_by_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }

    // Ambil semua data user dengan role 'user' (pelanggan)
    public function get_all_users() {
        return $this->db->get_where('users', ['role' => 'user'])->result();
    }

    // Ambil semua data user (admin + user)
    public function get_all() {
        return $this->db->get('users')->result();
    }

    // Ambil data user berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    // Tambah user baru
    public function insert($data) {
        return $this->db->insert('users', $data);
    }

    // Update data user berdasarkan ID
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Hapus user berdasarkan ID
    public function delete($id) {
        return $this->db->delete('users', ['id' => $id]);
    }
}
