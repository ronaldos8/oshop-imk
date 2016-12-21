<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProdukModel');
	}

	public function index()
	{
		$data['slider'] = 1;
		$data['isi'] = 'konten/home';
		$data['title'] = 'Beranda';

		$data['list_produk'] = $this->ProdukModel->get_all();
		$data['pria'] = $this->ProdukModel->get_kategori(1);
		$data['wanita'] = $this->ProdukModel->get_kategori(2);
		$data['brand'] = $this->ProdukModel->get_brand();

		$this->load->view('main', $data);
	}
}
