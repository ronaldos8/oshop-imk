<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="container">
      <div class="col-md-8 col-sm-8 col-xs-12 well">
        <div class="login-form">
          <h2>Metode Pembayran</h2>
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <input type="radio" name="pembayaran" value="atm" placeholder="">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                     Transfer Via ATM
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <div class="col-md-3">
                    <img src="<?php echo base_url('assets/images/atm/bca.png'); ?>" class="img-responsive" alt="">
                    <span style="font-weight: bold;">20199140239523</span>
                  </div>

                  <div class="col-md-3">
                    <img src="<?php echo base_url('assets/images/atm/bni.png'); ?>" class="img-responsive" alt="">
                    <span style="font-weight: bold;">20199140239523</span>
                  </div>

                  <div class="col-md-3" style="padding-top: 6px;">
                    <img src="<?php echo base_url('assets/images/atm/bri.png'); ?>" class="img-responsive" alt="">
                    <span style="font-weight: bold;">20199140239523</span>
                  </div>

                  <div class="col-md-3" style="padding-top: 3px;">
                    <img src="<?php echo base_url('assets/images/atm/mandiri.png'); ?>" class="img-responsive" alt="">
                    <span style="font-weight: bold;">20199140239523</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <input type="radio" name="pembayaran" value="bank" placeholder="">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Transfer Bank
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <input type="radio" name="pembayaran" value="alfa" placeholder="">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Alfamart
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-4 col-xs-12 well">
          <div class="login-form">
            <h2>Ringkasan Pembelian</h2>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <b>Total Harga Barang</b>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12" align="right">
              <b><?php echo "Rp" .number_format($produk->harga_produk*$qty, 0, ',', '.'); ?></b>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <b>Biaya Kirim</b>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12" align="right">
              <b><?php echo "Rp" .number_format(12000, 0, ',', '.'); ?></b>
            </div>
            <div class="col-md-12">
              <hr>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <b>Total Belanja</b>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12" align="right">
              <b><?php echo "Rp" .number_format($produk->harga_produk*$qty+12000, 0, ',', '.'); ?></b>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <br>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" align="center">
              <form action="<?php echo base_url('user/proses_transaksi'); ?>" method="post" accept-charset="utf-8">
                <input type="hidden" name="qty" value="<?php echo $qty; ?>">
                <input type="hidden" name="id_produk" value="<?php echo $produk->id_produk; ?>">
                <input type="hidden" name="id_pembeli" value="<?php echo $pembeli->id_pembeli; ?>">
                <input type="hidden" name="harga" value="<?php echo $qty*$produk->harga_produk; ?>">
                <button type="submit" class="btn btn-default btn-success">Bayar</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>