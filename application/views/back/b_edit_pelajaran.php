            <div id="content">
            <div id="content-header">
                <h1>Edit Pelajaran</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/guidance/home" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="<?php echo site_url(); ?>/guidance/pelajaran/semua" class="tip-bottom">Pelajaran</a>
                <a href="#" class="current">Edit Pelajaran</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                            <?php if ($this->session->flashdata('warning'))
                                {  echo $this->session->flashdata('warning'); }?>
                            <div class="widget-content">
                                <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
                                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                                    <div class="form-group">
                                        <label class="control-label">Nama:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Nama" value="<?php echo $nama; ?>" name="nama"/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
                                        <a href="<?php echo site_url(); ?>./guidance/pelajaran/semua" class="btn btn-default">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>