<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usermodel');
		$this->load->model('produkmodel');
		$this->load->library('cart');
	}

	public function index()
	{
		$id = $this->session->userdata('ID_user');

		$pembeli = $this->usermodel->get_user($id);

		$data['title'] = $pembeli->nama_pembeli;
		$data['slider'] = 0;
		$data['isi'] = 'konten/profile';

		$data['pembeli'] = $pembeli;
		$data['v_kategori'] = FALSE;

		$this->load->view('main', $data);
	}

	function cek_login()
	{
		if (!$this->session->has_userdata('log_user')) {
			redirect(base_url('user/login'),'refresh');
		}
	}

	function login()
	{
		$data['title'] = 'Login ';
		$data['isi'] = 'konten/login';
		$data['slider'] = 0;
		$data['v_kategori'] = TRUE;
		$data['menu_login'] = 'active';
		$this->load->view('main', $data);
	}

	function edit()
	{
		$id = $this->session->userdata('ID_user');

		$pembeli = $this->usermodel->get_user($id);

		$data['title'] = $pembeli->nama_pembeli;
		$data['slider'] = 0;
		$data['isi'] = 'konten/editprofile';
		$data['v_kategori'] = FALSE;

		$data['pembeli'] = $pembeli;

		$this->load->view('main', $data);
	}

	function proses_edit()
	{
		$id = $this->input->post('id_pembeli');
		unset($_POST['id_pembeli']);
		$this->db->where('id_pembeli', $id);
		$this->db->update('pembeli', $_POST);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', 'Profile berhasil diperbaharui');
			redirect(base_url('user'),'refresh');
		}else {
			$this->session->set_flashdata('status', 'Profile tidak diperbaharui');
			redirect(base_url('user'),'refresh');
		}
	}

	function beli($id = NULL, $qty = NULL)
	{
		if ($id != NULL) {
			if($qty == NULL)
			{
				$data['qty'] = 1;
			}else $data['qty'] = $qty;

			if (is_array($id)) {
				foreach ($id as $value) {
					$data['produk'][] = $this->produkmodel->get_by_id($value);
				}
			}else $data['produk'] = $this->produkmodel->get_by_id($id);

			$data['title'] = 'Beli ';
			$data['v_kategori'] = FALSE;
			$data['slider'] = 0;
			$data['isi'] = 'konten/beli';

			$data['pembeli'] = $this->usermodel->get_user($this->session->userdata('ID_user'));

			$this->load->view('main', $data);

		}else redirect(base_url(),'refresh');
	}

	function pembayaran($id = NULL, $qty = NULL)
	{
		if ($id != NULL) {
			$data['produk'] = $this->produkmodel->get_by_id($id);
			$data['title'] = 'Pembayaran ';
			$data['v_kategori'] = FALSE;
			$data['slider'] = 0;
			$data['isi'] = 'konten/pembayaran';

			if (isset($qty)) {
				$data['qty'] = $qty;
			}
			$data['pembeli'] = $this->usermodel->get_user($this->session->userdata('ID_user'));

			$this->load->view('main', $data);
		}else {
			redirect(base_url(),'refresh');
		}
	}

	function proses_transaksi()
	{
		$trx = 'OS' .date('dm') .rand(100000, 999999);
		$_POST['no_transaksi'] = $trx;

		$this->db->insert('transaksi', $_POST);

		if ($this->db->affected_rows() > 0) {
			redirect(base_url('user/transaksi'),'refresh');
		}else echo 'Transaksi gagal';
	}

	function transaksi()
	{
		$data['title'] = 'Transaksi';
		$data['slider'] = 0;
		$data['v_kategori'] = FALSE;
		$data['isi'] = 'konten/transaksi';

		$data['transaksi'] = $this->usermodel->get_trx($this->session->userdata('ID_user'));

		$this->load->view('main', $data);
	}

	function proses_daftar()
	{
		$_POST['password'] = md5($_POST['password']);
		$this->db->insert('pembeli', $_POST);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', 'Pendaftaran berhasil. silahkan login menggunakan username dan password anda.');
			redirect(base_url('user/login'),'refresh');
		}else {
			$this->session->set_flashdata('status', 'Pendaftaran gagal. silahkan coba lagi');
			redirect(base_url('user/login'),'refresh');
		}
	}

	function proses_login()
	{
		$row = $this->usermodel->get_login($this->input->post('username'), $this->input->post('password'));
		if ($row != NULL) {
			$array = array(
				'log_user' => TRUE,
				'ID_user' => $row->id_pembeli,
				'nama_user' => $row->nama_pembeli
			);
			
			$this->session->set_userdata($array);

			redirect(base_url('user'),'refresh');
		}else {
			$this->session->set_flashdata('status', 'Username atau Password salah');
			redirect(base_url('user/login'),'refresh');
		}
	}

	function cart()
	{
		$data['title'] = 'Cart ';
		$data['slider'] = 0;
		$data['v_kategori'] = FALSE;
		$data['isi'] = 'konten/cart';

		$this->load->view('main', $data);
	}

	function proses_cart()
	{
		if ($this->input->post('submit') == 'cart') {
			$data = array(
				'id'      => $this->input->post('id_produk'),
				'qty'     => $this->input->post('qty'),
				'price'   => $this->input->post('harga_produk'),
				'name'    => $this->input->post('nama_produk'),
				'foto'	  => $this->input->post('foto_produk')
			);

			$this->cart->insert($data);
			
			$r = base_url('produk/s/') .$this->input->post('id_produk');
			redirect($r,'refresh');
		}else if ($this->input->post('submit') == 'buy') {
			$r = base_url('user/beli/') .$this->input->post('id_produk') ."/" .$this->input->post('qty');
			redirect($r,'refresh');
		}
	}

	function hapus_cart($rowid)
	{
		$data = array(
			'rowid' => $rowid,
			'qty'   => 0
		);
		
		$this->cart->update($data);

		redirect(base_url('user/cart'),'refresh');
	}

	// function 

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */