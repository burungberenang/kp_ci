            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                            <div class="widget-content">
                                <form action="<?php echo current_url(); ?>" method="post">
                                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                                    <div class="input-group">
                                        <label>Nama: </label>
                                        <input class="form-control" type="text" placeholder="Nama" value="<?php echo $nama; ?>" name="nama">
                                    </div>
                                    <div class="input-group">
                                        <label>Materi: </label>
                                        <select class="form-control" name="materi">
                                            <?php 
                                                foreach ($pilihan as $value)
                                                {
                                                    $temp='';
                                                    if($value['id']==$idMateri) $temp='selected';
                                                    echo '<option '.$temp.' value='.$value['id'].'>'.$value['pelajaran'].' '.$value['kelas'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label>Harga: </label>
                                        <input class="form-control" type="text" placeholder="Harga" value="<?php echo $nominal; ?>" name="nominal">
                                    </div>
                                    <div class="input-group">
                                        <label>Masa berlaku (bulan): </label>
                                        <input class="form-control" type="text" placeholder="Masa berlaku" value="<?php echo $masaBerlaku; ?>" name="masa">
                                    </div>
                                    <div class="input-group">
                                        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
                                        <input type="submit" class="btn btn-default" name="kembali" value="Kembali" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>