            <div id="content">
            <div id="content-header">
                <h1>Edit Materi</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/guidance/home" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="<?php echo site_url(); ?>/guidance/materi/semua" class="tip-bottom">Materi</a>
                <a href="#" class="current">Edit Materi</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                            <?php if ($this->session->flashdata('warning'))
                                {  echo $this->session->flashdata('warning'); }?>
                            <div class="widget-content">
                                <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
                                    <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
                                    <div class="form-group">
                                        <label class="control-label">Kelas:</label>
                                        <div class="controls">
                                            <select name="kelas">
                                                <?php 
                                                    foreach ($pilihank as $value)
                                                    {
                                                        if($value['id']==$data['kelas']) echo '<option selected value='.$value['id'].'>'.$value['nama'].'</option>';
                                                        else echo '<option value='.$value['id'].'>'.$value['nama'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Pelajaran:</label>
                                        <div class="controls">
                                            <select name="pelajaran">
                                                <?php 
                                                    foreach ($pilihanp as $value)
                                                    {
                                                        if($value['id']==$data['pelajaran']) echo '<option selected value='.$value['id'].'>'.$value['nama'].'</option>';
                                                        else echo '<option value='.$value['id'].'>'.$value['nama'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
                                        <a href="<?php echo site_url(); ?>./guidance/materi/semua" class="btn btn-default">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>