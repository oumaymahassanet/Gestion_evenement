<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
   <link href="<?php echo base_url();?>assets/admin_template/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url();?>assets/admin_template/css/font-awesome.css" rel="stylesheet"> 
	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url();?>assets/admin_template/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/admin_template/css/dashboard.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url();?>Profile"><?php 
              if(empty($user['first_name']) and empty($user['last_name']) )
                  {echo $user['email']; }
              else    
                 { echo $user['first_name'].' '.$user['last_name'] ;
                    }  
                              ?>
              </a></li>
            <li> <a  class="dropdown-item" href="<?php echo base_url();?>MyPanel/users/logout">Déconnexion</a></li>
          </ul>
         
        </div>
      </div>
    </nav> 
