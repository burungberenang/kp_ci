
            <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                <h2 class="text-center">Daftar Materiku</h2>
                <p class="text-center">Halo, <?php echo$dataku->nama; ?>. Ini daftar materi yang sudah kamu beli.</p>
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-xs-12 col-sm-12 col-md-offset-1">
                        <div class="widget-box">
                                <div class="widget-content nopadding">
                                        <table class="table table-bordered table-striped table-hover data-table">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-6">Pelajaran</th>
                                                    <th class="col-md-6">Action</th>       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($datamateri->result() as $row):?>
                                                <tr>
                                                    <td class="col-md-6"><?php echo $row->namaPelajaran." ".$row->namaKelas ?></td>
                                                    <td class="col-md-6"><a class='btn btn-primary' href='<?php echo site_url(); ?>/materiku/lihat/<?php echo $row->idMateri ?>'>Lihat</a>
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