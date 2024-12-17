<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
    public function __construct(){
        parent::__construct();if ($this->session->userdata('level') === NULL) {
            // Redirect ke halaman autentikasi jika tidak ada level
            redirect('auth');
        }
    }

    public function index()
    {
        // Ambil data konfigurasi
        $konfig = $this->db->get('konfigurasi')->row();

        // Ambil data kategori
        $kategori = $this->db->get('kategori')->result_array();

        // Ambil data caraousel
        $caraousel = $this->db->get('caraousel')->result_array();

        $this->db->from('cart');
        $cart = $this->db->get()->result_array();
        // Ambil data konten dengan kolom yang spesifik
        $this->db->select('id_konten, judul, keterangan, foto, kategori, tanggal, username, harga');
        $konten = $this->db->get('konten')->result_array();

        // Kirim data ke view
        $data = array(
            'konfig'    => $konfig,
            'kategori'  => $kategori,
            'caraousel' => $caraousel,
            'konten'    => $konten,
            'cart'    => $cart
        );

        // Gunakan template untuk memuat view
        $this->template->load('user/kerangka', 'user/shop', $data);
    }
}
