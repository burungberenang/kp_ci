            <div id="content">
            <div id="content-header">
                <h1>Tambah Paket</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/guidance/home" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="<?php echo site_url(); ?>/guidance/paket/semua" class="tip-bottom">Paket</a>
                <a href="#" class="current">Tambah Paket</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                            <?php if ($this->session->flashdata('warning'))
                                {  echo $this->session->flashdata('warning'); }?>
                            <div class="widget-content">
                                <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
                                    <div class="form-group">
                                        <label class="control-label">Nama:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Nama" name="nama"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Materi:</label>
                                        <div class="controls">
                                            <select multiple class="forn-control" name="materi">
                                                <?php 
                                                    foreach ($pilihan as $value)
                                                    echo '<option value='.$value['id'].'>'.$value['pelajaran'].' '.$value['kelas'].'</option>'; 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Harga:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Harga" name="nominal"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Masa berlaku (bulan):</label>
                                        <div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Masa berlaku" name="masa"/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
                                        <input type="submit" class="btn btn-default" name="kembali" value="Kembali" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>