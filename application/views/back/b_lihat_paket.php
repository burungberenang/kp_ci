            <div id="content">
            <div id="content-header">
                <h1>Lihat Paket</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/guidance/home" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="current">Paket</a>
            </div>
            <br/>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!--<a class="btn btn-info" href="<?php echo site_url(); ?>/guidance/paket/tambah">Tambah Paket</a>-->
                        <div class="widget-box">
                            <div class="widget-content nopadding">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Materi</th>
                                            <th>Harga</th>
                                            <th>Masa Berlaku</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>      
                                        <?php foreach ($paket as $value): ?>
                                                <tr>
                                                        <td><?php echo $value['nama'];?></td>
                                                        <td><?php echo $value['materi'].' '.$value['materi1'];?></td>
                                                        <td><?php echo $value['nominal'];?></td>
                                                        <td><?php echo $value['masaBerlaku'];?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="<?php echo site_url().'/guidance/paket/edit/'.$value['id']?>">Edit</a>
                                                            <a href="#myModal<?php echo $value['id']; ?>" data-toggle="modal" class="btn btn-danger">Delete</a>
                                                            <!-- MODAL -->
                                                            <div id="myModal<?php echo $value['id']; ?>" class="modal fade">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button data-dismiss="modal" class="close" type="button">×</button>
                                                                            <h3>Anda yakin untuk menghapus data?</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post" action="<?php echo current_url(); ?>">
                                                                                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                                                                <input class="btn btn-success" name="hapus" type="submit" value="Ya">
                                                                                <input class="btn btn-danger" type="submit" value="Tidak">
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