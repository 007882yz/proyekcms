<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caraousel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') === NULL) {
            redirect('auth');
        }
    }

	public function index() {
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
        $data = array(
            'caraousel' => $caraousel
        );
        $this->template->load('admin/template', 'admin/caraousel', $data);
    }
    
    function tambah(){
        $this->template->load('admin/template','admin/tambah_user');
    }

    public function simpan() {
        // Validasi dan upload file
        $config['upload_path'] = './upload/caraousel/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('caraousel');
        } else {
            $file = $this->upload->data();
        }
        $data = [
            'judul' => $this->input->post('judul'),
            'foto' => $file['file_name']
           
        ];
        $where = [
            'id_caraousel'     => $this->input->post('id_caraousel')
        ];

       $this->db->insert('caraousel',$data,$where);
        $this->session->set_flashdata('success', 'Konten berhasil disimpan.');
        redirect('caraousel');
    }

    public function hapus($id){
        $where = array('id_caraousel' => $id);
        $this->db->delete('caraousel',$where);
        redirect('caraousel/index');
    }

   

    function update(){
        $data = array(
            'keterangan'      => $this->input->post('keterangan')
        );
        $where = array(
            'id_konten'   => $this->input->post('id_konten')
        );
        $this->db->update('konten',$data,$where);
        $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Berhasil disimpan</strong> 
            </div>');
        redirect(site_url('konten/index')); 
    }
    
}
