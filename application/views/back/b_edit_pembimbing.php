<div id="content">
    <div id="content-header">
        <h1>Edit Pembimbing</h1>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
        <a href="#" class="tip-bottom">Pembimbing</a>
        <a href="#" class="current">Edit Pembimbing</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="widget-box">
                    <?php if ($this->session->flashdata('warning')) {
                        echo $this->session->flashdata('warning');
                    }
                    ?>

                    <div class="widget-content">
<?php $attributes = array('class' => 'form-horizontal');
echo form_open_multipart("guidance/pembimbing/checkedit", $attributes);
?>

                        <div class="form-group">
                            <div class="controls">
                                <input type="hidden" name="idPembimbing" value="<?php echo $pembimbing->id; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <div class="controls">
                                <label><?php echo $pembimbing->username?></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" class="form-control input-small" placeholder="Password baru" name="password" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Ulangi Password</label>
                            <div class="controls">
                                <input type="password" class="form-control input-small" placeholder="Ulang Password baru" name="confpass" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">No. KTP</label>
                            <div class="controls">
                                <textarea class="form-control" name="noKTP"><?php echo $pembimbing->noKTP; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <div class="controls">
                                <textarea class="form-control" name="nama"><?php echo $pembimbing->nama; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <div class="controls">
                                <textarea class="form-control" name="alamat"><?php echo $pembimbing->alamat; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <div class="controls">
                                <textarea class="form-control" name="tglLahir"><?php echo $pembimbing->tglLahir; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Jabatan</label>
                            <div class="controls">
                                <select name="jabatan" required>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Editor">Editor</option>
                                    <option value="Pembimbing">Pembimbing</option>    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Ganti Foto</label>
                            <div class="controls">
                                <label><input type="radio" name="editfoto" value ="true"/>Ya</label>
                                <label><input type="radio" name="editfoto" value ="false" checked/>Tidak</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Link Foto</label>
                            <div class="controls">
                                <input type="file" class="form-control input-small" name="link" />
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="submit" class="btn btn-primary btn-small" value="Simpan"> atau <a class="text-danger" href="<?php echo site_url() . "/guidance/home" ?>">Kembali</a>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

