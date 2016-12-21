<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card card-mini">
		
    	<div class="card-body no-padding table-responsive">
    		<?php
    			if ($this->session->has_userdata('status')) {
    		?>
    				<div class="card-header">
						<p class="text-success"><?php echo $this->session->flashdata('status'); ?></p>
					</div>
    		<?php
    			}
    		?>
	        <form action="<?php echo base_url('admin/prosesproduk'); ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	        	<table class="table card-table">
		        	<tbody>
		        		<tr>
		        			<td>
		        				<input type="text" class="form-control" name="nama_produk" value="" placeholder="Nama Produk" required />
		        			</td>
		        			<td>
		        				<input type="number" min="1" class="form-control" name="stock_produk" value="" placeholder="Stock Produk" required />
		        			</td>
		        			<td>
		        				<input type="text" class="form-control" name="brand_produk" value="" placeholder="Brand Produk" required />
		        			</td>
		        		</tr>
		        		<tr>
		        			<td colspan="3">
		        				<textarea class="form-control" name="detail_produk" placeholder="Detail Produk" requierd></textarea>
		        			</td>
		        		</tr>
		        		<tr>
		        			<td>
		        				<select name="kondisi_produk" class="form-control" required>
		        					<option value="">--Kondisi Produk--</option>
		        					<option value="1">baru</option>
		        					<option value="0">Bekas	</option>
		        				</select>
		        			</td>
		        			<td>
		        				<input type="number" class="form-control" name="harga_produk" value="" placeholder="harga Produk" required />
		        			</td>
		        			<td>
		        				<select name="kategori_produk" class="form-control" required >
		        					<option value="">--Kategori Produk--</option>
		        					<?php
		        						if ($list_subkategori != NULL) {
		        							foreach ($list_subkategori as $value) {
		        								$str = "<option value='" .$value->id_sub ."'>" .$value->nama_sub;
		        								if ($value->kategori == 2) {
		        									$str .= " Perempuan";
		        								}else $str .= " Pria";
		        								$str .= "</option>";

		        								echo $str;
		        							}
		        						}
		        					?>
		        				</select>
		        			</td>
		        		</tr>
		        		<tr>
		        			<td class="text-right">
		        				Foto Produk :
		        			</td>
		        			<td>
		        				<input type="file" name="foto" value="" placeholder="">
		        			</td>
		        		</tr>
		        		<tr>
		        			<td>
		        				<button type="submit" class="btn btn-default">Simpan</button>
		        			</td>
		        		</tr>
		        	</tbody>
		        </table>
	        </form>
		</div>
	</div>
</div>