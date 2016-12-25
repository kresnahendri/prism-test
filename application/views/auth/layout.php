<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PrismShop Inventory - <?php echo $data['title'] ?></title>
	<link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap.min.css') ?>">
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