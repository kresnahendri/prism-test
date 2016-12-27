<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Inventory Management System, manage purchase, sales order">
  <meta name="author" content="Kresna Hendri">
	<title>Prism Shop - <?php echo $data['title'] ?></title>
	<link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo site_url('assets/css/shop.css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://use.fontawesome.com/60f9933159.js"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-default">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?php echo site_url('shop') ?>">PRISM-SHOP</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="<?php echo site_url('payment-confirmation') ?>">Payment Confirmation</a></li>
	        <li><a href="<?php echo site_url('shop') ?>">Shop</a></li>
	        <li><a href="<?php echo site_url('shop/cart') ?>"><i class="fa fa-shopping-cart fa-lg"></i> <span class="badge"><?php echo $this->cart->total_items(); ?></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<!-- container -->
	<div class="container" style="padding-top: 20px;">

				<?php if ($this->session->flashdata('err')): ?>
		      <div class="alert alert-danger"><?php echo $this->session->flashdata('err'); ?></div>
		    <?php endif ?>
		    <?php if ($this->session->flashdata('success')): ?>
		      <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
		    <?php endif ?>
		    
				<!-- CONTENT -->
			  <?php $this->load->view($view, $data); ?>

	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo site_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo site_url('assets/js/app.js') ?>"></script>
</body>
</html>