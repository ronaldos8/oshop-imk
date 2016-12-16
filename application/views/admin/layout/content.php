<div class="btn-floating" id="help-actions">
  <div class="btn-bg"></div>
  <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
    <i class="icon fa fa-plus"></i>
    <span class="help-text">Shortcut</span>
  </button>
  <div class="toggle-content">
    <ul class="actions">
      <li><a href="<?php echo base_url('admin/tambahproduk'); ?>">Tambah Produk</a></li>
      <li><a href="#">Documentation</a></li>
      <li><a href="#">Issues</a></li>
      <li><a href="#">About</a></li>
    </ul>
  </div>
</div>

<div class="row">
  <?php
      if (is_array($isi)) {
        foreach ($isi as $value) {
          $this->load->view($value);
        }
      }else $this->load->view($isi);
  ?>
</div>
