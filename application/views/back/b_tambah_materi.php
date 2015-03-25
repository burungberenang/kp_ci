            <div id="content">
            <div id="content-header">
                <h1>Tambah Materi</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/guidance/home" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="<?php echo site_url(); ?>/guidance/materi/semua" class="tip-bottom">Materi</a>
                <a href="#" class="current">Tambah Materi</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                            <?php if ($this->session->flashdata('warning'))
                                {  echo $this->session->flashdata('warning'); }?>
                            <?php 
                                $temp=array();
                                if ($this->session->flashdata('isiform'))
                                {  
                                    $temp = $this->session->flashdata('isiform');
                                }
                            ?>
                            <div class="widget-content">
                                <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php if($temp) echo $temp['id']; else echo $idMateri->nextId; ?>"/>
                                    <div class="form-group">
                                        <label class="control-label">Kelas:</label>
                                        <div class="controls">
                                            <select name="kelas">
                                                <?php 
                                                    foreach ($pilihank as $value)
                                                    {
                                                        if($temp&&$value['id']==$temp['idKelas']) echo '<option selected value='.$value['id'].'>'.$value['nama'].'</option>';
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
                                                        if($temp&&$value['id']==$temp['idPelajaran']) echo '<option selected value='.$value['id'].'>'.$value['nama'].'</option>';
                                                        else echo '<option value='.$value['id'].'>'.$value['nama'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
                                        <a class="btn btn-default" href="<?php echo site_url().'/guidance/materi/semua'; ?>">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>