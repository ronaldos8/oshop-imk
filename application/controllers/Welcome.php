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
		$this->load->library('pagination');
	}

	public function index($order = NULL)
	{
		$data['menu_beranda'] = 1;
		$data['slider'] = 1;
		$data['isi'] = 'konten/home';
		$data['title'] = 'Beranda';
		
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

		// pagination Produk
			$config['base_url'] = base_url('welcome/index/');
			$config['total_rows'] = 200;
			$config['per_page'] = 15;
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
			$config['last_link'] = 'Terakhir';
			$config['first_link'] = 'Pertama';

			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('main', $data);
	}

	function kategori($id = NULL)
	{
		if ($id != NULL) {
			$data['slider'] = 1;
			$data['isi'] = 'konten/home';
			$data['title'] = $id .' ';

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

			if ($id == 'pria') {
				$id = 1;
				$data['header_kategori'] = 'kategori Pria';
			}else {
				$id = 2;
				$data['header_kategori'] = 'kategori Wanita';
			}

			$data['list_produk'] = $this->ProdukModel->get_by_parent($id);
			
			$this->load->view('main', $data);
		}
	}
}
