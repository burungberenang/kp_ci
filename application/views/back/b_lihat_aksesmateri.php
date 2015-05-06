            <div id="content">
            <div id="content-header">
                <h1>Lihat Hak Akses Materi</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Hak Akses Materi</a>
                <a href="#" class="current">Lihat Hak Akses Materi</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                                <div class="widget-content nopadding">
                                        <table class="table table-bordered table-striped table-hover data-table">
                                            <thead>
                                                <tr>
                                                    <th>Karyawan</th>
                                                    <th>Materi</th>
                                                    <th>Action</th>       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($materi->result() as $row):?>
                                                <tr>
                                                    <td><?php echo $row->namaKaryawan; ?></td>
                                                    <td><?php echo $row->namaPelajaran."-".$row->namaKelas; ?></td>
                                                    <td><a class='btn btn-primary' href='<?php echo site_url(); ?>/guidance/aksesmateri/edit/<?php echo $row->idKaryawan."/".$row->idMateri; ?>'>Edit</a>
                                                    <a href="#myModal<?php echo $row->idKaryawan.'-'.$row->idMateri; ?>" data-toggle="modal" class="btn btn-danger">Hapus</a>
                                                        <!-- MODAL -->
                                                        <div id="myModal<?php echo $row->idKaryawan.'-'.$row->idMateri; ?>" class="modal fade">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                                                        <h3>Anda yakin untuk menghapus data?</h3><br>
                                                                        <h3><strong>PERHATIAN: Data yang berhubungan akan juga terhapus!</strong></h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" action="<?php echo site_url(); ?>/guidance/aksesmateri/hapus/<?php echo $row->idKaryawan."/".$row->idMateri; ?>">
                                                                            <input class="btn btn-success" name="hapus" type="submit" value="Ya">
                                                                            <button data-dismiss="modal" class="btn btn-danger" type="button">Tidak</button>
                                                                        </form>
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

      