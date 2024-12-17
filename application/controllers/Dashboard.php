<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        // Memanggil konstruktor parent class
        parent::__construct();

        // Mengecek apakah level user di session ada
        if ($this->session->userdata('level') === NULL) {
            // Redirect ke halaman autentikasi jika tidak ada level
            redirect('auth');
        }
    }

    public function index() {
        // Data yang akan dikirim ke view
        $this->db->from('user');
        $user = $this->db->get()->row();
        
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->join('user', 'user.id_user = transaction.id_user');
        $checkout = $this->db->get()->result_array();
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
        $this->db->from('konten');
        $konten = $this->db->get()->result_array();
        

        $data = array(
            'user'        => $user,
            'konfig'        => $konfig,
            'kategori'      => $kategori,
            'caraousel'     => $caraousel,
            'konten'     => $konten,
            'checkout'     => $checkout,
        );

        // Memuat tampilan dengan template dan data
        $this->template->load('admin/template', 'admin/dashboard', $data);
    }
}
