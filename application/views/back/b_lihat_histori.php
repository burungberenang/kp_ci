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
                                        </tr>
                                    </thead>
                                    <tbody>      
                                        <?php foreach ($histori as $value): ?>
                                                <tr>
                                                    <td><?php echo $value['tanggal'];?></td>
                                                    <td><?php echo $value['gambar'];?></td>
                                                    <td><?php echo $value['tanggalNonAktif'];?></td>
                                                    <td><?php echo $value['member'];?></td>
                                                    <td><?php echo $value['paket'];?></td>
                                                </tr>
                                        <?php endforeach; ?>
                                        <!--hapus paket pake jquery aja-->
                                    </tbody>
                                </table>							
                            </div>
                        </div>
                    </div>
                </div>
            </div>