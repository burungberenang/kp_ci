
                <div class="container">

                    <div class="row">
                        
                        <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                            
                            <div class="row">
                                <h2 class="text-center">Upload Bukti Bayar Materi</h2>
                                <?php if ($this->session->flashdata('warning'))
                                    {  echo $this->session->flashdata('warning'); }?>
                                <div class="widget-content">
                                    <img width="20%" src="<?php echo base_url(); ?>asset/transaksi/<?php echo $foto; ?>" alt=" " >
                                    <?php $attributes = array('class' => 'form-horizontal'); 
                                    echo form_open_multipart('materi/bayar/'.$idPaket, $attributes); ?>
                                        <div class="form-group">
                                            <label class="control-label">Upload bukti transfer:</label>
                                            <div class="controls">
                                                <input type="file" class="input-sm" name="foto" required/>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
                                            <a href="<?php echo site_url(); ?>/materi/bayar" class="btn btn-default">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

