            <div id="content">
            <div id="content-header">
                <h1>Lihat Bab</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Bab/a>
                <a href="#" class="current">Lihat Bab</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                                <div class="widget-content nopadding">
                                        <table class="table table-bordered table-striped table-hover data-table">
                                            <thead>
                                                <tr>
                                                    <th>Bab</th>
                                                    <th>Materi</th>
                                                    <?php  if ($this->session->userdata('role')==1||$this->session->userdata('role')==2): ?>
                                                        <th>Action</th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($bab->result() as $row):?>
                                                <tr>
                                                    <td><?php echo $row->namaBab ?></td>
                                                    <td><?php echo $row->namaPelajaran."-".$row->namaKelas ?></td>
                                                    <?php  if ($this->session->userdata('role')==1||$this->session->userdata('role')==2): ?>
                                                        <td><a class='btn btn-primary' href='<?php echo site_url()?>/guidance/bab/edit/<?php echo $row->id ?>'>Edit</a>
                                                        <a href="#mModal<?php echo $row->id ?>" data-toggle="modal" class="btn btn-danger">Hapus</a>
                                                        <!-- MODAL -->
                                                        <div id="mModal<?php echo $row->id ?>" class="modal fade">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                                                        <h3>Anda yakin untuk menghapus data?</h3><br>
                                                                        <h3><strong>PERHATIAN: Data yang berhubungan akan juga terhapus!</strong></h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" action="<?php echo site_url()?>/guidance/bab/hapus/<?php echo $row->id ?>">
                                                                            <input class="btn btn-success" name="hapus" type="submit" value="Ya">
                                                                            <button data-dismiss="modal" class="btn btn-danger" type="button">Tidak</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
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

      