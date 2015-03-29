            <div id="content">
            <div id="content-header">
                <h1>Lihat Sub-Bab</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Sub-Bab</a>
                <a href="#" class="current">Lihat Sub-Bab</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                                <div class="widget-content nopadding">
                                        <table class="table table-bordered table-striped table-hover data-table">
                                            <thead>
                                                <tr>
                                                    <th>Nama Bab</th>
                                                    <th>Nama Sub-Bab</th>
                                                    <th>Link</th>
                                                    <th>Deskripsi</th>
                                                    <th>Action</th>       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                        if ($subbab){
                                                            foreach($subbab->result() as $row){
                                                                echo " <tr><td>".$row->namaBab."</td>"
                                                                        . " <td>".$row->namaSubbab."</td>"
                                                                        . " <td>".$row->link."</td>"
                                                                        . " <td>".$row->deskripsi."</td>"
                                                                        . " <td><a href='".base_url()."/subbab/edit/".$row->id."'>Edit</a>"
                                                                        . " <a href='".base_url()."/subbab/hapus/".$row->id."'>Hapus</a></td>"
                                                                        . " </tr>";
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

      