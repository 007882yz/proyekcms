<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Pastikan user sudah login
		if ($this->session->userdata('level') === NULL) {
			redirect('auth');
		}
	}   
    public function index() {
        $kategori = $this->db->select('*')
                              ->from('kategori')
                              ->order_by('nama_kategori', 'ASC')
                              ->get() 
                              ->result_array();
    
        $this->db->select('konten.*, kategori.nama_kategori');
        $this->db->from('konten');
        $this->db->join('kategori', 'kategori.nama_kategori = konten.nama_kategori', 'left'); 
        $this->db->order_by('konten.tanggal', 'DESC');
        $konten = $this->db->get()->result_array();
    
        $data = array(
            'kategori' => $kategori,
            'konten'   => $konten
        );
    
        // Memuat template dengan data
        $this->template->load('admin/template', 'admin/konten', $data);
    }
    
}
