<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title; ?></title> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/carousel.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/frontend.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/shop-homepage.css" type="text/css"/>
            
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>asset/images/logohome.png"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/info">Informasi</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Materi<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url(); ?>index.php/materi/1">SMP Kelas VII</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/materi/2">SMP Kelas VIII</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/materi/3">SMP Kelas IX</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>index.php/materi/4">SMA Kelas X</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/materi/5">SMA Kelas XI</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/materi/6">SMA Kelas XII</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->session->userdata('role') != '4'):  // session member?>
                    
                        <li><a href="<?php echo site_url(); ?>/daftar">Daftar</a></li>
                        <li><a href="<?php echo site_url(); ?>/masuk">Masuk</a></li>
                        
                    <?php else : ?>
                        
                        <li><a href="<?php echo site_url(); ?>/materi/cart"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                        <li><a href="<?php echo site_url(); ?>/materiku">Materiku</a></li>
                        <li><a href="<?php echo site_url(); ?>/materi/beli">Beli Materi</a></li>
                        <li><a href="<?php echo site_url(); ?>/materi/bayar">Konfirmasi</a></li>
                        <li><a href="<?php echo site_url()."/logout" ?>">Keluar</a></li>
                        
                    <?php endif; ?>
                        <li>
                            <form class="navbar-form navbar-right" role="search" action="<?php echo site_url(); ?>/cari" method="get">
                                <div class="form-group">
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Materi">
                                </div>
                                <button type="submit" class="btn btn-default">Cari</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
