
            <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten">
                <?php $attributes = array('style' => 'width:50%; margin:auto; margin-top:50px; padding:auto;'); 
                       echo form_open("member/login",$attributes); ?>
                
                <?php if ($this->session->flashdata('warning'))
                        {  echo $this->session->flashdata('warning'); }?>
                
                <!--<form action="<?php //echo base_url(); ?>index.php/member/login" method="post" style="width:50%; margin:auto; margin-top:50px; padding:auto;">-->
                   <div class="input-group" style="margin:15px;">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input class="form-control"  type="text" placeholder="Username" name="username" required>
                  </div>
                  <div class="input-group" style="margin:15px;">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      <input class="form-control" type="password" placeholder="Password" name="password" required>
                  </div>
                  <div style="margin:5px;"><a href="<?php echo base_url(); ?>index.php/home/register">Belum memiliki akun? Silahkan daftar terlebih dahulu.</a></div>
                  <div class="pull-right"><input type="submit" class="btn btn-default" value="Masuk" /></div>
                </form>
            </div>
        </div>
