
            <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                <h2 class="text-center"><?php echo $databab->namaBab ?></h2>
                <p class="text-center">Ini nih yang ada di <?php echo $databab->namaBab ?>.</p>
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-xs-12 col-sm-12 col-md-offset-1">
                        <script>
                            function pause(temp){
                                temp.pause();
                            }
                        </script>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php if ($hakakses){ ?>
                                <?php foreach($datasubbab->result() as $row): ?>
                                <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="heading<?php echo $row->idSubbab ?>">
                                    <h4 class="panel-title">
                                      <a onclick="pause(videoku<?php echo $row->idSubbab; ?>)" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row->idSubbab  ?>" aria-expanded="true" aria-controls="collapse<?php echo $row->idSubbab  ?>">
                                        <?php echo $row->namaSubbab?>
                                      </a>
                                      <a onclick="pause(videoku<?php echo $row->idSubbab; ?>)" class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row->idSubbab  ?>" aria-expanded="true" aria-controls="collapse<?php echo $row->idSubbab  ?>">
                                        Lihat Detail
                                      </a>  
                                    </h4>
                                  </div>
                                  <div id="collapse<?php echo $row->idSubbab  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $row->idSubbab  ?>">
                                    <div class="panel-body">
                                        <h4>Deskripsi</h4>
                                        <p><?php echo $row->deskripsi ?></p>
                                        <h4>Video</h4>
                                        <video width="480" id="videoku<?php echo $row->idSubbab; ?>" controls>
                                            <source src="<?php echo base_url().'video/'.$row->link ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                  </div>
                                </div>
                                <?php endforeach; ?>
                            <?php } else { $count=0;?>
                            <?php foreach($datasubbab->result() as $row): ?>
                            <?php if ($count == 0) {?>
                                <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="heading<?php echo $row->idSubbab ?>">
                                    <h4 class="panel-title">
                                      <a onclick="pause(videoku<?php echo $row->idSubbab; ?>)" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row->idSubbab  ?>" aria-expanded="true" aria-controls="collapse<?php echo $row->idSubbab  ?>">
                                        <?php echo $row->namaSubbab?>
                                      </a>
                                      <a onclick="pause(videoku<?php echo $row->idSubbab; ?>)" class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row->idSubbab  ?>" aria-expanded="true" aria-controls="collapse<?php echo $row->idSubbab  ?>">
                                        Lihat Detail
                                      </a>  
                                    </h4>
                                  </div>
                                  <div id="collapse<?php echo $row->idSubbab  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $row->idSubbab  ?>">
                                    <div class="panel-body">
                                        <h4>Deskripsi</h4>
                                        <p><?php echo $row->deskripsi ?></p>
                                        <h4>Video</h4>
                                        <video width="480" id="videoku<?php echo $row->idSubbab; ?>" controls preload="none">
                                            <source src="<?php echo base_url().'video/'.$row->link ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                  </div>
                                </div>
                            <?php $count++; } else { ?>
                                <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="heading<?php echo $row->idSubbab ?>">
                                    <h4 class="panel-title">
                                      <a onclick="pause(videoku<?php echo $row->idSubbab; ?>)" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row->idSubbab  ?>" aria-expanded="true" aria-controls="collapse<?php echo $row->idSubbab  ?>">
                                        <?php echo $row->namaSubbab?>
                                      </a>
                                      <a onclick="pause(videoku<?php echo $row->idSubbab; ?>)" class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row->idSubbab  ?>" aria-expanded="true" aria-controls="collapse<?php echo $row->idSubbab  ?>">
                                        Lihat Detail
                                      </a>  
                                    </h4>
                                  </div>
                                  <div id="collapse<?php echo $row->idSubbab  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $row->idSubbab  ?>">
                                    <div class="panel-body">
                                        <h4>Deskripsi</h4>
                                        <p><?php echo $row->deskripsi ?></p>
                                        <h4>Video</h4>
                                        Ingin lihat video subbab ini? Beli materi untuk pelajaran ini dulu yaa..
                                    </div>
                                  </div>
                                </div>
                            <?php } ?>
                             <?php endforeach; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>