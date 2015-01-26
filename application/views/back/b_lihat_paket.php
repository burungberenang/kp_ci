            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="<?php echo current_url(); ?>" method="post">
                            <div class="input-group">
                                <label>Nama: </label>
                                <input class="form-control" type="text" placeholder="Nama" name="nama">
                            </div>
                            <div class="input-group">
                                <label>Materi: </label>
                                <select class="form-control" name="materi">
                                    <?php 
                                        foreach ($pilihan as $value)
                                        echo '<option value='.$value['id'].'>'.$value['pelajaran'].' '.$value['kelas'].'</option>'; 
                                    ?>
                                </select>
                            </div>
                            <div class="input-group">
                                <label>Harga: </label>
                                <input class="form-control" type="text" placeholder="Harga" name="nominal">
                            </div>
                            <div class="input-group">
                                <label>Masa berlaku (bulan): </label>
                                <input class="form-control" type="text" placeholder="Masa berlaku" name="masa">
                            </div>
                            <div class="input-group">
                                <input type="submit" class="btn btn-default" name="simpan" value="Simpan" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>