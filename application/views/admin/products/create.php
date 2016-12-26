<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <?php $this->load->view('admin/partials/_validation_errors'); ?>

	<?php echo form_open_multipart('admin/product/create'); ?>
		<div class="col-md-6">
			<!-- name -->
			<div class="form-group">
				<?php echo form_label('Product Name', 'name', ['class' => 'control-label']); ?>
				<?php echo form_input('name', set_value('name'), ['class' => 'form-control']); ?>
			</div>
			
			<!-- sku -->
			<div class="form-group">
				<?php echo form_label('SKU Number', 'sku', ['class' => 'control-label']); ?>
				<?php echo form_input('sku', set_value('sku'), ['class' => 'form-control']); ?>
			</div>
			
			<!-- brand -->
			<div class="form-group">
				<?php echo form_label('Brand', 'brand', ['class' => 'control-label']); ?>
				<?php echo form_input('brand', set_value('brand'), ['class' => 'form-control']); ?>
			</div>

			<!-- description -->
			<div class="form-group">
				<?php echo form_label('Description', 'description', ['class' => 'control-label']); ?>
				<?php echo form_textarea('description', set_value('description'), ['class' => 'form-control']); ?>
			</div>

			<!-- active -->
			<div class="checkbox">
				<label>
					<?php echo form_checkbox('active', 1, set_checkbox('active', 1), TRUE); ?>
					<b>Active</b>
				</label>
			</div>

		</div>
		
		<div class="col-md-6">

			<!-- category: category_id -->
			<div class="form-group">
				<?php echo form_label('Category', 'category_id', ['class' => 'control-label']); ?>
				<?php echo form_dropdown('category_id', $category_options, set_value('category'), ['class' => 'form-control']); ?>
			</div>

			<!-- supplier: supplier_id -->
			<div class="form-group">
				<?php echo form_label('Supplier', 'supplier_id', ['class' => 'control-label']); ?>
				<?php echo form_dropdown('supplier_id', $supplier_options, set_value('supplier'), ['class' => 'form-control']); ?>
			</div>
			
			<!-- stock -->
			<div class="form-group">
				<?php echo form_label('Stock Quantity', 'stock', ['class' => 'control-label']); ?>
				<?php echo form_input('stock', set_value('stock'), ['class' => 'form-control']); ?>
			</div>

			<!-- retail_price -->
			<div class="form-group">
				<?php echo form_label('Retail Price', 'retail_price', ['class' => 'control-label']); ?>
				<?php echo form_input('retail_price', set_value('retail_price'), ['class' => 'form-control']); ?>
			</div>

			<!-- whole_price -->
			<div class="form-group">
				<?php echo form_label('Wholesale Price', 'wholesale_price', ['class' => 'control-label']); ?>
				<?php echo form_input('wholesale_price', set_value('wholesale_price'), ['class' => 'form-control']); ?>
			</div>

			<!-- buy_price -->
			<div class="form-group">
				<?php echo form_label('Buy Price', 'buy_price', ['class' => 'control-label']); ?>
				<?php echo form_input('buy_price', set_value('buy_price'), ['class' => 'form-control']); ?>
			</div>

			<!-- image -->
			<div class="form-group">
				<?php echo form_label('Image', 'img', ['class' => 'control-label']); ?>
				<input type="file" name="img" class="form-control">
			</div>
			
			<!-- button: cancel, submit -->
			<div class="form-group pull-right">
				<a href="<?php echo site_url('admin/product') ?>" class="btn btn-danger">Cancel</a>
				<?php echo form_submit('', 'Add Product', ['class' => 'btn btn-primary']); ?>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>