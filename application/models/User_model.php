<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    public function update(){
        $data = array(
            'username'      => $this->input->post('username')
        );
        $where = array(
            'id_user'   => $this->input->post('id_user')
        );
        $this->db->update('user',$data,$where);
    }

}