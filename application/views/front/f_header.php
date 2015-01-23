<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title;?></title> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/carousel.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/style.css" type="text/css"/>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
                

    <body>
            
    <div class="container-fluid">
        <div class="row">
            <!--navigasi-->
                <div class="navigasi-shadow"></div>
                <div class="navigasi col-md-offset-1 col-md-10 col-xs-6 col-sm-6">
                    <nav class="navbar " role="navigation">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/info">Informasi</a></li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Materi <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                  <li><a href="<?php echo base_url(); ?>index.php/front/materi/1">SMP Kelas VII</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/front/materi/2">SMP Kelas VIII</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/front/materi/3">SMP Kelas IX</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>index.php/front/materi/4">SMA Kelas X</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/front/materi/5">SMA Kelas XI</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/front/materi/6">SMA Kelas XII</a></li>
                              </ul>
                            </li>
                        </ul>
                          
                          <ul class="nav navbar-nav navbar-right">
                            <!--<?php //if($this->session->userdata('userf')){ ?>
                                <li><a href="<?php// echo base_url(); ?>index.php/keluar">Keluar</a></li>
                            <?php //}//else{ ?>-->
                                <li><a href="<?php echo base_url(); ?>index.php/daftar">Daftar</a></li><li><a href="<?php echo base_url(); ?>index.php/masuk">Masuk</a></li>
                            <?php //} ?>
                            <li>
                            	<form class="navbar-form navbar-right" role="search">
	                            <div class="form-group">
	                              <input type="text" class="form-control" placeholder="Search">
	                            </div>
	                            <button type="submit" class="btn btn-default">Submit</button>
                           		</form>
                       		</li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>