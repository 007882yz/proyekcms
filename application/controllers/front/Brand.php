<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('level') === NULL) {
            // Redirect ke halaman autentikasi jika tidak ada level
            redirect('auth');
        }
        $this->load->database(); 
    }

    public function index($id)
    {
        // Ambil data konten berdasarkan id_konten
        $this->db->select('*')->from('konten');
        $this->db->where('kategori', $id);
        $konten = $this->db->get()->result_array();

        // Ambil data konfigurasi, kategori, dan carousel
        $konfig = $this->db->get('konfigurasi')->row();
        $kategori = $this->db->get('kategori')->result_array();
        $caraousel = $this->db->get('caraousel')->result_array();

        // Kirim data ke view
        $data = array(
            'konfig'    => $konfig,
            'kategori'  => $kategori,
            'caraousel' => $caraousel,
            'konten'    => $konten
        );

        // Gunakan template untuk memuat view
        $this->template->load('user/kerangka', 'user/kategori', $data);
    }
}
