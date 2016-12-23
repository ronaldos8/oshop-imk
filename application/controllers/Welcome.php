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

	public function index($order = NULL)
	{
		$data['slider'] = 1;
		$data['isi'] = 'konten/home';
		$data['title'] = 'Beranda';
		echo $order;
		if ($order != NULL) {
			// $data['list_produk'] = $this->ProdukModel->get_all_order();
			print_r($_GET['orderby']);
		}else {
			$data['list_produk'] = $this->ProdukModel->get_all();
		}


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
		
		$this->load->view('main', $data);
	}
}
