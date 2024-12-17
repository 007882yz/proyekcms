<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
       
    }
    public function index()
    {
        // Ambil data dari database
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
        $this->db->from('konten');
        $konten = $this->db->get()->result_array();
        $this->db->from('cart');
        $cart = $this->db->get()->result_array();
        
        // Kirim data ke view
        $data = array(
            'konfig'        => $konfig,
            'kategori'      => $kategori,
            'caraousel'     => $caraousel,
            'konten'     => $konten,
            'cart'     => $cart
        );

        // Gunakan template untuk memuat view
        $this->template->load('user/kerangka', 'user/dashboard', $data);
    }

    
}
