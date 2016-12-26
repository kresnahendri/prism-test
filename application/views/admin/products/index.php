<div class="col-md-12">
	
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

	<a href="<?php echo site_url('admin/product/create') ?>" class="btn btn-primary pull-right">Add Product</a><br><br>
	
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-striped table-hovered" id="dataTable">
					<thead>
						<th>Image</th>
						<th>Name</th>
						<th>Brand</th>
						<th>Category</th>
						<th>Retail Price</th>
						<!-- <th>Wholesale Price</th> -->
						<th>Buy Price</th>
						<th>Stock Qty</th>
						<th>Status</th>
						<th width="10%"></th>
					</thead>
					<tbody>
						<?php foreach ($products as $product): ?>			
							<tr>
								<td><img class="img-product-sm" src="<?php echo site_url('uploads/products/img/'.$product->img) ?>" alt=""></td>
								<td><?php echo $product->name ?></td>
								<td><?php echo $product->brand ?></td>
								<td><?php echo $product->category_name	 ?></td>
								<td><?php echo number_format($product->retail_price) ?></td>
								<!-- <td><?php echo number_format($product->wholesale_price) ?></td> -->
								<td><?php echo number_format($product->buy_price) ?></td>
								<td><?php echo $product->stock ?></td>
								<td>
									<?php 
										if ($product->active) {
											echo '<label class="label label-success">active</label>';
										} else {
											echo '<label class="label label-danger">not active</label>';
										}
									?>
								</td>
								<td>
									<!-- view button: detail -->
									<a href="<?php echo site_url('admin/product/'.$product->id) ?>" class="btn btn-xs btn-success">
										<i class="fa fa-eye"></i>
									</a>
									<!-- edit button -->
									<a href="<?php echo site_url('admin/product/'.$product->id.'/edit') ?>" class="btn btn-xs btn-warning">
										<i class="fa fa-pencil"></i>
									</a>
									<!-- delete button -->
									<?php echo anchor("admin/product/delete/".$product->id, '<i class="fa fa-times"></i>', ['onclick' => "return confirm('Do you want delete this product?')", "class" => "btn btn-xs btn-danger"]);
									?>

								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>