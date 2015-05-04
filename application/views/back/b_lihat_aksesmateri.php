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
                                                
                                                    <?php
                                                        if ($materi){
                                                            foreach($materi->result() as $row){
                                                                echo " <tr><td>".$row->namaKaryawan."</td>"
                                                                        . " <td>".$row->namaPelajaran."-".$row->namaKelas."</td>"
                                                                        . " <td><a href='".site_url()."/guidance/aksesmateri/edit/".$row->idKaryawan."/".$row->idMateri."'>Edit</a>"
                                                                        . " <a href='".site_url()."/guidance/aksesmateri/hapus/".$row->idKaryawan."/".$row->idMateri."'>Hapus</a></td></tr>";
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

      