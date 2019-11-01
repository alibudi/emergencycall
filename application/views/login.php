<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <style type="text/css">
                body{
                    background-image: url(<?php echo base_url()?>images/nobita.jpg);
                }

            </style>
            
    <title>Doraemon Apps</title>

    <link rel="shorcut icon" href="<?php echo base_url('images/roline24x24.png');?>" types="images/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assest/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assest/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assest/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assest/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div align="center">
    

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img src="<?php echo base_url('images/icon.png');?>" alt="RoLine" style="width:150px;height:140px;margin-top:10%;">
                <h1 style="color:#fff;margin-top:0px;">Doraemon App</h1>
                <?php if($this->session->flashdata('info')){ ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info'); ?>
                <?php } ?>


                <div class="login-panel panel panel-default">
                    <div class="panel-body">

                     <?php echo form_open('login/login');?>
                            <fieldset>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="username" id="username" class="form-control" type="text" placeholder="Username" autocomplete="off" autofocus="" />
                        </div>
                        <?php echo form_error('username');?>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input name="password" id="password" class="form-control" type="password" placeholder="Password" autocomplete="off" />
                        </div>
                        <?php echo form_error('password');?>
                        <br />
                        <div class="form-group">
                            <button name="login" type="submit" value="Login" class="btn btn-success btn-block">Login</button>
                        </div>
                    </div>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assest/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assest/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assest/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assest/dist/js/sb-admin-2.js"></script>

</body>

</html>
