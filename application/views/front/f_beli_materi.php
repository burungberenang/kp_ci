
                <div class="container">

                    <div class="row">
                        
                        <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                            
                            <div class="row">
                                <h2 class="text-center">Beli Materi</h2>
                                <?php foreach ($materis as $item): ?>
                                <div class="col-sm-4 col-lg-4 col-md-4">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <h4 class="pull-right">Rp. <?php echo number_format($item["nominal"]); ?></h4>
                                            <h4><?php echo $item["materi"].' '.$item["materi1"]; ?></h4>
                                            <p><?php echo $item["nama"]; ?></p>
                                        </div>
                                        <div class="ratings">
                                            <p>Masa berlaku : <?php echo $item["masaBerlaku"]; ?> bulan</p>
                                            <form action="<?php echo current_url(); ?>" method="post">
                                                <input type="hidden" value="<?php echo $item["id"]; ?>" name="id">
                                                <input type="hidden" value="<?php echo $item["nominal"]; ?>" name="nominal">
                                                <input type="hidden" value="<?php echo $item["materi"].' '.$item["materi1"]; ?>" name="nama">
                                                <input type="hidden" value="<?php echo $item["masaBerlaku"]; ?>" name="masa">
                                                <?php if(!isset($barangs[$item["id"]])): ?>
                                                <p><input type="submit" class="btn btn-primary" value="Tambahkan" name="tambah"></p>
                                                <?php else: ?>
                                                <input type="hidden" value="<?php echo $barangs[$item["id"]]; ?>" name="rowid">
                                                <p><input type="submit" class="btn btn-danger" value="Hapus dari cart" name="hapus"></p>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>

                        </div>

                    </div>

                </div>