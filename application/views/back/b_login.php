<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login</title> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap-glyphicons.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/backend.login.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.css" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="container">
            <?php if ($this->session->flashdata('warning'))
                        {  echo $this->session->flashdata('warning'); }?>
            
            <div id="loginbox">            
<!--                <form id="loginform" action="<?php echo base_url(); ?>index.php/onestop/checkLogin" method="post">-->
                    <?php $attributes = array('id' => 'loginform'); 
                       echo form_open("guidance/checklogin",$attributes); ?>
                
                    <p>Enter username and password to continue.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input class="form-control" type="text" placeholder="Username" name="username" required/>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input class="form-control" type="password" placeholder="Password" name="password" required />
                    </div>
                    <hr />
                    <div class="form-actions">
                        <div class="pull-left">
                            &copy; 2014 - 2015<br />
                            A+ Learning Guidance Admin.
                        </div>
                        <div class="pull-right"><input type="submit" class="btn btn-default" value="Login" /></div>
                    </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    </body>
</html>