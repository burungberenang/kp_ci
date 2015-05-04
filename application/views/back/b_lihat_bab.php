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
                                                    <th>Action</th>       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                        if ($bab){
                                                            foreach($bab->result() as $row){
                                                                echo " <tr><td>".$row->namaBab."</td>"
                                                                        . " <td>".$row->namaPelajaran."-".$row->namaKelas."</td>"
                                                                        . " <td><a href='".site_url()."/guidance/bab/edit/".$row->id."'>Edit</a>"
                                                                        . " <a href='".site_url()."/guidance/bab/hapus/".$row->id."'>Hapus</a></td></tr>";
                                                            }
                                                        }
                                                    ?>

                                            </tbody>
                                        </table>  
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

      