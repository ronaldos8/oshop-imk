<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProdukModel');
		$this->load->model('AdminModel');
		$this->load->helper('file');
	}

	public function index()
	{
		$this->cek_login();
		
		$data['title'] = 'Dashboard';
		$data['page_header'] = 'Dashboard';
		$data['menu_dashboard'] = 'active';
		$data['isi'] = 'admin/dashboard';
		$this->load->view('admin/main', $data);
	}

	function cek_login()
	{
		if ($this->session->has_userdata('log')) {
			if ($this->session->userdata('log') != TRUE) {
				redirect(base_url('admin/login'),'refresh');
			}
		}else redirect(base_url('admin/login'),'refresh');
	}

	function login()
	{
		$this->load->view('admin/login');
	}

	function proses_login()
	{
		$uname = $this->input->post('username');
		$upass = md5($this->input->post('password'));

		$this->db->where('username', $uname);
		$this->db->where('password', $upass);
		$row = $this->db->get('admin', 1);

		if ($row->num_rows() > 0) {
			$row = $row->row();
			$array = array(
				'log' => TRUE,
				'admin_id' => $row->id,
				'admin_name' => $row->nama
			);
			
			$this->session->set_userdata($array);

			redirect(base_url('admin'),'refresh');
		}else {
			$this->session->set_flashdata('status', 'Username atau password salah.');
			redirect(base_url('admin/login'),'refresh');
		}

	}

	function produk()
	{
		$this->cek_login();

		$data['menu_product'] = 'active';
		$data['title'] = 'Produk';
		$data['page_header'] = 'Produk';
		$data['isi'] = 'admin/produk';

		$data['list_produk'] = $this->ProdukModel->get_all();

		$this->load->view('admin/main', $data); 
	}

	function tambahproduk()
	{
		$this->cek_login();

		$data['menu_product'] = 'active';
		$data['title'] = 'Tambah Produk';
		$data['page_header'] = 'Tambah Produk';
		$data['isi'] = 'admin/tambahproduk';

		$data['list_subkategori'] = $this->AdminModel->get_subkategori();

		$this->load->view('admin/main', $data);
	}

	function prosesproduk()
	{
		$config['upload_path']          = './assets/images/produk/';
        $config['allowed_types']        = 'gif|jpg|png|GIF|JPG|PNG';
        $config['max_size']             = 1000000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto'))
        {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
        }
        else {
                $data = array('upload_data' => $this->upload->data());
                $_POST['foto_produk'] = $data['upload_data']['file_name'];
                $this->db->insert('produk', $_POST);

                if ($this->db->affected_rows() > 0) {
                	$this->session->set_flashdata('status', 'Produk berhasil disimpan.');
                }else {
                	$this->session->set_flashdata('status', 'Produk gagal disimpan. silahkan coba lagi.');
                }
                
                redirect(base_url('admin/tambahproduk'),'refresh');
        }
	}

	function hapusproduk($id = NULL)
	{
		if ($id == NULL) {
			redirect(base_url('admin/produk'),'refresh');
		}else {
			$this->db->where('id_produk', $id);
			$r = $this->db->get('produk');
			$r = $r->row();

			$this->db->where('id_produk', $id);
			$this->db->delete('produk');
			$path = "./assets/images/produk/" .$r->foto_produk;
			unlink($path);
			redirect(base_url('admin/produk'),'refresh');
		}
	}

	function kategori()
	{
		$this->cek_login();

		$data['title'] = 'kategori';
		$data['page_header'] = 'kategori';
		$data['isi'] = 'admin/kategori';

		$data['list_kategori'] = $this->AdminModel->get_full_kategori();

		$this->load->view('admin/main', $data);
	}

	function proseskategori()
	{
		if ($this->input->post('nama_sub') != '') {
			$this->db->insert('subkategori', $_POST);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('status', 'Kategori berhasil disimpan');
				redirect(base_url('admin/kategori'),'refresh');
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin/login'),'refresh');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */