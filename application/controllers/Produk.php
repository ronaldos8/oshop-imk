<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produkmodel');
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

			$data['produk'] = $this->produkmodel->get_by_id($id);

			$data['title'] = $data['produk']->nama_produk;

			$this->load->view('main', $data);
		}
	}

}

/* End of file produk.php */
/* Location: ./application/controllers/produk.php */