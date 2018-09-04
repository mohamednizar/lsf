<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>SLEAS Human Resources Management Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/plugins/bootstrap/css/bootstrap.min.css"?>" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link href="<?php echo base_url()."assets/css/main.css"?>" rel="stylesheet" type="text/css"/>
</head>
    
<body class="login">
    
    <div class="logo"><!-- BEGIN LOGO -->
        <h3>SLEAS HRM</h3>
    </div>  <!-- END LOGO -->

    <div class="content">   <!-- BEGIN LOGIN -->

	<?php echo form_open('login/login_user'); ?>

            <h3 class="form-title">Login to your account</h3>
            <div class="alert alert-danger hide">
                <button class="close" data-dismiss="alert"></button>
                <span>Enter any username and passowrd.</span>
            </div>

            <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fs-user-2"></i>
                        <input class="form-control" type="text" placeholder="Username" name="username" autofocus="autofocus" />
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fs-locked"></i>
                        <input class="form-control" type="password" placeholder="Password" name="password" />
                    </div>
                </div>
            </div>

            <div>
                <label class="checkbox">
                    <input type="checkbox" name="remember" value="1"/> Remember me
                </label>
                <button type="reset" class="btn btn-success pull-left">
                    <i class="fs-cancel-circle"></i> Clear
                </button>     
                <button type="submit" class="btn btn-success pull-right">
                    <i class="fs-checkmark-2"></i> Login
                </button>            
            </div>

        <?php echo form_close()?>
        </div>
    

