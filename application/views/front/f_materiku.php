
            <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                <h2 class="text-center">Daftar Materiku</h2>
                <p class="text-center">Halo, <?php echo$dataku->nama; ?>. Ini daftar materi yang sudah kamu beli.</p>
                <?php if ($datamateri){  ?>
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-xs-12 col-sm-12 col-md-offset-1">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"> 
                            <?php foreach($datamateri->result() as $row): ?>
                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="heading<?php echo $row->idMateri ?>">
                                <h4 class="panel-title">
                                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row->idMateri ?>" aria-expanded="true" aria-controls="collapse<?php echo $row->idMateri ?>">
                                    <?php echo $row->namaPelajaran." ".$row->namaKelas ?>
                                  </a>
                                  <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row->idMateri ?>" aria-expanded="true" aria-controls="collapse<?php echo $row->idMateri ?>">
                                    Lihat Detail
                                  </a>  
                                </h4>
                              </div>
                              <div id="collapse<?php echo $row->idMateri ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $row->idMateri ?>">
                                <div class="panel-body">
                                    
                                    <?php if ($databab[$row->idMateri]){  ?>
                                    <h4>Ini nih yang ada di dalam <?php echo $row->namaPelajaran." ".$row->namaKelas ?></h4>
                                    <ol>
                                    <?php 
                                    
                                    foreach($databab[$row->idMateri]->result() as $row1):?>
                                        <li><a href='<?php echo site_url(); ?>/materi/lihat/<?php echo $row1->idBab ?>'><?php echo $row1->namaBab ?></a></li>
                                    <?php endforeach;?>
                                    </ol>
                                    <?php } else { ?>
                                    <h4>Tidak ditemukan apa - apa di <?php echo $row->namaPelajaran." ".$row->namaKelas ?></h4>
                                    <?php } ?>
                                </div>
                              </div>
                            </div>
                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
                <?php } else { ?>
                <p class="text-center">Tidak ditemukan apa - apa di <?php echo $datakelas->namaKelas ?>.</p>
                <?php } ?>
            </div>
        </div>