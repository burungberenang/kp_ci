            <div id="content">
            <div id="content-header">
                <h1>Tambah Hak Akses Materi</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Hak Akses Materi</a>
                <a href="#" class="current">Tambah Hak Akses Materi</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                            <?php if ($this->session->flashdata('warning'))
                                {  echo $this->session->flashdata('warning'); }?>
                                
                            <div class="widget-content">
                                <?php $attributes = array('class' => 'form-horizontal'); 
                                    echo form_open("guidance/aksesmateri/checkedit",$attributes); ?>
                                
                                    <div class="form-group">
					<label class="control-label">Karyawan Lama</label>
					<div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Nama Bab" name="nama" value="<?php echo $karyawanlama->id.'-'.$karyawanlama->nama; ?>" required/>
					</div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label class="control-label">Materi Lama</label>
                                        <div class="controls">
                                            <textarea class="form-control">
                                                <?php
                                                    if ($materilama){
                                                    foreach($materilama->result() as $row){
                                                        echo $row->id."-".$row->pelajaran." ".$row->kelas."&#13;&#10;";
                                                    }
                                                }
                                                ?>
                                            </textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">Karyawan Baru</label>
					<div class="controls">
                                            <select name="idKaryawan" required>
                                            
                                            <?php
                                                if ($karyawan){
                                                    foreach($karyawan->result() as $row){
                                                        echo "<option value='".$row->id."'>".$row->nama."</option>";
                                                    }
                                                }
                                            ?>
                                            </select>
					</div>
                                    </div>
                                
                                    <div class="form-group">
					<label class="control-label">Materi Baru</label>
					<div class="controls">
                                            <select multiple class="forn-control" required>
                                            <?php
                                                if ($materi){
                                                    foreach($materi->result() as $row){
                                                        echo "<option value='".$row->idMateri."'>".$row->namaPelajaran."-".$row->namaKelas."</option>";
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

      