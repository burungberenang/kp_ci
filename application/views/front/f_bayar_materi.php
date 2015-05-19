
                <div class="container">

                    <div class="row">
                        
                        <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                            
                            <div class="row">
                                <h2 class="text-center">Konfirmasi Pembayaran Materi</h2>
                                <table class="table table-hover table-bordered table-striped">
                                    <tr>
                                      <th>Nama Item</th>
                                      <th>Masa Berlaku</th>
                                      <th>Harga</th>
                                      <th>Action</th>
                                    </tr>
                                    <?php foreach ($materis as $item): ?>
                                    <tr>
                                        <td><?php echo $item['materi'].' '.$item['materi1'] ?></td>
                                        <td><?php echo $item['masaBerlaku'] ?> bulan</td>
                                        <td><?php echo $item['nominal'] ?></td>
                                        <td><a class="btn btn-primary" href="<?php echo site_url(); ?>/materi/bayar/<?php echo $item['id']; ?>">Bayar</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>

