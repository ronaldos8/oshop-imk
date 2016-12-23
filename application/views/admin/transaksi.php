<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card card-mini">
		<div class="card-header">
    		<div class="card-title"><b>Daftar Transaksi</b></div>
    		<ul class="card-action">
				<li>
	            	<a href="<?php echo base_url('admin/tambahproduk'); ?>">
	            		<i class="icon fa fa-plus"></i>
	            	</a>
	        	</li>
	        </ul>
    	</div>
    	<div class="card-body no-padding table-responsive">
    	<div class="container">
    		<p class="text-warning">
    			<?php
    				if ($this->session->has_userdata('status')) {
    					echo $this->session->flashdata('status');
    				}
    			?>
    		</p>
    	</div>
	        <table class="table card-table table-hover">
	        	<thead>
	            	<tr>
	            		<th>No</th>
	            		<th>No Transaksi</th>
	            		<th>Nama Produk</th>
	            		<th>Foto</th>
	            		<th>Qty</th>
	            		<th>Harga</th>
	            		<th>Status</th>
	            		<th>Aksi</th>
	            	</tr>
	        	</thead>
	        	<tbody>
		            <?php
		            	if ($transaksi_bl != NULL) {
		            		$c = 1;
		            		foreach ($transaksi_bl as $value) {
		            ?>
		            			<tr>
		            				<td><?php echo $c; ?></td>
		            				<td>
		            					<a href="<?php echo base_url('admin/trx/') .$value->id; ?>" title=""><?php echo $value->no_transaksi; ?></a>
		            				</td>
					            	<td><?php echo $value->nama_produk; ?></td>
					              	<td class="col-md-2"><img class="img-responsive" src="<?php echo base_url('assets/images/produk/') .$value->foto_produk; ?>" alt=""></td>
					              	<td><?php echo $value->qty; ?></td>
					              	<td><?php echo "Rp." .number_format($value->harga, 2, ',', '.'); ?></td>
					              	<td>
					              		<?php
					              			if ($value->status == 0) {
					              		?>
					              		<span class="badge badge-danger badge-icon"><i class="fa fa-times" aria-hidden="true"></i><span>Belum Lunas</span></span>
					              		<?php
					              			}else if($value->status == 1) {
					              		?>
					              		<span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Lunas</span></span>
					              		<?php
					              			}else {
					              		?>
					              		<span class="badge badge-warning badge-icon"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Pending</span></span>
					              		<?php
					              			}
					              		?>
					              	</td>
					              	<td>
					              		<a href="<?php echo base_url('admin/lunas_trx/') .$value->id; ?>" title="Edit">
					              			<button type="button" class="btn btn-success btn-sm" title="Lunas">
	            								<div class="info">
								            		<i class="icon fa fa-check" aria-hidden="true"></i>
								              		<!-- <span class="title">Edit</span> -->
								            	</div>
								        	</button>
					              		</a>
					              		<a href="<?php echo base_url('admin/pending_trx/') .$value->id; ?>" title="Lihat">
					              			<button type="button" class="btn btn-warning btn-sm" title="Pending">
	            								<div class="info">
								            		<i class="icon fa fa-clock-o" aria-hidden="true"></i>
								            		<!-- <span class="title">Lihat</span> -->
								            	</div>
								        	</button>
					              		</a>
					              		<a href="<?php echo base_url('admin/bl_trx/') .$value->id; ?>" title="Belum Lunas">
					              			<button type="button" class="btn btn-danger btn-sm">
	            								<div class="info">
								            		<i class="icon fa fa-ban" aria-hidden="true"></i>
								            	</div>
								        	</button>
					              		</a>
					              	</td>	
					            </tr>
		            <?php
		            			$c++;
		            		}
		            	}
		            ?>
	        	</tbody>
	        </table>
      	</div>
    </div>
</div>