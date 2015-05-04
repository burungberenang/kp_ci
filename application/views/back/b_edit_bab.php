            <div id="content">
            <div id="content-header">
                <h1>Edit Bab</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Bab</a>
                <a href="#" class="current">Edit Bab</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                            <?php if ($this->session->flashdata('warning'))
                                {  echo $this->session->flashdata('warning'); }?>
                                
                            <div class="widget-content">
                                <?php $attributes = array('class' => 'form-horizontal'); 
                                    echo form_open("guidance/bab/checkedit",$attributes); ?>
                                
                                    <div class="form-group">
					<div class="controls">
                                            <input type="hidden" name="idBab" value="<?php echo $bab->id; ?>"></input>
					</div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">Nama</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Nama Bab" name="nama" value="<?php echo $bab->nama; ?>" required/>
					</div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">ID Materi</label>
					<div class="controls">
                                            <select name="idMateri" required>
                                            <?php
                                                if ($materi){
                                                    foreach($materi->result() as $row){
                                                        if ($bab->idMateri == $row->idMateri){
                                                            echo "<option value='".$row->idMateri."' selected>".$row->namaPelajaran."-".$row->namaKelas."</option>";
                                                        }
                                                        else{
                                                            echo "<option value='".$row->idMateri."'>".$row->namaPelajaran."-".$row->namaKelas."</option>";
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

      