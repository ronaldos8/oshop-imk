<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	function get_subkategori()
	{
		$r = $this->db->get('subkategori');
		$r = $r->result();
		return $r;
	}

	function get_full_kategori(){
		$q = "SELECT * FROM kategori a, subkategori b WHERE a.id_kategori = b.kategori";
		$s = $this->db->query($q);
		return $s->result();
	}

}

/* End of file adminModel.php */
/* Location: ./application/models/adminModel.php */