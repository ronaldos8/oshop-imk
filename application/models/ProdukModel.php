<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model {

	function get_all()
	{
		return $this->db->get('produk')->result();
	}

	function get_by_id($id)
	{
		$this->db->where('id_produk', $id);
		$result = $this->db->get('produk');
		return $result->row();
	}
}

/* End of file ProdukModel.php */
/* Location: ./application/models/ProdukModel.php */