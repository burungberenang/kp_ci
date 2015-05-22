
                <div class="container">

                    <div class="row">
                        
                        <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                            
                            <div class="row">
                                <h2 class="text-center">Hasil Pencarian untuk <?php echo $cari; ?></h2>
                                
                                <?php if($hasil): ?>
                                <?php foreach ($hasil as $item): ?>
                                <div class="media">
                                    <div class="media-body">
                                        <a href="<?php echo site_url(); ?>/materi/lihat/<?php echo $item['id']; ?>"><h4 class="media-heading"><?php echo $item['nama']; ?></h4></a>
                                        <p><?php echo word_limiter($item['deskripsi'],20); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php else:?>
                                <h4 class="text-center">Maaf, tidak ada hasil pencarian untuk <?php echo $cari; ?></h4>
                                <?php endif; ?>
                            </div>

                        </div>

                    </div>

                </div>

