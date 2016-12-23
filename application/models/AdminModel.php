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

	function get_trx()
	{
		$q = "SELECT a.nama_produk as nama_produk, a.foto_produk as foto_produk, b.nama_pembeli as nama_pembeli, c.status as status, c.no_transaksi as no_transaksi, c.qty as qty, c.harga as harga, c.id as id from produk a, pembeli b, transaksi c where b.id_pembeli = c.id_pembeli and a.id_produk = c.id_produk";
		$r = $this->db->query($q);
		return $r->result();
	}

}

/* End of file adminModel.php */
/* Location: ./application/models/adminModel.php */