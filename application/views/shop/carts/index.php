<?php echo form_open('shop/cart/update'); ?>

<?php $this->load->view('shop/carts/cart_table', ['checkout' => FALSE]); ?>

<div class="pull-right">
  <a href="<?php echo site_url('shop/product') ?>" class="btn btn-primary">Shop More!</a>
<a href="<?php echo site_url('shop/cart/destroy') ?>" class="btn btn-danger">Empty Cart</a>
  <?php echo form_submit('', 'Update your Cart', ['class' => 'btn btn-warning']); ?>
  <a href="<?php echo site_url('shop/cart/checkout') ?>" class="btn btn-success">Checkout!</a>
</div>
