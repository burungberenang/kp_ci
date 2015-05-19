            <div id="content">
            <div id="content-header">
                <h1>Lihat Histori Transaksi</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/guidance/home" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="current">Histori Transaksi</a>
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
                                            <th>Tanggal</th>
                                            <th>Gambar</th>
                                            <th>Tanggal Non Aktif</th>
                                            <th>Member</th>
                                            <th>Paket</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($histori as $value): ?>
                                            <tr>
                                                <td><?php echo $value['tanggal'];?></td>
                                                <td><img width="40%" src ="<?php echo base_url().'asset/transaksi/'.$value['gambar'];?>"/></td>
                                                <td><?php echo $value['tanggalNonAktif'];?></td>
                                                <td><?php echo $value['member'];?></td>
                                                <td><?php echo $value['paket'];?></td>
                                                <td><?php if($value['status']==0) echo 'Belum bayar'; else echo 'Lunas'; ?>
                                                    <a href="#myModal<?php echo $value['id']; ?>" data-toggle="modal" class="btn btn-link btn-xs">Ubah Status</a>
                                                    <!-- MODAL -->
                                                    <div id="myModal<?php echo $value['id']; ?>" class="modal fade">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                                                    <h3>Anda yakin untuk mengubah data?</h3>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" action="<?php echo current_url(); ?>">
                                                                        <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                                                        <input class="btn btn-success" name="ubah" type="submit" value="Ya">
                                                                        <input class="btn btn-danger" type="submit" value="Tidak">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--hapus paket pake jquery aja-->
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