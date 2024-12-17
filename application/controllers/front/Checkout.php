<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('level') === NULL) {
            // Redirect ke halaman autentikasi jika tidak ada level
            redirect('auth');
        }
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
        $this->template->load('user/kerangka', 'user/checkout', $data);
    }

    public function co()
	{
		$id_user = $this->session->userdata('id_user');

		
		$data = [
			'nama'       => $this->input->post('nama'),
			'username'       => $this->input->post('username'),
			'no_telp'      => $this->input->post('no_telp'),
			'alamat'     => $this->input->post('alamat'),
		];
	
		// Perbarui data user di tabel user
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	
		// Ambil data cart
		$this->db->select('cart.*, konten.harga, konten.judul, konten.id_konten');
		$this->db->from('cart');
		$this->db->join('konten', 'konten.id_konten = cart.id_konten');
		$this->db->where('cart.id_user', $id_user);
		$cart = $this->db->get()->result_array();
	
		// Hitung total harga
		$cart_total = 0;
		$cart_jumlah = 0;
		foreach ($cart as $item) {
			$cart_total += $item['subtotal'];
			$cart_jumlah += $item['quantity'];
		}
	
		$data_transaction = [
			'id_user'    => $id_user,
			'tanggal'    => date('Y-m-d'),
			'jumlah'     => $cart_jumlah,
			'sub_total'  => $cart_total,
			'status'     => 'Pesanan Masuk',  // Status awal
		];
		$this->db->insert('transaction', $data_transaction);
		$id_transaction = $this->db->insert_id();
	
		
		// Hapus cart setelah checkout berhasil
		$this->db->delete('cart', ['id_user' => $id_user]);
	
		// Redirect ke halaman sukses
		$this->session->set_flashdata('success', 'Pesanan Anda berhasil dibuat, silahkan cek MY TRACK ORDER !!');
		redirect('https://wa.me/0895386195187 ');
	}

}
