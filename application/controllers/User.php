<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        // Memanggil konstruktor parent class (CI_Controller)
        parent::__construct();

        // Memuat model User_model
        $this->load->model('User_model');

        // Mengecek apakah level user bukan 'Admin'
        if ($this->session->userdata('level') !== 'Admin') {
            // Redirect ke halaman autentikasi jika bukan admin
            redirect('auth');
        }
    }

	public function index(){
        $this->db->from('user');
        $this->db->order_by('nama','ASC');
        $user = $this->db->get()->result_array();
        $data = array('user' => $user);
        $this->template->load('admin/template','admin/index_user',$data);
    }

    function tambah(){
        $this->template->load('admin/template','admin/tambah_user');
    }

    function simpan()
    {
        $this->db->where('username',$this->input->post('username'));
        $this->db->from('user');
        $cek = $this->db->get()->row();
        if($cek==NULL){ //kondisi username belum terisi
            $data = array (
                'username'      => $this->input->post('username'),
                'nama'          =>$this->input->post('nama'),
                'password'      => md5($this->input->post('password')),
                'level'     => $this->input->post('level'),
                'alamat'     => $this->input->post('alamat'),
                'no_telp'      => $this->input->post('no_telp')
            );
            $this->db->insert('user',$data);
            $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>User berhasil disimpan</strong> 
             </div>'
            );
        } else { //kondisi username sudah terisi
            $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Usernamea sudah digunakan</strong> 
            
            </div>');
            
        }
        redirect('user/index');
    }
    public function hapus($id){
        $where = array('id_user' => $id);
        $this->db->delete('user',$where);
        redirect('user/index');
    }

    function edit($id){
        $this->db->select('*')->from('user');
        $this->db->where('id_user', $id);
        $user = $this->db->get()->result_array();
        $data = array('user' => $user);
        $this->template->load('admin/template','admin/edit_user',$data);
    }

    function update(){
        $data = array(
            'username'      => $this->input->post('username')
        );
        $where = array(
            'id_user'   => $this->input->post('id_user')
        );
        $this->db->update('user',$data,$where);
        $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Berhasil disimpan</strong> 
            </div>');
        redirect(site_url('user/index')); 
    }

    
}
