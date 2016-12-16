<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usermodel');
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

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */