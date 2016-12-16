<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card card-mini">
		<div class="card-header">
    		<div class="card-title"><b>Daftar kategori</b></div>
    	</div>
    	<div class="card-body no-padding table-responsive">
    		<?php
    			if ($this->session->has_userdata('status')) {
    		?>
    			<p class="text-center text-success text-bg">
    			<?php echo $this->session->flashdata('status'); ?>
    			</p>
    		<?php
    			}
    		?>
			<table class="table card-table">
	        	<thead>
	            	<tr>
	            		<th>No</th>
	            		<th>Nama Kategori</th>
	            		<th>Parent Kategori</th>
	            		<th>Aksi</th>
	            	</tr>
	        	</thead>
	        	<tbody>
	        		<?php 
	        			if ($list_kategori != NULL) {
	        				$c = 1;
	        				foreach ($list_kategori as $value) {
	        		?>
	        		<tr>
	        			<td><?php echo $c; ?></td>
	        			<td><?php echo $value->nama_sub; ?></td>
	        			<td><?php echo $value->nama_kategori; ?></td>
	        			<td>
		              		<a href="<?php echo base_url('admin/editproduk/') .$value->id_sub; ?>" title="Edit">
		              			<button type="button" class="btn btn-primary btn-sm">
    								<div class="info">
					            		<i class="icon fa fa-edit" aria-hidden="true"></i>
					              		<!-- <span class="title">Edit</span> -->
					            	</div>
					        	</button>
		              		</a>
		              		<a href="<?php echo base_url('admin/hapusproduk/') .$value->id_sub; ?>" title="Hapus">
		              			<button type="button" class="btn btn-danger btn-sm">
    								<div class="info">
					            		<i class="icon fa fa-trash" aria-hidden="true"></i>
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

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card card-mini">
		<div class="card-header">
    		<div class="card-title"><b>Tambah kategori</b></div>
    	</div>
    	<div class="card-body no-padding table-responsive">
			<form action="<?php echo base_url('admin/proseskategori'); ?>" method="POST" accept-charset="utf-8">
				<table class="table card-table">
		        	<tbody>
		        		<tr>
		        			<td>
		        				<input type="text" class="form-control" name="nama_sub" value="" placeholder="Nama Kategori">
		        			</td>
		        			<td>
		        				<select class="form-control" name="kategori" required >
		        					<option value="">-- Parent Kategori --</option>
		        					<option value="1">Pria</option>
		        					<option value="2">Wanita</option>
		        				</select>
		        			</td>
		        		</tr>
		        		<tr>
		        			<td>
		        				<button type="submit" class="btn btn-success btn-sm">Simpan</button>
		        			</td>
		        		</tr>
		        	</tbody>
		        </table>
			</form>
    	</div>
    </div>
</div>