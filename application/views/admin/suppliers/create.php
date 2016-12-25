<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <?php $this->load->view('admin/partials/_validation_errors'); ?>

	<?php echo form_open('admin/supplier/create'); ?>
		<div class="col-md-6">
			<!-- name -->
			<div class="form-group">
				<?php echo form_label('Supplier Name', 'name', ['class' => 'control-label']); ?>
				<?php echo form_input('name', set_value('name'), ['class' => 'form-control', 'placeholder' => 'Supplier name (company or personal)']); ?>
			</div>
			
			<!-- email -->
			<div class="form-group">
				<?php echo form_label('Email', 'email', ['class' => 'control-label']); ?>
				<?php echo form_input('email', set_value('email'), ['class' => 'form-control', 'placeholder' => 'Supplier email']); ?>
			</div>

			<!-- description -->
			<div class="form-group">
				<?php echo form_label('Description', 'description', ['class' => 'control-label']); ?>
				<?php echo form_textarea('description', set_value('description'), ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Description about supplier']); ?>
			</div>

			<!-- button: cancel, submit -->
			<div class="form-group pull-right">
				<a href="<?php echo site_url('admin/supplier') ?>" class="btn btn-danger">Cancel</a>
				<?php echo form_submit('', 'Add Supplier', ['class' => 'btn btn-primary']); ?>
			</div>

		</div>

	<?php echo form_close(); ?>
</div>