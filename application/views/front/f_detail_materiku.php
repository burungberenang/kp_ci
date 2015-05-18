            <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                <h2 class="text-center">Pelajaran <?php echo $datamateri->namaPelajaran." ".$datamateri->namaKelas; ?></h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 col-xs-12 col-sm-12 col-md-offset-1">
                            <div class="widget-box">
                                <div class="widget-content nopadding">
                                        <table class="table table-bordered table-striped table-hover data-table">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-6">Bab</th>
                                                    <th class="col-md-6">Action</th>       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($databab->result() as $row):?>
                                                <tr>
                                                    <td class="col-md-6"><?php echo $row->namaBab; ?></td>
                                                    <td class="col-md-6"><a class='btn btn-primary' href='<?php echo site_url(); ?>/materiku/bab/<?php echo $row->idBab ?>'>Lihat</a>
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

