
                <div class="container">

                    <div class="row">
                        
                        <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                            
                            <div class="row">
                                <h2 class="text-center">Checkout</h2>
                                
                                <table class="table table-hover table-bordered table-striped">
                                    <tr>
                                      <th>Nama Item</th>
                                      <th>Masa Berlaku</th>
                                      <th>Harga</th>
                                    </tr>


                                    <?php
                                        $u=0;
                                        if(!$this->cart->contents()):
                                    ?>
                                    <td colspan="4" class="text-center">Cart kosong, pilih <a href="<?php echo site_url();?>/materi/beli">Beli Materi</a> untuk membeli pelajaran</td>
                                    <?php
                                        endif;
                                        foreach ($this->cart->contents() as $items):
                                            $u++;
                                    ?>
                                    <tr>
                                      <td>
                                        <p><?php echo $items['name']; ?></p>
                                      </td>
                                      <td>
                                        <p><?php echo $items['masa']; ?></p>
                                      </td>
                                      <td>Rp. <?php echo number_format($items['price']); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                      <td colspan="2" class="text-right"><h4>TOTAL</h4></td>
                                      <td><h5>Rp. <?php echo number_format($this->cart->total()); ?></h5></td>
                                    </tr>
                                </table>
                                <p>Lakukan transfer sebesar Rp. <?php echo number_format($this->cart->total()); ?> ke rekening:</p>
                                <ul>
                                    <li>BCA 731.123.123</li>
                                    <li>MANDIRI 102.432.123</li>
                                </ul>
                                <p>Setelah transfer, simpan bukti transfer dan upload softcopy ke dalam menu <a href="<?php echo site_url(); ?>/materi/bayar">Konfirmasi</a></p>
                                <p>Tunggu konfirmasi dari admin</p>
                                <p>Jika sudah terkonfirmasi, maka materi dapat diakses dari menu <a href="<?php echo site_url() ?>/materiku">Materiku</a></p>
                                <br>
                                <form method="post" action="<?php echo current_url(); ?>">
                                    <h4>Anda yakin?</h4><input type="submit" name="submit" value="Ok" class="btn btn-lg btn-primary">
                                </form>
                                
                            </div>

                        </div>

                    </div>

                </div>

