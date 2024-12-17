<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') === NULL) {
            // Redirect ke halaman autentikasi jika tidak ada level
            redirect('auth');
        }
        $this->load->model('Konten_model');
       
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
        $this->db->select('*')->from('konten');
        $this->db->where('id_konten', $id);
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
        $this->template->load('user/kerangka', 'user/cart', $data);
    }

    public function cart( )
    {
        
        // Ensure the cart library is loaded
        $this->load->library('cart');
        
        $id_user = $this->session->userdata('id_user');
        $id_konten = $this->input->post('id_konten'); // Product ID
        $nama = $this->input->post('nama'); // Product Name
        $qty = $this->input->post('qty'); // Quantity
        $harga = $this->input->post('harga'); // Price
        // Validate the quantity
        if ($qty <= 0) {
            $this->session->set_flashdata('error', 'Jumlah tidak valid.');
            redirect('front/preview/index/' . $id_konten);
            return;
        }
    
        // Calculate subtotal
        $sub_total = $harga * $qty;
        
        // Get product details by ID
        $konten = $this->Konten_model->get_konten_by_id($id_konten);
        $stock = $konten['stock'];
       
        if (!$konten) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan.');
            redirect('front/preview/index/' . $id_konten);
            return;
        }
        
        if ($stock < $qty) {
            $this->session->set_flashdata('error', 'Stok produk tidak mencukupi.');
            redirect('front/preview/index/' . $id_konten);
            return;
        }
    
        // Prepare the cart item
        $cart_item = array(
            'id_konten' => $id_konten,
            'id_user'   => $this->session->userdata('id_user'),
            'quantity' => $qty,
            'price' => $harga,
            'name' => $nama,
            'subtotal' => $sub_total,
        );
    
        // Check if the product is already in the cart
        $cart = $this->Konten_model->get_cart_item($id_user, $id_konten);
        $found = false;
        
        if ($cart) {
			// Update jumlah dan subtotal di cart
			$new_qty = $cart['quantity'] + $qty;

			// Periksa kembali stok dengan jumlah baru
			if ($konten['stock'] < $new_qty) {
				$this->session->set_flashdata('error', 'Jumlah total melebihi stok produk.');
				redirect('front/preview/index/' . $id_konten);
				return;
			}

			$update_data = [
				'quantity' => $new_qty,
				'subtotal' => $harga * $new_qty,
			];
			$this->session->set_flashdata('success', 'Product berhasil ditambahkan ke keranjang !!');
			$this->Konten_model->update_cart_item($id_user, $id_konten, $update_data);
		}
        // If the product was not found in the cart, add it
        else {
            $this->Konten_model->add_cart($cart_item);
        }
    
        // Success message
        $this->session->set_flashdata('notif', 'Produk berhasil ditambahkan ke keranjang.');
        redirect('front/preview/index/' . $id_konten);
    }

    public function hapus($id){
        $where = array('id' => $id);
        $this->db->delete('cart',$where);
        redirect('front/cart');
    }
}
