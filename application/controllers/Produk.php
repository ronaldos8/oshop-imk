<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProdukModel');
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
			$data['brand'] = $this->ProdukModel->get_brand();

			$data['title'] = $data['produk']->nama_produk;

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
			$data['brand'] = $this->ProdukModel->get_brand();

			$data['list_produk'] = $this->ProdukModel->get_by_kategori($id);

			$data['title'] = $kategori->nama_sub;
			$data['slider'] = 0;
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
			$data['brand'] = $this->ProdukModel->get_brand();

			$data['list_produk'] = $this->ProdukModel->get_by_brand($id);

			$data['title'] = $id ." ";
			$data['slider'] = 0;
			$data['header_kategori'] = "Produk dari " .$id;

			$this->load->view('main', $data);
		}
	}

	function cari()
	{
		$data['isi'] = 'konten/home';

		$data['pria'] = $this->ProdukModel->get_kategori(1);
		$data['wanita'] = $this->ProdukModel->get_kategori(2);
		$data['brand'] = $this->ProdukModel->get_brand();

		$data['list_produk'] = $this->ProdukModel->get_by_name($this->input->get('s'));

		$data['title'] = $this->input->get('s') ." ";
		$data['slider'] = 0;
		$data['header_kategori'] = "Hasil Pencarian " .$this->input->get('s');

		$this->load->view('main', $data);
	}

}

/* End of file produk.php */
/* Location: ./application/controllers/produk.php */