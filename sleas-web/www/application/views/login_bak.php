<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>National Education Management Information System | Ministry of Education Sri Lanka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/plugins/bootstrap/css/bootstrap.min.css"?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/ems.css"?>" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link href="<?php echo base_url()."assets/css/main.css"?>" rel="stylesheet" type="text/css"/>
</head>
    
<body class="login">
    
<div class="wrapper"><!-- wrapper -->

    <div class="headerOutBox" style="background-color:#92495C;"><!-- #0191b5 headerOutBox -->
    <div class="header"><img src="<?php echo base_url()."assets/images/login/top-img.png"?>" width="980" height="150" alt="header"></div>
    </div><!-- headerOutBox End -->

    <div class="midOutBox"><!-- midOutBox -->
        <div class="midBox"><!-- midBox -->

        <div class="midLeftBox"><!-- midLeftBox -->

            <div class="proBox">
                <div class="proBoxTitel">Honorable Minister</div>
                <div class="proBoxImg"><img src="<?php echo base_url()."assets/images/login/akila.png"?>" width="210" height="110"></div>
                <div class="proBoxText">Akila Viraj Kariyawasam</div>
                <div class="proBoxText2">Hon. Minister of Education</div>
            </div>

            <div class="proBox">
            <div class="proBoxTitel">State Minister</div>
            <div class="proBoxImg"><img src="<?php echo base_url()."assets/images/login/radhakrishnan.png"?>" width="210" height="110"></div>
            <div class="proBoxText">V.S. Radhakrishnan</div>
            <div class="proBoxText2">Hon. State Minister of Education  
        </div>
        </div>


        </div><!-- midLeftBox End -->

        <div class="midCenterBox"><!-- midCenterBox -->

        <!--<div class="midImg"><img src="images/pro-2.jpg" width="445" height="280"></div>-->

        <div class="midBoxText">
            <div class="midTextTitel">Welcome to NEMIS</div>
            <div class="midTextBox" style="color:#fff;">National Education Management Information System, abbreviated, as NEMIS is an online web portal that automates the entire end-to-end management of education data and related administration functions. <br><br>
        The primary aim of the NEMIS is to collect, provide and analyze real-time data for better decision-making. Furthermore NEMIS automates the manual processes of administration functions which decrease the wastage of time and resources. <br><br>
          NEMIS consists of modules which handle basically all the entities related to education including students, teachers, principals, schools, educational offices at zonal and provincial levels and the Ministry of Education. <br><br>
          NEMIS is the first   <strong>Nation-wide</strong> initiative towards digitized education.</div>
        </div>

        </div><!-- midCenterBox End -->

        <div class="midRightBox"><!-- midRightBox -->

            <div class="midRightInnerBox content ">   <!-- BEGIN LOGIN -->

                <?php echo form_open('login/login_user'); ?>

                        <p class="form-title" >Login to NEMIS Management Portal</p>
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
                            <button type="submit" class="btn btn-success">
                                <i class="fs-checkmark-2"></i> Login
                            </button><br>           
                            <strong>Forgot your password?</strong><br> 
                                <a href="index.php#">Contact your provincial NEMIS coordinator to get your password resetted.</a>
                        </div>

                    <?php echo form_close()?>
                </div>
        
        <div class="midRightInnerBox"><!--
        <div class="midRightInnerBoxTitel" style="margin-top:10px;">Request For Registration</div>-->


            <div class="rightBoxButton"><a href="webuser/index.html">
                <div class="rightBoxButtonIcon"><img src="<?php echo base_url()."assets/images/login/icon-1.png"?>" width="50" height="40"></div>
                <div class="rightBoxButtonText">Coordinator List</div>
                </a>
            </div>


        <div class="rightBoxButton"><a href="<?php echo base_url()."index.php/register/newmember"?>">
            <div class="rightBoxButtonIcon"><img src="<?php echo base_url()."assets/images/login/icon-2.png"?>" width="50" height="40"></div>
            <div class="rightBoxButtonText">User Registration</div>
            </a>
        </div>

        <div class="rightBoxButton"><a href="webuser/contactUs-1.html">
            <div class="rightBoxButtonIcon"><img src="<?php echo base_url()."assets/images/login/icon-2.png"?>" width="50" height="40"></div>
            <div class="rightBoxButtonText">Contact Us</div>
            </a>
        </div>


        </div>



        </div><!-- midRightBox End -->

        </div><!-- midBox End-->
    </div><!-- midOutBox End-->


