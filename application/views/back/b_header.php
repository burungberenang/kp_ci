<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title;?></title> 
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap-glyphicons.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/backend.blue.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/select2.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/backend.main.css" type="text/css"/>
        
        <style>
            .modal-backdrop {
                z-index: 0;
            }
        </style>
        
    </head>
    <body>
        <div id="header">
            <h1><a href="#">A+ Learning Guidance Administration</a></h1>    
            <a id="menu-trigger" href="#"><i class="glyphicon glyphicon-align-justify"></i></a> 
        </div>

<!--        <div id="search">
            <input type="text" placeholder="Search here..."/><button type="submit" class="tip-right" title="Search"><i class="glyphicon glyphicon-search"></i></button>
        </div>-->
        <div id="user-nav">
            <ul class="btn-group">
                <li class="btn" ><a title="" href="<?php echo site_url(); ?>/guidance/profile"><i class="glyphicon glyphicon-user"></i> <span class="text">Profile</span></a></li>
<!--                <li class="btn dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="glyphicon glyphicon-envelope"></i> <span class="text">Messages</span> <span class="label label-danger">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">new message</a></li>
                        <li><a class="sInbox" title="" href="#">inbox</a></li>
                        <li><a class="sOutbox" title="" href="#">outbox</a></li>
                        <li><a class="sTrash" title="" href="#">trash</a></li>
                    </ul>
                </li>
                <li class="btn"><a title="" href="#"><i class="glyphicon glyphicon-cog"></i> <span class="text">Settings</span></a></li>-->
                <li class="btn"><a title="" href="<?php echo base_url(); ?>index.php/guidance/logout"><i class="glyphicon glyphicon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>

        <div id="sidebar">
            <ul>
                <li <?php if ($this->session->flashdata('home')) { echo "class='active'"; }?>><a href="<?php echo base_url(); ?>index.php/guidance/home"><i class="glyphicon glyphicon-home"></i> <span>Dasbor</span></a></li>
                <li class="submenu">
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Materi</span><span class="caret"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/materi/semua">Lihat Materi</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/materi/tambah">Tambah Materi</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/kelas/semua">Lihat Kelas</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/kelas/tambah">Tambah Kelas</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/pelajaran/semua">Lihat Pelajaran</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/pelajaran/tambah">Tambah Pelajaran</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/bab/semua">Lihat Bab</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/bab/tambah">Tambah Bab</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/subbab/semua">Lihat Subbab</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/subbab/tambah">Tambah Subbab</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/aksesmateri/semua">Lihat Akses Materi</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/aksesmateri/tambah">Tambah Akses Materi</a></li>
                    </ul>
                </li>
                <li class="submenu" <?php if ($this->session->flashdata('paket')) { echo "class='active'"; }?>>
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Paket</span><span class="caret"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/paket/semua">Lihat Paket</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/paket/tambah">Tambah Paket</a></li>
                    </ul>
                </li>
                <li class="submenu" <?php if ($this->session->flashdata('pembimbing')) { echo "class='active'"; }?>>
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Pembimbing</span><span class="caret"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/pembimbing/semua">Lihat Pembimbing</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/pembimbing/tambah">Tambah Pembimbing</a></li>
                    </ul>
                </li>
                <li <?php if ($this->session->flashdata('transaksi')) { echo "class='active'"; }?>><a href="<?php echo base_url(); ?>index.php/guidance/transaksi"><i class="glyphicon glyphicon-tint"></i> <span>Transaksi</span></a></li>
            </ul>

        </div>
            