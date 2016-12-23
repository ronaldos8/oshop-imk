<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProdukModel');
		$this->load->model('AdminModel');
		$this->load->helper('file');
		$this->load->library('pagination');
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

	function produk($offset = 0)
	{
		$this->cek_login();
	
		$data['menu_product'] = 'active';
		$data['title'] = 'Produk';
		$data['page_header'] = 'Produk';
		$data['isi'] = 'admin/produk';
		$data['no'] = $offset+1;

		$data['list_produk'] = $this->ProdukModel->get_for_paging(5, $offset);
		$numrow = $this->ProdukModel->get_num_row();

		// pagination Produk
		$config['base_url'] = base_url('admin/produk/');
		$config['total_rows'] = $numrow;
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";

		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";

		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";

		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";

		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";

		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";

		$config['cur_tag_open'] = "<li class='active'><a><b>";
		$config['cur_tag_close'] = "</b></a></li>";

		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

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
        $config['allowed_types']        = '*';
        $config['max_size']             = 10000000;
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

	function transaksi()
	{
		$this->cek_login();
		
		$data['title'] = 'Transaksi';
		$data['page_header'] = 'Transaksi';
		$data['menu_trx'] = 'active';
		$data['isi'] = 'admin/transaksi';

		$data['transaksi_bl'] = $this->AdminModel->get_trx();

		$this->load->view('admin/main', $data);
	}

	function lunas_trx($id)
	{
		$this->db->where('ID', $id);
		$data['status'] = 1;
		$this->db->update('transaksi', $data);
		$this->session->set_flashdata('status', 'Produk berhasil diupdate');
		redirect(base_url('admin/transaksi'),'refresh');
	}

	function pending_trx($id)
	{
		$this->db->where('ID', $id);
		$data['status'] = 2;
		$this->db->update('transaksi', $data);
		$this->session->set_flashdata('status', 'Produk berhasil diupdate');
		redirect(base_url('admin/transaksi'),'refresh');
	}

	function bl_trx($id)
	{
		$this->db->where('ID', $id);
		$data['status'] = 0;
		$this->db->update('transaksi', $data);
		$this->session->set_flashdata('status', 'Produk berhasil diupdate');
		redirect(base_url('admin/transaksi'),'refresh');
	}

	function chat()
	{
		$this->cek_login();
		
		$data['title'] = 'Obrolan';
		$data['page_header'] = 'Obrolan';
		$data['menu_chat'] = 'active';
		$data['isi'] = 'admin/chat';
		$this->load->view('admin/main', $data);
	}

	function trx($id)
	{
		$data['title'] = 'Transaksi ';
		$data['page_header'] = 'Transaksi';
		$data['menu_trx'] = 'active';
		$data['isi'] = 'soon';
		$this->load->view('admin/main', $data);
	}

	function soon()
	{
		$data['title'] = 'This page is coming soon ';
		$data['page_header'] = 'Page Name';
		// $data['menu_trx'] = 'active';
		$data['isi'] = 'soon';
		$this->load->view('admin/main', $data);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin/login'),'refresh');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */