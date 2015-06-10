<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide" src="<?php base_url() ?>asset/images/1.jpg" alt="First slide">
            </div>
            <div class="item">
                <img class="second-slide" src="<?php base_url() ?>asset/images/2.jpg" alt="Second slide">
            </div>
            <div class="item">
                <img class="third-slide" src="<?php base_url() ?>asset/images/3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- /.carousel -->
        
    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Paket terlaris</h2>
          <ol style="text-align: left">
            <?php foreach ($produk as $value): ?>
              <li><h4><?php echo $value['materi2'].' '.$value['materi1']; ?></h4></li>
              <p><?php echo $value['nama']?></p>
            <?php endforeach; ?>
          </ol>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <h2>Cara pembelian</h2>
          <ol style="text-align: left">
              <li><p>Daftar/Masuk terlebih dahulu</p></li>
              <li><p>Pilih <a href="<?php echo site_url(); ?>/materi/beli">Beli Materi</a></p></li>
              <li><p>Klik "Tambahkan" pada paket yang diinginkan</p></li>
              <li><p>Setelah selesai, masuk ke <a href="<?php echo site_url(); ?>/materi/cart">Shopping Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></p></li>
              <li><p>Klik tombol "Checkout" pada shopping cart</p></li>
              <li><p>Pada halaman Checkout, klik tombol "Ok". Setelah itu lakukan transfer seperti yang diminta dan scan/foto/screenshot bukti transfer</p></li>
              <li><p>Pesanan akan masuk ke halaman <a href="<?php echo site_url(); ?>/materi/bayar">Konfirmasi</a></p></li>
              <li><p>Klik tombol "Bayar" pada pesanan yang mau dibayarkan</p></li>
              <li><p>Upload file bukti transfer pada halaman tersebut</p></li>
              <li><p>Tunggu konfirmasi dari admin</p></li>
              <li><p>Jika sudah terkonfirmasi, dapat melihat paket di menu <a href="<?php echo site_url(); ?>/materiku">Materiku</a></p></li>
          </ol>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <h2>Hubungi kami</h2>
            <?php if(validation_errors()) echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>'; ?>

            <?php if ($this->session->flashdata('warning'))
              {  echo $this->session->flashdata('warning'); }?>
            <form action="<?php echo site_url(); ?>/contact" class="form-horizontal" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Pesan</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="pesan" placeholder="Pesan" required></textarea>
                    </div>
                </div>
                <input type="submit" name="submit" value="Kirim" class="btn btn-primary">
            </form>
        </div><!-- /.col-lg-4 -->
      </div>
    </div>
</div>
