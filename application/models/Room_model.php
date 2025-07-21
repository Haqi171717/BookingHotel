<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model {

    // Ambil semua kamar
    public function get_all() {
        return $this->db->get('rooms')->result();
    }

    // Ambil satu kamar berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where('rooms', ['id' => $id])->row();
    }

    // Tambah kamar baru
    public function insert($data) {
        return $this->db->insert('rooms', $data);
    }

    // Update data kamar
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('rooms', $data);
    }

    // Hapus kamar
    public function delete($id) {
        return $this->db->delete('rooms', ['id' => $id]);
    }

    // Ambil hanya kamar yang tersedia
    public function get_available_rooms() {
        return $this->db->get_where('rooms', ['status' => 'available'])->result();
    }
}
