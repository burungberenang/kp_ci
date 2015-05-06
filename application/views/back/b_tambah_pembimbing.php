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
                            <?php if ($this->session->flashdata('warning'))
                                {  echo $this->session->flashdata('warning'); }?>
                                
                            <div class="widget-content">
                                <?php $attributes = array('class' => 'form-horizontal'); 
                                    echo form_open_multipart("guidance/pembimbing/checktambah",$attributes); ?>
                                
                                    <div class="form-group">
					<label class="control-label">Username</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Username" name="username" required/>
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
                                            <input type="text" class="form-control input-small" placeholder="Nomor KTP" name="noKTP" required/>
					</div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">Nama</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Nama" name="nama" required/>
					</div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">Alamat</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Alamat" name="alamat" required/>
					</div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">Tanggal Lahir</label>
					<div class="controls">
                                            <input type="date" class="form-control input-small" placeholder="Tanggal Lahir" name="tglLahir" required/>
					</div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">Jabatan</label>
                                            <div class="controls">
						<select name="jabatan">
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Editor">Editor</option>
                                                    <option value="Pembimbing">Pembimbing</option>
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
					<input type="submit" class="btn btn-primary btn-small" value="Simpan"> atau <a class="text-danger" href="#">Kembali</a>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

      