<?php
	$this->load->view('layout/head');
	$this->load->view('layout/header');
	if ($slider == 1) {
		$this->load->view('layout/slider');
	}
	if (!isset($v_kategori)) {
		$this->load->view('layout/sidebar');
	}
	$this->load->view('layout/konten');
	$this->load->view('layout/footer');
?>