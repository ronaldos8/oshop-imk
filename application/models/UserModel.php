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

}

/* End of file userModel.php */
/* Location: ./application/models/userModel.php */