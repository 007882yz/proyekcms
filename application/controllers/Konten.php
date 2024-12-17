<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Konten_model');
        if ($this->session->userdata('level') === NULL) {
            redirect('auth');
        }
    }

	public function index() {
        // Fetch all categories
        $kategori = $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result_array();
    
        // Fetch konten data and join with kategori
        $this->db->select('konten.*, kategori.nama_kategori');
        $this->db->from('konten');
        $this->db->join('kategori', 'kategori.id_kategori = konten.kategori', 'left'); // Join kategori table
        $this->db->order_by('konten.tanggal', 'DESC');
        $konten = $this->db->get()->result_array();
    
        // Pass data to view
        $data = array(
            'kategori' => $kategori,
            'konten'   => $konten
        );
    
        $this->template->load('admin/template', 'admin/konten', $data);
    }
    
    

    public function simpan() {
        $config['upload_path'] = './upload/konten/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 5000;
    
        $this->load->library('upload', $config);
    
        $files = $_FILES['foto'];
        $file_count = count($files['name']);
        $uploaded_files = [];
    
        for ($i = 0; $i < $file_count; $i++) {
            if (!empty($files['name'][$i])) {
                $_FILES['file']['name'] = $files['name'][$i];
                $_FILES['file']['type'] = $files['type'][$i];
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['file']['error'] = $files['error'][$i];
                $_FILES['file']['size'] = $files['size'][$i];
    
                if ($this->upload->do_upload('file')) {
                    $uploaded_files[] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('konten');
                }
            }
        }
    
        $data = [
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
            'foto' => json_encode($uploaded_files), // Simpan dalam format JSON
            'harga' => $this->input->post('harga'),
            'stock' => $this->input->post('stock'),
            'kategori' => $this->input->post('kategori'),
            'tanggal' => date('Y-m-d'),
            'username' => 'admin',
        ];
    
        $this->Konten_model->save_konten($data);
        $this->session->set_flashdata('success', 'Konten berhasil disimpan.');
        redirect('konten');
    }
    
    

    public function hapus($id){
        $where = array('id_konten' => $id);
        $this->db->delete('konten',$where);
        redirect('konten/index');
    }

   

    public function update() {
        $id_konten = $this->input->post('id_konten');
    
        // Konfigurasi upload file
        $config['upload_path'] = './upload/konten/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 5000;
    
        $this->load->library('upload', $config);
    
        $files = $_FILES['foto'];
        $file_count = count($files['name']);
        $uploaded_files = [];
    
        for ($i = 0; $i < $file_count; $i++) {
            if (!empty($files['name'][$i])) {
                $_FILES['file']['name'] = $files['name'][$i];
                $_FILES['file']['type'] = $files['type'][$i];
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['file']['error'] = $files['error'][$i];
                $_FILES['file']['size'] = $files['size'][$i];
    
                if ($this->upload->do_upload('file')) {
                    $uploaded_files[] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('konten');
                }
            }
        }
    
        // Jika ada foto lama, tambahkan ke array foto
        $foto_lama = $this->Konten_model->get_konten_by_id($id_konten)['foto'];
        $foto_lama_array = json_decode($foto_lama, true);
        if (!empty($foto_lama_array)) {
            $uploaded_files = array_merge($foto_lama_array, $uploaded_files);
        }
    
        // Data untuk update
        $data = [
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
            'foto' => json_encode($uploaded_files), // Foto dalam format JSON
            'harga' => $this->input->post('harga'),
            'stock' => $this->input->post('stock'),
            'kategori' => $this->input->post('kategori'),
        ];
    
        // Update database
        if ($this->db->update('konten', $data, ['id_konten' => $id_konten])) {
            $this->session->set_flashdata('success', 'Konten berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui konten.');
        }
    
        redirect('konten');
    }
    
    
}
