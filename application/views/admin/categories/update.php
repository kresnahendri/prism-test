<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <?php $this->load->view('admin/partials/_validation_errors'); ?>

	<?php echo form_open('admin/category/'.$category->id.'/edit'); ?>
		<div class="col-md-6">
			<!-- name -->
			<div class="form-group">
				<?php echo form_label('category Name', 'name', ['class' => 'control-label']); ?>
				<?php echo form_input('name', $category->name, ['class' => 'form-control', 'placeholder' => 'category name (company or personal)']); ?>
			</div>

			<!-- description -->
			<div class="form-group">
				<?php echo form_label('Description', 'description', ['class' => 'control-label']); ?>
				<?php echo form_textarea('description', $category->description, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Description about category']); ?>
			</div>

			<!-- button: cancel, submit -->
			<div class="form-group pull-right">
				<a href="<?php echo site_url('admin/supplier') ?>" class="btn btn-danger">Cancel</a>
				<?php echo form_submit('', 'Update category', ['class' => 'btn btn-primary']); ?>
			</div>

		</div>

	<?php echo form_close(); ?>
</div>