            <div id="content">
            <div id="content-header">
                <h1>Edit Sub-Bab</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Sub-Bab</a>
                <a href="#" class="current">Edit Sub-Bab</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                            <?php if ($this->session->flashdata('warning'))
                                {  echo $this->session->flashdata('warning'); }?>
                                
                            <div class="widget-content">
                                <?php $attributes = array('class' => 'form-horizontal'); 
                                    echo form_open("guidance/subbab/checkedit",$attributes); ?>
                                
                                    <div class="form-group">
					<div class="controls">
                                            <input type="hidden" name="idSubbab" value="<?php echo $subbab->id; ?>">
					</div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">Nama</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Nama Bab" name="nama" value="<?php echo $subbab->nama; ?>" required/>
					</div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">Link</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Link" name="link" value="<?php echo $subbab->link; ?>" required/>
					</div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label class="control-label">Deskripsi</label>
                                        <div class="controls">
                                            <textarea class="form-control" name="deskripsi"><?php echo $subbab->deskripsi; ?></textarea>
                                        </div>
                                    </div>

                                
                                    <div class="form-group">
					<label class="control-label">ID Bab</label>
					<div class="controls">
                                            <select name="idBab" required>
                                            <?php
                                                if ($bab){
                                                    foreach($bab->result() as $row){
                                                        if ($subbab->id == $row->id){
                                                            echo "<option value='".$row->id."' selected>".$row->nama."</option>";
                                                        }
                                                        else{
                                                            echo "<option value='".$row->id."'>".$row->nama."</option>";
                                                        }
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

      