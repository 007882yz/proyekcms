<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten_model extends CI_Model {

    public function get_all_kategori() {
        return $this->db->get('kategori')->result_array(); // Ambil semua kategori
    }

    public function get_all_konten() {
        return $this->db->get('konten')->result_array(); // Ambil semua konten
    }

    public function save_konten($data) {
        $this->db->insert('konten', $data);
        return $this->db->insert_id();
    }

    public function update_konten($id, $data) {
        $this->db->where('id_konten', $id);
        return $this->db->update('konten', $data);
    }

    public function delete_konten($id) {
        $this->db->where('id_konten', $id);
        return $this->db->delete('konten');
    }
    public function get_konten_by_id($id_konten) {
        return $this->db->get_where('konten', ['id_konten' => $id_konten])->row_array();
    }
    function add_cart($data)
    {
        $this->db->insert('cart', $data);
    }
    
    public function get_cart_item($id_user, $id_konten)
    {
        return $this->db->get_where('cart', [
            'id_user' => $id_user,
            'id_konten' => $id_konten
        ])->row_array();
    }
    public function update_cart_item($id_user, $id_konten, $update_data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_konten', $id_konten);
        $this->db->update('cart', $update_data);
    }
}
