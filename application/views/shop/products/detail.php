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
		<h3>Description</h3>
		<p><?php echo nl2br($product->description) ?></p>
	</div>
</div>

<hr>

<!-- related product -->
<!-- <div class="row">
	<div class="col-md-12">
		<h3>Related products</h3>
		<?php if ($related_products): ?>
			<?php foreach ($related_products as $related_product): ?>
				<div class="col-sm-3 col-xs-6">
					<a href="<?php echo site_url('shop/product/detail/'.$related_product->id) ?>" class="product-link">
						<div class="panel panel-default">
						  <div class="panel-body product-box">
						  	<div class="product-box-img">
						    	<img src="<?php echo PRODUCT_IMG_BASE_URL.$related_product->img ?>" alt="<?php echo $related_product->name ?>" class="img-responsive">
						    </div>
						    <div class="product-box-info">
						    	<div class="product-box-info__content">
								    <h6><?php echo word_limiter($related_product->name, 10) ?></h6>
								    <h5 class="product-price">Rp <?php echo number_format($related_product->retail_price) ?></h5>

								    <?php echo form_open('shop/cart/add', ['class' => 'form-inline']); ?>
											<?php echo form_hidden('stock', $related_product->stock); ?>
											<?php echo form_hidden('id', $related_product->id); ?>
											<?php echo form_hidden('price', $related_product->retail_price); ?>
											<?php echo form_hidden('name', $related_product->name); ?>
											<?php echo form_hidden('img', $related_product->img); ?>
											<?php echo form_hidden('stock', $related_product->stock); ?>
											<?php echo form_hidden('qty', 1); ?>
										  <button type="submit" class="btn btn-success btn-block">Add To Cart</button>
										<?php echo form_close(); ?>
							    </div>
						    </div>
						  </div>
						</div>
					</a>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	</div>
</div> -->

<hr>
<!-- product review -->
<div class="row">
	<div class="col-md-12">
		<h3>Reviews</h3>
		<?php if ($reviews): ?>
			<?php foreach ($reviews as $review): ?>
				<p><b><?php echo $review->author ?></b></p>
				<p><i><?php echo $review->email ?></i></p>
				<p><?php echo nl2br($review->content) ?></p>
			<?php endforeach ?>
			<hr>
		<?php endif ?>
		<?php echo form_open('shop/product/add_review/'.$product->id); ?>
			<input type="hidden" name="product_id" value="<?php echo $product->id ?>">
			<div class="form-group">
				<?php echo form_label('Author', 'author', ['class' => 'control-label']); ?>
				<?php echo form_input('author', set_value('author'), ['class' => 'form-control']); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('Email', 'email', ['class' => 'control-label']); ?>
				<?php echo form_input('email', set_value('email'), ['class' => 'form-control']); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('Review', 'content', ['class' => 'control-label']); ?>
				<?php echo form_textarea('content', set_value('content'), ['class' => 'form-control']); ?>
			</div>
			<div class="form-group pull-right">
				<button class="btn btn-success">Add Review</button>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>

