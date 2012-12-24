<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $title_for_layout; ?></title>

		<!--[if lt IE 9]>
      		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
    	<![endif]-->

    	<?php
			echo $this->Html->script('jquery/jquery-1.8.3');
    		//Load Bootstrap:  
    		echo $this->Html->css('twitter/bootstrap/bootstrap');
			echo $this->Html->css('twitter/bootstrap/bootstrap-responsive');
			echo $this->Html->script('twitter/bootstrap/bootstrap');


			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
    	?>

	</head>
	<body>

	    <div class="navbar navbar-fixed-top">
	      <div class="navbar-inner">
	        <div class="container">
	          <a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
	            <span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
	          </a>
	          <?php echo $this->Html->link('Bad Wolf Media', '/', array('class' => 'brand')); ?>
			  <?php if (empty($username)) { ?>
	          <div class="nav-collapse visible-desktop hidden-phone">
	            <ul class="nav">
	            	<li><?php echo $this->Html->link('Register', '/users/add'); ?></li>
	            </ul>
				<ul class="nav pull-right">
					<li><?php echo $this->Html->link('Login', '/users/login'); ?></li>
				</ul>
	          </div><!--/.nav-collapse -->
			  <div class="nav-collapse visible-phone hidden-desktop">
	            <ul class="nav">
	            	<li><?php echo $this->Html->link('Register', '/users/add'); ?></li>
	            </ul>
				<ul class="nav">
					<li><?php echo $this->Html->link('Login', '/users/login'); ?></li>
				</ul>
	          </div><!--/.nav-collapse -->
			  <?php } else { ?>
			  <ul class="nav pull-right">
				  <li class="dropdown"><?php echo $this->Html->link($username, '#menu', array('class' => 'dropdown-toggle', 'id' => 'dLabel', 'data-toggle' => 'dropdown', 'role' => 'button')); ?>
					<ul class="dropdown-menu pull-right" role="menu">
						<li><?php echo $this->Html->link('Profile', '/users/view'); ?></li>
						<li><?php echo $this->Html->link('Logout', '/users/logout'); ?></li>
					</ul>
				  </li>  
			  </div> <!--/.dropdown -->
			  <?php } ?>
	        </div>
	      </div>
	    </div>

	    <div class="container-fluid">
	        <div class="row-fluid">

	           	<div id="main-content" class="span12" style="margin-top: 100px;">

					<?php echo $this->Session->flash(); ?>

					<?php echo $this->fetch('content'); ?>

	            </div><!--/span-->

	        </div><!--/row-->

	      <footer>
	        <p>&copy; Bad Wolf Media <?php echo date('Y'); ?></p>
	      </footer>

	    </div> <!-- /container -->

	</body>
</html>
