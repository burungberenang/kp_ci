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
                            <?php $datalama = $this->session->flashdata('datalama'); 
                            if ($this->session->flashdata('warning'))
                                {  echo $this->session->flashdata('warning');
                                 }?>
                                
                            <div class="widget-content">
                                <?php $attributes = array('class' => 'form-horizontal'); 
                                    echo form_open_multipart("guidance/pembimbing/checktambah",$attributes); ?>
                                
                                    <div class="form-group">
					<label class="control-label">Username</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Username" name="username" value="<?php if ($datalama['username']) echo $datalama['username']; ?>" required/>
					</div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">Password</label>
					<div class="controls">
                                            <input type="password" class="form-control input-small" placeholder="Password" name="password" required/>
					</div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">Ulangi Password</label>
					<div class="controls">
                                            <input type="password" class="form-control input-small" placeholder="Ulang Password" name="confpass" required/>
					</div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">Nomor KTP</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Nomor KTP" name="noKTP" value="<?php if ($datalama['noKTP']) echo $datalama['noKTP']; ?>" required/>
					</div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">Nama</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Nama" name="nama" value="<?php if ($datalama['nama']) echo $datalama['nama']; ?>" required/>
					</div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">Alamat</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Alamat" name="alamat" value="<?php if ($datalama['alamat']) echo $datalama['alamat']; ?>" required/>
					</div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">Tanggal Lahir</label>
					<div class="controls">
                                            <input type="date" class="form-control input-small" placeholder="Tanggal Lahir" name="tglLahir" value="<?php if ($datalama['tglLahir']) echo $datalama['tglLahir']; ?>" required/>
					</div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">Jabatan</label>
                                            <div class="controls">
						<select name="jabatan">
                                                    <option value="Administrator" <?php if ($datalama['jabatan'] == "Administrator") echo 'checked';  ?>>Administrator</option>
                                                    <option value="Editor" <?php if ($datalama['jabatan'] == "Editor") echo 'checked';  ?>>Editor</option>
                                                    <option value="Pembimbing" <?php if ($datalama['jabatan'] == "Pembimbing") echo 'checked';  ?>>Pembimbing</option>
						</select>
                                            </div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">Link Foto</label>
					<div class="controls">
                                            <input type="file" class="form-control input-small" name="link" required/>
					</div>
                                    </div>
                                    
                                    <div class="form-actions">
					<input type="submit" class="btn btn-primary btn-small" value="Simpan"> atau <a class="text-danger" href="<?php echo site_url().'/guidance/pembimbing/semua'; ?>">Kembali</a>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

      