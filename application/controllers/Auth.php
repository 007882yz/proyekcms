<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('login');
	}
    
	public function register()
	{
		$this->load->view('regis');
	}

	public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
    
        // Ambil user berdasarkan username
        $this->db->from('user')->where('username', $username);
        $user = $this->db->get()->row();
    
        // Jika user tidak ditemukan
        if ($user == NULL) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Username tidak ada!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        } 
        // Jika password cocok
        elseif ($user->password == $password) {
            // Cek level pengguna
            if ($user->level == 'Admin') {
                // Set session jika level adalah admin
                $data = array(
                    'username' => $user->username,
                    'nama'     => $user->nama,
                    'level'    => $user->level,
                    'id_user'  => $user->id_user, 
                );
                $this->session->set_userdata($data);
    
                redirect('dashboard');
            } 
            elseif ($user->level == 'Kontributor') {
                // Set session jika level adalah user
                $data = array(
                    'username' => $user->username,
                    'nama'     => $user->nama,
                    'level'    => $user->level,
                    'id_user'  => $user->id_user, 
                );
                $this->session->set_userdata($data);
    
                redirect('front/home'); // Redirect ke halaman front/home untuk level user
            }
            else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> Level pengguna tidak dikenali!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('auth');
            }
        } 
        // Jika password salah
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Password yang anda masukkan salah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        }
    }

	public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}	
}
