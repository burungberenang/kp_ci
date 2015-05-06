            <div id="content">
            <div id="content-header">
                <h1>Ganti Password</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/guidance/home" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="<?php echo site_url(); ?>/guidance/profile" class="tip-bottom">Profile</a>
                <a href="#" class="current">Ganti Password</a>
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
                                        <label class="control-label">Password Lama:</label>
                                        <div class="controls">
                                            <input type="password" class="form-control input-small" placeholder="Password Lama" name="lama"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password Baru:</label>
                                        <div class="controls">
                                            <input type="password" class="form-control input-small" placeholder="Password Baru" name="baru"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Ulangi Password Baru:</label>
                                        <div class="controls">
                                            <input type="password" class="form-control input-small" placeholder="Ulangi Password Baru" name="ulangi"/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
                                        <a href="<?php echo site_url(); ?>./guidance/profile" class="btn btn-default">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>