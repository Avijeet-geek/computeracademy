<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Green Hills</title>
<link href="<?=base_url()?>assets/website/css/bootstrap.css" rel="stylesheet">
<link href="<?=base_url()?>assets/website/css/custom.css" rel="stylesheet" />
<?php if ($this->session->userdata('is_logged_in')):?>
<link href="<?=base_url()?>assets/website/editor/summernote.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/website/datepicker/datepicker.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/website/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link rel="icon"
	href="<?=base_url()?>assets/website/website/img/favicon.ico"
	type="image/x-icon">
<link rel="shortcut icon"
	href="<?=base_url()?>assets/website/website/img/favicon.ico"
	type="image/x-icon" />

</head>
<body ng-app="examBios">
<?php else:?>
</head>
<body>
<?php endif;?>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#/home"><img
					src="<?=base_url("assets")?>/website/images/vision.png" style="height:110%;width:auto;"> </a>
			</div>
			
    	   <ul class="nav navbar-nav top_right_menu">
                     <li class="active"><a href="#">Welcome to Vision Computer Academy</a></li>
                     <li class="active"><a href="#"><span class="glyphicon glyphicon-cog"></span></a></li>
                     <li class="active"><a href="http://www.visioncomputeracademy.com/" target="_blank"><span class="glyphicon glyphicon-new-window"></span></a></li>
    			     <li>
        			     <a href="<?=site_url('login/logout')?>"> 
        			     <span class="shout_down"> 
            			     <strong>
            			     <em></em>
            			     </strong>
        			     </span></a>
        			     </li>
          </ul>
		</nav>