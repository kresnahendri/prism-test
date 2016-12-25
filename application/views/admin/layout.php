<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>PrismShop Inventory - Admin</title>
  <link href="<?php echo site_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo site_url('assets/css/sb-admin.css') ?>" rel="stylesheet">
  <link href="<?php echo site_url('assets/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo site_url('assets/css/app.css') ?>" rel="stylesheet">
  <link href="<?php echo site_url('assets/css/morris.css') ?>" rel="stylesheet">
  <script src="https://use.fontawesome.com/60f9933159.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"><b>PRISM-SHOP INVENTORY</b></a>
      </div>
      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i>
              <?php echo $this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name ?>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="<?php echo site_url('auth/logout') ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

          <?php if ($this->ion_auth->logged_in()): ?>
            <li><a href="<?php echo site_url('admin/report') ?>"><i class="fa fa-fw fa-line-chart"></i> Summary Report</a></li>
          <?php endif ?>
          
          <?php if ($this->ion_auth->is_admin() || $this->ion_auth->is_purchase()): ?>
            <li><a href="<?php echo site_url('admin/purchase') ?>"><i class="fa fa-fw fa-shopping-cart"></i> Purchase Order</a></li>
          <?php endif ?>
          
          <?php if ($this->ion_auth->is_admin() || $this->ion_auth->is_sale()): ?>
            <li><a href="<?php echo site_url('admin/sale') ?>"><i class="fa fa-fw fa-dollar"></i> Sales Order</a></li>
          <?php endif ?>

          <?php if ($this->ion_auth->is_admin()): ?>
            <li>
              <a href="javascript:;" data-toggle="collapse" data-target="#pm"><i class="fa fa-fw fa-shopping-bag"></i> Product Management <i class="fa fa-fw fa-caret-down"></i></a>
              <ul id="pm" class="collapse in">
                <li><a href="<?php echo site_url('admin/product') ?>">Product</a></li>
                <li><a href="<?php echo site_url('admin/category') ?>">Category</a></li>
              </ul>
            </li>
            <li><a href="<?php echo site_url('admin/supplier') ?>"><i class="fa fa-fw fa-truck"></i> Supplier</a></li>
            <li><a href="<?php echo site_url('admin/customer') ?>"><i class="fa fa-fw fa-users"></i> Customer</a></li>
            <!-- <li><a href="<?php echo site_url('admin/admin') ?>"><i class="fa fa-fw fa-user-secret"></i> User Admin</a></li> -->
          <?php endif ?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          
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

  </div>

  <!-- JavaScript -->
  <script src="<?php echo site_url('assets/js/jquery.min.js') ?>"></script>
  <script src="<?php echo site_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo site_url('assets/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo site_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
  <script src="<?php echo site_url('assets/js/angular.min.js') ?>"></script>
  <script src="<?php echo site_url('assets/js/angular-route.min.js') ?>"></script>
  <script type="text/javascript">
    var baseUrl = "<?php echo base_url() ?>";
  </script>
  <script src="<?php echo site_url('assets/js/app.js') ?>"></script>
  <script src="<?php echo site_url('assets/js/chart.js') ?>"></script>
  <script src="<?php echo site_url('assets/js/raphael.min.js') ?>"></script>
  <script src="<?php echo site_url('assets/js/morris.min.js') ?>"></script>
  

</body>

</html>