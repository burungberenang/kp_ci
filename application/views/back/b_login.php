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
            <div id="loginbox">            
                <form id="loginform" action="<?php echo base_url(); ?>index.php/onestop/checkLogin" method="post">
                    <p>Enter username and password to continue.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input class="form-control" type="text" placeholder="Username" name="username"/>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input class="form-control" type="password" placeholder="Password" name="password" />
                    </div>
                    <hr />
                    <div class="form-actions">
                        <div class="pull-left">
                            <a href="#" class="flip-link to-recover">Lost password?</a><br />
                            <a href="#" class="flip-link to-register">Need account? Register here!</a>
                        </div>
                        <div class="pull-right"><input type="submit" class="btn btn-default" value="Login" /></div>
                    </div>
                </form>
                <form id="recoverform" action="#">
                    <p>Enter your e-mail address below and we will send you instructions how to recover a password.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input class="form-control" type="text" placeholder="E-mail address" />
                    </div>
                    <hr />
                    <div class="form-actions">
                        <div class="pull-left">
                            <a href="#" class="flip-link to-login">&laquo; Back to login</a><br />
                            <a href="#" class="flip-link to-register">Need account? Register here!</a>
                        </div>
                        <div class="pull-right"><input type="submit" class="btn btn-default" value="Recover" /></div>
                    </div>
                </form>
                <form id="registerform" action="#">
                    <p>Enter information required to register:</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input class="form-control" type="text" placeholder="Enter Username" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input class="form-control" type="password" placeholder="Choose Password" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input class="form-control" type="password" placeholder="Confirm password" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input class="form-control" type="text" placeholder="Enter E-mail address" />
                    </div>
                    <hr />
                    <div class="form-actions">
                        <div class="pull-left">
                            <a href="#" class="flip-link to-login">&laquo; Back to login</a><br />
                            <a href="#" class="flip-link to-recover">Lost password?</a>
                        </div>
                        <div class="pull-right"><input type="submit" class="btn btn-default" value="Register" /></div>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/backend.login.js"></script>
    </body>
</html>