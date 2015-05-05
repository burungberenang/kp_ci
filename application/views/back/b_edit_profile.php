            <div id="content">
            <div id="content-header">
                <h1>Edit Profile</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/guidance/home" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="<?php echo site_url(); ?>/guidance/profile" class="tip-bottom">Profile</a>
                <a href="#" class="current">Edit Profile</a>
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
                                            <input type="text" class="form-control input-small" placeholder="Nama" value="<?php echo $user['nama']; ?>" name="nama"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">No KTP:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="No KTP" value="<?php echo $user['noKTP']; ?>" name="noktp"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Alamat:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Alamat" value="<?php echo $user['alamat']; ?>" name="alamat"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Lahir:</label>
                                        <div class="controls">
                                            <input type="date" value="<?php echo $user['tglLahir']; ?>" name="tgllahir"/>
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