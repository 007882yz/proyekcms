<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model{
    public function get_all_product($ktr)
    {
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->where('kategori', $ktr);
        $this->db->order_by('judul', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

}
