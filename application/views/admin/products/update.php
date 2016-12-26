<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <?php $this->load->view('admin/partials/_validation_errors'); ?>

	<?php echo form_open_multipart('admin/product/'.$product->id.'/edit'); ?>
		<div class="col-md-6">
			<!-- name -->
			<div class="form-group">
				<?php echo form_label('Product Name', 'name', ['class' => 'control-label']); ?>
				<?php echo form_input('name', $product->name, ['class' => 'form-control']); ?>
			</div>
			
			<!-- sku -->
			<div class="form-group">
				<?php echo form_label('SKU Number', 'sku', ['class' => 'control-label']); ?>
				<?php echo form_input('sku', $product->sku, ['class' => 'form-control']); ?>
			</div>
			
			<!-- brand -->
			<div class="form-group">
				<?php echo form_label('Brand', 'brand', ['class' => 'control-label']); ?>
				<?php echo form_input('brand', $product->brand, ['class' => 'form-control']); ?>
			</div>

			<!-- description -->
			<div class="form-group">
				<?php echo form_label('Description', 'description', ['class' => 'control-label']); ?>
				<?php echo form_textarea('description', $product->description, ['class' => 'form-control']); ?>
			</div>

			<!-- active -->
			<div class="checkbox">
				<label>
					<?php echo form_checkbox('active', 1, (bool) $product->active); ?>
					<b>Active</b>
				</label>
			</div>

		</div>
		
		<div class="col-md-6">

			<!-- category: category_id -->
			<div class="form-group">
				<?php echo form_label('Category', 'category_id', ['class' => 'control-label']); ?>
				<?php echo form_dropdown('category_id', $category_options, $product->category_id, ['class' => 'form-control']); ?>
			</div>

			<!-- supplier: supplier_id -->
			<div class="form-group">
				<?php echo form_label('Supplier', 'supplier_id', ['class' => 'control-label']); ?>
				<?php echo form_dropdown('supplier_id', $supplier_options, $product->supplier_id, ['class' => 'form-control']); ?>
			</div>
			
			<!-- stock -->
			<div class="form-group">
				<?php echo form_label('Stock Quantity', 'stock', ['class' => 'control-label']); ?>
				<?php echo form_input('stock', $product->stock, ['class' => 'form-control']); ?>
			</div>

			<!-- retail_price -->
			<div class="form-group">
				<?php echo form_label('Retail Price', 'retail_price', ['class' => 'control-label']); ?>
				<?php echo form_input('retail_price', $product->retail_price, ['class' => 'form-control']); ?>
			</div>

			<!-- whole_price -->
			<div class="form-group">
				<?php echo form_label('Wholesale Price', 'wholesale_price', ['class' => 'control-label']); ?>
				<?php echo form_input('wholesale_price', $product->wholesale_price, ['class' => 'form-control']); ?>
			</div>

			<!-- buy_price -->
			<div class="form-group">
				<?php echo form_label('Buy Price', 'buy_price', ['class' => 'control-label']); ?>
				<?php echo form_input('buy_price', $product->buy_price, ['class' => 'form-control']); ?>
			</div>

			<!-- image -->
			<div class="form-group">
				<?php echo form_label('Image', 'img', ['class' => 'control-label']); ?>
				<input type="file" name="img" class="form-control">
			</div>
			
			<!-- button: cancel, submit -->
			<div class="form-group pull-right">
				<a href="<?php echo site_url('admin/product') ?>" class="btn btn-danger">Cancel</a>
				<?php echo form_submit('', 'Update Product', ['class' => 'btn btn-primary']); ?>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>