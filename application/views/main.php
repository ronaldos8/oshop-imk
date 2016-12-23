<style type="text/css" media="screen">
	.h {
		display: none !important;
	}
</style>
<script type="text/javascript" charset="utf-8" async defer>
	function h()
	{
		var d = document.getElementById("w");
		var e = document.getElementById("d");
		d.className += "h";
		e.className += "h";
	}
</script>

<?php
	if(!$this->session->has_userdata('warning')){
		$array = array(
				'warning' => 1
			);
			
		$this->session->set_userdata($array);
		
		$this->session->set_userdata( $array );
?>
		<div id="d">
			<div class="alert alert-warning" role="alert">
				<p id="w">
					Website masih dalam pengembangan. page not found bukan karena kesalahan sistem, tapi karena memang page belum tersedia (file belum dibuat). mohon maaf atas ketidaknyamanannya.
					<button type="button" onclick="h()">Hilangkan</button>
				</p>
			</div>
		</div>
<?php		
	}
?>

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