<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <h1>
  	<?php echo $product->name ?>
  	<a href="<?php echo site_url('admin/product') ?>" class="btn btn-sm btn-danger">Back</a>
  	<a href="<?php echo site_url('admin/product/'.$product->id.'/edit') ?>" class="btn btn-sm btn-info">Edit</a>
  </h1>
  <?php if ($product->img): ?>
    <img class="img-product" src="<?php echo site_url('uploads/products/img/'.$product->img) ?>" alt="<?php echo $product->name ?>">
  <?php else: ?>
    <p>No image found</p>
  <?php endif ?>
  <table class="table table-stripped">
  	<tr>
  		<td>SKU</td><td>: <?php echo $product->sku ?></td>
  	</tr>
  	<tr>
  		<td>Brand</td><td>: <?php echo $product->brand ?></td>
  	</tr>
  	<tr>
  		<td>Description</td><td>: <?php echo $product->description ?></td>
  	</tr>
  	<tr>
  		<td>Reatail Price</td><td>: <?php echo number_format($product->retail_price) ?></td>
  	</tr>
  	<tr>
  		<td>Wholesale Price</td><td>: <?php echo number_format($product->wholesale_price) ?></td>
  	</tr>
  	<tr>
  		<td>Buy Price</td><td>: <?php echo number_format($product->buy_price) ?></td>
  	</tr>
  	<tr>
  		<td>Stock</td><td>: <?php echo $product->stock ?></td>
  	</tr>
  	<tr>
  		<td>Status</td><td>: <?php echo $product->active ?></td>
  	</tr>
  	<tr>
  		<td>Created at</td><td>: <?php echo $product->created_at ?></td>
  	</tr>
  	<tr>
  		<td>Category</td><td>: <?php echo $product->category_name ?></td>
  	</tr>
  	<tr>
  		<td>Supplier</td><td>: <?php echo $product->supplier_name ?></td>
  	</tr>
  </table>
</div>