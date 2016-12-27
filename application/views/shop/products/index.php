<div class="row">
	<div class="col-md-3">
		<ul class="list-group category-box">
			<li class="list-group-item"><h3>Categories</h3></li>
			<li class="list-group-item">
				<a href="<?php echo site_url('shop') ?>">All</a>
			</li>
		  <?php foreach ($categories as $category): ?>
				<li class="list-group-item">
					<a href="<?php echo site_url('shop/category/'.$category->id) ?>"><?php echo $category->name ?></a>
				</li>
			<?php endforeach ?>
		</ul>
	</div>

	<div class="col-md-9">
		<?php if ($products): ?>
			<?php foreach ($products as $product): ?>
				<div class="col-sm-4 col-xs-6">
					<a href="<?php echo site_url('shop/product/detail/'.$product->id) ?>" class="product-link">
						<div class="panel panel-default">
						  <div class="panel-body product-box">
						  	<div class="product-box-img">
						    	<img src="<?php echo PRODUCT_IMG_BASE_URL.$product->img ?>" alt="<?php echo $product->name ?>" class="img-responsive">
						    </div>
						    <div class="product-box-info">
						    	<div class="product-box-info__content">
								    <h6><?php echo word_limiter($product->name, 10) ?></h6>
								    <h5 class="product-price">Rp <?php echo number_format($product->retail_price) ?></h5>

								    <?php echo form_open('shop/cart/add', ['class' => 'form-inline']); ?>
											<?php echo form_hidden('stock', $product->stock); ?>
											<?php echo form_hidden('id', $product->id); ?>
											<?php echo form_hidden('price', $product->retail_price); ?>
											<?php echo form_hidden('name', $product->name); ?>
											<?php echo form_hidden('img', $product->img); ?>
											<?php echo form_hidden('stock', $product->stock); ?>
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
		<?php else: ?>
			<h1>No products found.</h1>
		<?php endif ?>
	</div>
</div>