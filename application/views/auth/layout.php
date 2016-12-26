<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Inventory Management System, manage purchase, sales order">
  <meta name="author" content="Kresna Hendri">
	<title>PrismShop Inventory - <?php echo $data['title'] ?></title>
	<link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap.min.css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<style>
		html, body {
			font-family: 'Montserrat', sans-serif;
		}
	</style>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
	
	<div class="container" style="padding-top: 20px;">

		<div class="row">
		  <div class="col-md-6 col-md-offset-3">

				<?php if ($this->session->flashdata('err')): ?>
		      <div class="alert alert-danger"><?php echo $this->session->flashdata('err'); ?></div>
		    <?php endif ?>
		    <?php if ($this->session->flashdata('success')): ?>
		      <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
		    <?php endif ?>
		    
				<!-- CONTENT -->
			  <?php $this->load->view($view, $data); ?>

			  </div>
		</div>

	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo site_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo site_url('assets/js/app.js') ?>"></script>
</body>
</html>