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
                                        <?php 
                                            foreach ($paket as $value)
                                                echo '<tr>'
                                                        . '<td>'.$value['nama'].'</td>'
                                                        . '<td>'.$value['materi'].' '.$value['materi1'].'</td>'
                                                        . '<td>'.$value['nominal'].'</td>'
                                                        . '<td>'.$value['masaBerlaku'].'</td>'
                                                        . '<td>'
                                                            . '<a class="btn btn-primary" href="'.site_url().'/guidance/paket/edit/'.$value['id'].'">Edit</a> '
                                                            . '<a class="btn btn-danger" href="#">Delete</a> '
                                                        . '</td>'
                                                    . '</tr>'; 
                                            //hapus paket pake jquery aja
                                        ?>
                                    </tbody>
                                </table>							
                            </div>
                        </div>
                    </div>
                </div>
            </div>