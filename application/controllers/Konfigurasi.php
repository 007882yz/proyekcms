<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function __construct() {
		// Memanggil konstruktor parent class
		parent::__construct();

		// Mengecek apakah level user di session ada
		if ($this->session->userdata('level')===NULL) {
			// Redirect ke halaman autentikasi jika tidak ada level
			redirect('auth');
		}
	}

	public function index() {
		$this->db->from('konfigurasi');
		$konfig=$this->db->get()->row();
		$data=array('konfig'=> $konfig);

		// Memuat tampilan dengan template dan data
		$this->template->load('admin/template', 'admin/konfigurasi', $data);
	}

	function update() {
		$data=array(
            'judul_website'=> $this->input->post('judul_website'),
			'profil_website'=> $this->input->post('profil_website'),
			'facebook'=> $this->input->post('facebook'),
			'instagram'=> $this->input->post('instagram'),
			'email'=> $this->input->post('email'),
			'alamat'=> $this->input->post('alamat'),
			'no_wa'=> $this->input->post('no_wa'));
		$where=array('id_konfigurasi'=> 1);
		$this->db->update('konfigurasi', $data, $where);
		$this->session->set_flashdata('notif', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Berhasil disimpan</strong> </div>');
redirect(site_url('konfigurasi/index'));
		}
	}
