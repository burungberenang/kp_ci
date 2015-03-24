            <div id="content">
            <div id="content-header">
                <h1>Tambah Pembimbing</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Pembimbing</a>
                <a href="#" class="current">Tambah Pembimbing</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
<!--                                <div class="widget-title">
                                        <span class="icon">
                                                <i class="glyphicon glyphicon-th"></i>
                                        </span>
                                        <h5>Dynamic table</h5>
                                </div>-->
                                <div class="widget-content nopadding">
                                        <table class="table table-bordered table-striped table-hover data-table">
                                            <thead>
                                                <tr>
                                                    <th>Foto</th>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>Action</th>       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                        if ($karyawan){
                                                            foreach($karyawan->result() as $row){
                                                                echo " <tr><td><img src='".base_url()."foto/".$row->foto."'></td>"
                                                                        . " <td>".$row->nama."</td>"
                                                                        . " <td>".$row->jabatan."</td><td>Edit</td></tr>";
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

      