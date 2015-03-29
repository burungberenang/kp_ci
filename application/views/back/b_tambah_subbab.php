            <div id="content">
            <div id="content-header">
                <h1>Tambah Sub-Bab</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Sub-Bab</a>
                <a href="#" class="current">Tambah Sub-Bab</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                            <?php if ($this->session->flashdata('warning'))
                                {  echo $this->session->flashdata('warning'); }?>
                                
                            <div class="widget-content">
                                <?php $attributes = array('class' => 'form-horizontal'); 
                                    echo form_open("guidance/subbab/checktambah",$attributes); ?>
                                
                                    <div class="form-group">
					<label class="control-label">Nama</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Nama Bab" name="nama" required/>
					</div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">Link</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Link" name="link" required/>
					</div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">Deskripsi</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Deskripsi" name="deskripsi" required/>
					</div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">ID Bab</label>
					<div class="controls">
                                            <select name="idBab" required>
                                            <?php
                                                if ($bab){
                                                    foreach($bab->result() as $row){
                                                        echo "<option value='".$row->id."'>".$row->nama."</option>";
                                                    }
                                                }
                                            ?>
                                            </select>
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

      