            <div id="content">
            <div id="content-header">
                <h1>Lihat Sub-Bab</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Sub-Bab</a>
                <a href="#" class="current">Lihat Sub-Bab</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                                <div class="widget-content nopadding">
                                        <table class="table table-bordered table-striped table-hover data-table">
                                            <thead>
                                                <tr>
                                                    <th>Nama Bab</th>
                                                    <th>Nama Sub-Bab</th>
                                                    <th>Link</th>
                                                    <th>Deskripsi</th>
                                                    <?php  if ($this->session->userdata('role')==1||$this->session->userdata('role')==2): ?>
                                                    <th>Action</th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <script>
                                                    function pause(temp){
                                                        temp.pause();
                                                    }
                                                </script>
                                                <?php foreach($subbab->result() as $row):?>
                                                <tr>
                                                    <td><?php echo $row->namaBab ?></td>
                                                    <td><?php echo $row->namaSubbab ?></td>
                                                    <td>
                                                        <a href="#myModal<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-link"><?php echo $row->link ?></a>
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row->deskripsi?></td>
                                                    <?php  if ($this->session->userdata('role')==1||$this->session->userdata('role')==2): ?>
                                                        <td><a href='<?php echo site_url()?>/guidance/subbab/edit/<?php echo $row->id ?>'>Edit</a>
                                                        <a href='<?php echo site_url()?>/guidance/subbab/hapus/<?php echo $row->id ?>'>Hapus</a></td>
                                                    <?php endif; ?>
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

      