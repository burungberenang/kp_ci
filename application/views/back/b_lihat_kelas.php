            <div id="content">
            <div id="content-header">
                <h1>Lihat Kelas</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/guidance/home" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="current">Kelas</a>
            </div>
            <br/>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!--<a class="btn btn-info" href="<?php echo site_url(); ?>/guidance/kelas/tambah">Tambah Kelas</a>-->
                        <div class="widget-box">
                            <div class="widget-content nopadding">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>      
                                        <?php foreach ($kelas as $value): ?>
                                                <tr>
                                                    <td><?php echo $value['nama'];?></td>
                                                    <td>
                                                        <a class="btn btn-primary" href="<?php echo site_url().'/guidance/kelas/edit/'.$value['id'];?>">Edit</a> 
                                                        <a class="btn btn-danger" href="#">Delete</a>
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