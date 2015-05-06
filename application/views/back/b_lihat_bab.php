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
                                                    <?php  if ($this->session->userdata('role')==1||$this->session->userdata('role')==2): ?>
                                                        <th>Action</th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($bab->result() as $row):?>
                                                <tr>
                                                    <td><?php echo $row->namaBab ?></td>
                                                    <td><?php echo $row->namaPelajaran."-".$row->namaKelas ?></td>
                                                    <?php  if ($this->session->userdata('role')==1||$this->session->userdata('role')==2): ?>
                                                        <td><a class='btn btn-primary' href='<?php echo site_url()?>/guidance/bab/edit/<?php echo $row->id ?>'>Edit</a>
                                                        <a class='btn btn-danger' href='<?php echo site_url()?>/guidance/bab/hapus/<?php echo $row->id ?>'>Hapus</a></td>
                                                    <?php endif; ?>
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

      