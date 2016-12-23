<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProdukModel');
		$this->load->model('UserModel');
	}

	function index()
	{

	}

	public function s($id = NULL)
	{
		$data['slider'] = 0;
		if ($id != NULL) {
			$data['isi'] = 'konten/detail_produk';
			// $data['v_kategori'] = FALSE;

			$data['produk'] = $this->ProdukModel->get_by_id($id);
			$data['pria'] = $this->ProdukModel->get_kategori(1);
			$data['wanita'] = $this->ProdukModel->get_kategori(2);
			$b = $this->ProdukModel->get_brand();

			$i = 0;
			foreach ($b as $value) {
				$brand[$i] = $value->brand_produk;
				$i++;
			}
			$i = 0;
			$c = 0;
			$max = count($brand);
			while ($i < $max) {
				if ($i < $max-1) {
					if ($brand[$i] == $brand[$i+1]) {
						$i++;
						$data['brand'][$c] = $brand[$i];
						if ($brand[$i+1] != $brand[$i+2]) {
							$c++;
						}
					}else{
						$data['brand'][$c] = $brand[$i];
						$c++;
					}
				}else {
					$data['brand'][$c] = $brand[$i];
				}
				$i++;
			}

			$data['title'] = $data['produk']->nama_produk;
			$data['recommended'] = $this->ProdukModel->get_by_rec($data['produk']->kategori_produk);

			$this->load->view('main', $data);
		}
	}

	function kategori($id = NULL)
	{
		if ($id != NULL) {
			$data['isi'] = 'konten/home';

			$kategori = $this->ProdukModel->get_kategori_by_id($id);
			$data['pria'] = $this->ProdukModel->get_kategori(1);
			$data['wanita'] = $this->ProdukModel->get_kategori(2);
			$b = $this->ProdukModel->get_brand();

			$i = 0;
			foreach ($b as $value) {
				$brand[$i] = $value->brand_produk;
				$i++;
			}
			$i = 0;
			$c = 0;
			$max = count($brand);
			while ($i < $max) {
				if ($i < $max-1) {
					if ($brand[$i] == $brand[$i+1]) {
						$i++;
						$data['brand'][$c] = $brand[$i];
						if ($brand[$i+1] != $brand[$i+2]) {
							$c++;
						}
					}else{
						$data['brand'][$c] = $brand[$i];
						$c++;
					}
				}else {
					$data['brand'][$c] = $brand[$i];
				}
				$i++;
			}

			$data['list_produk'] = $this->ProdukModel->get_by_kategori($id);

			$data['title'] = $kategori->nama_sub;
			$data['slider'] = 1;
			if ($kategori->kategori == 1) {
				$data['header_kategori'] = $kategori->nama_sub ." Pria";
			}else $data['header_kategori'] = $kategori->nama_sub ." Wanita";
			

			$this->load->view('main', $data);
		}
	}

	function brand($id = NULL)
	{
		if ($id != NULL) {
			$data['isi'] = 'konten/home';

			$data['pria'] = $this->ProdukModel->get_kategori(1);
			$data['wanita'] = $this->ProdukModel->get_kategori(2);
			$b = $this->ProdukModel->get_brand();

			$i = 0;
			foreach ($b as $value) {
				$brand[$i] = $value->brand_produk;
				$i++;
			}
			$i = 0;
			$c = 0;
			$max = count($brand);
			while ($i < $max) {
				if ($i < $max-1) {
					if ($brand[$i] == $brand[$i+1]) {
						$i++;
						$data['brand'][$c] = $brand[$i];
						if ($brand[$i+1] != $brand[$i+2]) {
							$c++;
						}
					}else{
						$data['brand'][$c] = $brand[$i];
						$c++;
					}
				}else {
					$data['brand'][$c] = $brand[$i];
				}
				$i++;
			}

			$data['list_produk'] = $this->ProdukModel->get_by_brand($id);

			$data['title'] = $id ." ";
			$data['slider'] = 1;
			$data['header_kategori'] = "Produk dari " .$id;

			$this->load->view('main', $data);
		}
	}

	function cari()
	{
		$data['isi'] = 'konten/home';

		$data['pria'] = $this->ProdukModel->get_kategori(1);
		$data['wanita'] = $this->ProdukModel->get_kategori(2);
		$b = $this->ProdukModel->get_brand();

		$i = 0;
		foreach ($b as $value) {
			$brand[$i] = $value->brand_produk;
			$i++;
		}
		$i = 0;
		$c = 0;
		$max = count($brand);
		while ($i < $max) {
			if ($i < $max-1) {
				if ($brand[$i] == $brand[$i+1]) {
					$i++;
					$data['brand'][$c] = $brand[$i];
					if ($brand[$i+1] != $brand[$i+2]) {
						$c++;
					}
				}else{
					$data['brand'][$c] = $brand[$i];
					$c++;
				}
			}else {
				$data['brand'][$c] = $brand[$i];
			}
			$i++;
		}

		$data['list_produk'] = $this->ProdukModel->get_by_name($this->input->get('s'));

		$data['title'] = $this->input->get('s') ." ";
		$data['slider'] = 0;
		$data['header_kategori'] = "Hasil Pencarian " .$this->input->get('s');

		$this->load->view('main', $data);
	}

	function proses_wishlist($id_produk)
	{
		if ($this->session->has_userdata('log_user')) {
			$log = 1;
		}else $log = 0;

		if ($log == 1) {
			$obj['id_pembeli'] = $this->session->userdata('ID_user');
			$obj['id_produk'] = $id_produk;
			$this->db->insert('whishlist', $obj);
			$this->session->set_flashdata('status', 'Produk berhasil ditambahkan');
		}else {
			$this->session->set_flashdata('status', 'Silahkan login terlebih dahulu untuk mengakses fitur ini');
		}

		redirect(base_url('produk/wishlist'),'refresh');
	}

	function wishlist()
	{
		$data['title'] = 'Wishlist ';
		$data['slider'] = 0;
		$data['v_kategori'] = FALSE;
		$data['isi'] = 'konten/wishlist';

		if ($this->session->has_userdata('log_user')) {
			$data['wishlist'] = $this->UserModel->get_wishlist($this->session->userdata('ID_user'));
		}else $data['wishlist'] = NULL;

		$this->load->view('main', $data);
	}

	function hapus_wishlist($id)
	{
		$this->db->where('whishlist_id', $id);
		$this->db->delete('whishlist');
		$this->session->set_flashdata('status', 'Produk dihapus');
		redirect(base_url('produk/wishlist'),'refresh');
	}

}

/* End of file produk.php */
/* Location: ./application/controllers/produk.php */