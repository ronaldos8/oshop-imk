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

	function get_kategori($id)
	{
		$this->db->where('kategori', $id);
		$r = $this->db->get('subkategori');
		return $r->result();
	}

	function get_kategori_by_id($id)
	{
		$this->db->where('id_sub', $id);
		$r = $this->db->get('subkategori', 1, 0);
		return $r->row();
	}

	function get_brand()
	{
		$this->db->select('brand_produk');
		$this->db->order_by('brand_produk', 'asc');
		$r = $this->db->get('produk');
		return $r->result();
	}

	function get_by_kategori($id)
	{
		$this->db->where('kategori_produk', $id);
		$r = $this->db->get('produk');
		return $r->result();
	}

	function get_by_brand($str)
	{
		$q = "SELECT * FROM produk WHERE brand_produk LIKE '%$str%'";
		$r = $this->db->query($q);
		return $r->result();
	}

	function get_by_name($str)
	{
		$q = "SELECT * FROM produk WHERE nama_produk LIKE '%$str%'";
		$r = $this->db->query($q);
		return $r->result();
	}
}

/* End of file ProdukModel.php */
/* Location: ./application/models/ProdukModel.php */