
            <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 konten" style="padding:20px;">
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>/">
                  <?php if(validation_errors()) echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>'; ?>
				  <?php if(isset($sukses)) echo '<div class="alert alert-success" role="alert">Pendaftaran telah berhasil dilakukan</div>'; ?>
				  
                                <?php $attributes = array('class' => 'form-horizontal'); 
                                echo form_open("daftar/tambahuser",$attributes); ?>
                                  <div class="form-group">
				    <label class="col-sm-2 control-label">Nama Lengkap</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" name="email" placeholder="Email" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Username</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="user" placeholder="Username" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" name="password" placeholder="Password" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Ulangi Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" name="repassword" placeholder="Ulangi Password" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <input type="submit" class="btn btn-default" name="daftar" value="Daftar" />
				    </div>
				  </div>
				</form>
            </div>
        </div>
