<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title;?></title> 
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap-glyphicons.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/backend.main.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/backend.blue.css" type="text/css"/>
        
        
    </head>
    <body>
        <div id="header">
            <h1><a href="#">A+ Learning Guidance Administration</a></h1>    
            <a id="menu-trigger" href="#"><i class="glyphicon glyphicon-align-justify"></i></a> 
        </div>

        <div id="search">
            <input type="text" placeholder="Search here..."/><button type="submit" class="tip-right" title="Search"><i class="glyphicon glyphicon-search"></i></button>
        </div>
        <div id="user-nav">
            <ul class="btn-group">
                <li class="btn" ><a title="" href="#"><i class="glyphicon glyphicon-user"></i> <span class="text">Profile</span></a></li>
                <li class="btn dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="glyphicon glyphicon-envelope"></i> <span class="text">Messages</span> <span class="label label-danger">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">new message</a></li>
                        <li><a class="sInbox" title="" href="#">inbox</a></li>
                        <li><a class="sOutbox" title="" href="#">outbox</a></li>
                        <li><a class="sTrash" title="" href="#">trash</a></li>
                    </ul>
                </li>
                <li class="btn"><a title="" href="#"><i class="glyphicon glyphicon-cog"></i> <span class="text">Settings</span></a></li>
                <li class="btn"><a title="" href="<?php echo base_url(); ?>index.php/onestop/doLogout"><i class="glyphicon glyphicon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>

        <div id="sidebar">
            <!--<a href="#" class="hide"><i class="glyphicon glyphicon-home"></i> Dashboard</a>-->
            <ul>
                <li class="active"><a href="index.html"><i class="glyphicon glyphicon-home"></i> <span>Dashboard</span></a></li>
                <li class="submenu">
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Form elements</span> <span class="label">3</span></a>
                    <ul>
                        <li><a href="form-common.html">Common elements</a></li>
                        <li><a href="form-validation.html">Validation</a></li>
                        <li><a href="form-wizard.html">Wizard</a></li>
                    </ul>
                </li>
                <li><a href="buttons.html"><i class="glyphicon glyphicon-tint"></i> <span>Buttons &amp; icons</span></a></li>
                <li><a href="interface.html"><i class="glyphicon glyphicon-pencil"></i> <span>Interface elements</span></a></li>
                <li><a href="tables.html"><i class="glyphicon glyphicon-th"></i> <span>Tables</span></a></li>
                <li><a href="grid.html"><i class="glyphicon glyphicon-th-list"></i> <span>Grid Layout</span></a></li>
                <li class="submenu">
                    <a href="#"><i class="glyphicon glyphicon-file"></i> <span>Sample pages</span> <span class="label">4</span></a>
                    <ul>
                        <li><a href="invoice.html">Invoice</a></li>
                        <li><a href="chat.html">Support chat</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                    </ul>
                </li>
                <li>
                    <a href="charts.html"><i class="glyphicon glyphicon-signal"></i> <span>Charts &amp; graphs</span></a>
                </li>
                <li>
                    <a href="widgets.html"><i class="glyphicon glyphicon-inbox"></i> <span>Widgets</span></a>
                </li>
            </ul>

        </div>
        <div id="content">
            <div id="content-header">
                <h1><?php echo $title2;?></h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="current">Dashboard</a>
            </div>