<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	function get_login($username, $password)
	{
		$password = md5($password);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$r = $this->db->get('pembeli', 1, 0);
		return $r->row();
	}

	function get_user($id)
	{
		$this->db->where('id_pembeli', $id);
		$r = $this->db->get('pembeli', 1, 0);
		return $r->row();
	}

	function get_trx($id)
	{
		$q = "SELECT a.nama_produk as nama_produk, a.foto_produk as foto_produk, b.qty as qty, b.harga as harga, b.no_transaksi as no_transaksi, b.status as status FROM produk a, transaksi b WHERE a.id_produk = b.id_produk and b.id_pembeli = $id";
		$r = $this->db->query($q);
		return $r->result();
	}

	function get_wishlist($id)
	{
		$q = "SELECT c.whishlist_id as whishlist_id, a.id_produk as id_produk, a.nama_produk as nama_produk, a.foto_produk as foto_produk, a.harga_produk as harga_produk FROM produk a, pembeli b, whishlist c WHERE a.id_produk = c.id_produk and b.id_pembeli = c.id_pembeli and c.id_pembeli = $id";
		$r = $this->db->query($q);
		return $r->result();
	}

}

/* End of file userModel.php */
/* Location: ./application/models/userModel.php */