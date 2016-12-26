<div class="row">
	<div class="col-md-6">
		<img src="<?php echo PRODUCT_IMG_BASE_URL.$product->img ?>" alt="<?php echo $product->name ?>" class="img-responsive">
	</div>
	<div class="col-md-6">
		<h3><?php echo $product->name ?></h3>
		<p>Brand: <?php echo $product->brand ?></p>
		<p>Category: <a href="<?php echo site_url('shop/category/'.$product->category_id) ?>"><?php echo $product->category_name ?></a></p>
		<hr>
		<h1 class="product-price">Rp <?php echo number_format($product->retail_price) ?></h1>
		<p>Avaliable stock: <b><?php echo $product->stock ?></b></p><br>

		<?php echo form_open('shop/cart/add', ['class' => 'form-inline']); ?>
			<?php echo form_hidden('stock', $product->stock); ?>
			<?php echo form_hidden('id', $product->id); ?>
			<?php echo form_hidden('price', $product->retail_price); ?>
			<?php echo form_hidden('name', $product->name); ?>
			<?php echo form_hidden('img', $product->img); ?>
			<?php echo form_hidden('stock', $product->stock); ?>
		  <div class="form-group">
		    <input type="number" class="form-control" value="1" name="qty">
		  </div>
		  <button type="submit" class="btn btn-success">Add To Cart</button>
		<?php echo form_close(); ?>
	</div>
</div>

<br>

<div class="row">
	<div class="col-md-12">
		<h4>Specification</h4>
		<p><?php echo $product->description ?></p>
	</div>
</div>

<hr>

<!-- <div class="row">
	<div class="col-md-12">
		<h4>Other products</h4>
		<p>Other</p>
	</div>
</div> -->