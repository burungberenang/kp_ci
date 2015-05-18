            <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                <h2 class="text-center"><?php echo $databab->namaBab; ?></h2>
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-xs-12 col-sm-12 col-md-offset-1">
                        <div class="widget-box">
                                <div class="widget-content nopadding">
                                        <table class="table table-bordered table-striped table-hover data-table">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-6">Nama SubBab</th>
                                                    <th class="col-md-6">Video</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <script>
                                                    function pause(temp){
                                                        temp.pause();
                                                    }
                                                </script>
                                                <?php foreach($datasubbab->result() as $row):?>
                                                <tr>
                                                    <td class="col-md-6"><?php echo $row->namaSubbab ?></td>
                                                    <td class="col-md-6">
                                                        <a href="#myModal<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-link">Link</a>
                                                        <!-- MODAL -->
                                                        <div id="myModal<?php echo $row->id; ?>" class="modal fade" onclick="pause(videoku<?php echo $row->id; ?>)">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content" style="text-align: center">
                                                                    <div class="modal-header">
                                                                        <button data-dismiss="modal" class="close" type="button" onclick="pause(videoku<?php echo $row->id; ?>)">×</button>
                                                                        <h3>Video</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <video width="480" id="videoku<?php echo $row->id; ?>" controls>
                                                                            <source src="<?php echo base_url().'video/'.$row->link ?>" type="video/mp4">
                                                                            Your browser does not support the video tag.
                                                                        </video>
                                                                        <?php echo $row->deskripsi?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>  
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>      

