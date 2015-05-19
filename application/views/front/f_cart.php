
                <div class="container">

                    <div class="row">
                        
                        <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                            
                            <div class="row">
                                <h2 class="text-center">Cart</h2>
                                
                                <table class="table table-hover table-bordered table-striped">
                                    <tr>
                                      <th>Nama Item</th>
                                      <th>Masa Berlaku</th>
                                      <th>Harga</th>
                                      <th>Action</th>
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
                                      <td>
                                        <form action="<?php echo current_url();?>" method="post">
                                            <input type="hidden" name="rowid" value="<?php echo $items['rowid']; ?>">
                                            <button type="submit" class="btn btn-default" name="hapus" value="dasd"><span class="glyphicon glyphicon-remove"></span></button>
                                        </form>
                                      </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                      <td colspan="2" class="text-right"><h4>TOTAL</h4></td>
                                      <td><h5>Rp. <?php echo number_format($this->cart->total()); ?></h5></td>
                                      <td></td>
                                    </tr>
                                </table>
                                
                                <form method="post" action="<?php echo current_url(); ?>">
                                    <input type="submit" name="checkout" value="Checkout" class="btn btn-lg btn-primary">
                                    <input type="submit" name="hapussemua" value="Hapus" class="btn btn-lg btn-danger">
                                </form>
                                
                            </div>

                        </div>

                    </div>

                </div>

