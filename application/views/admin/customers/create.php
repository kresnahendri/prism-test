<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <?php $this->load->view('admin/partials/_validation_errors'); ?>

	<?php echo form_open('admin/customer/create'); ?>
		<div class="col-md-6">
			<!-- name -->
			<div class="form-group">
				<?php echo form_label('Customer Name', 'name', ['class' => 'control-label']); ?>
				<?php echo form_input('name', set_value('name'), ['class' => 'form-control', 'placeholder' => 'Customer name']); ?>
			</div>
			
			<!-- email -->
			<div class="form-group">
				<?php echo form_label('Email', 'email', ['class' => 'control-label']); ?>
				<?php echo form_input('email', set_value('email'), ['class' => 'form-control', 'placeholder' => 'Customer email']); ?>
			</div>

			<!-- phone -->
			<div class="form-group">
				<?php echo form_label('Phone', 'phone', ['class' => 'control-label']); ?>
				<?php echo form_input('phone', set_value('phone'), ['class' => 'form-control', 'placeholder' => 'Customer phone']); ?>
			</div>

			<!-- address -->
			<div class="form-group">
				<?php echo form_label('Address', 'address', ['class' => 'control-label']); ?>
				<?php echo form_textarea('address', set_value('address'), ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Customer address']); ?>
			</div>
		</div>
		
		<div class="col-md-6">
			<!-- city -->
			<div class="form-group">
				<?php echo form_label('City', 'city', ['class' => 'control-label']); ?>
				<?php echo form_input('city', set_value('city'), ['class' => 'form-control', 'placeholder' => 'City']); ?>
			</div>

			<!-- province -->
			<div class="form-group">
				<?php echo form_label('Province', 'province', ['class' => 'control-label']); ?>
				<?php echo form_input('province', set_value('province'), ['class' => 'form-control', 'placeholder' => 'Province']); ?>
			</div>

			<!-- country -->
			<div class="form-group">
				<?php echo form_label('Country', 'country', ['class' => 'control-label']); ?>
				<?php echo form_input('country', set_value('country'), ['class' => 'form-control', 'placeholder' => 'Country']); ?>
			</div>

			<!-- zip -->
			<div class="form-group">
				<?php echo form_label('ZIP', 'country', ['class' => 'control-label']); ?>
				<?php echo form_input('zip', set_value('zip'), ['class' => 'form-control', 'placeholder' => 'ZIP']); ?>
			</div>

			<!-- button: cancel, submit -->
			<div class="form-group pull-right">
				<a href="<?php echo site_url('admin/customer') ?>" class="btn btn-danger">Cancel</a>
				<?php echo form_submit('', 'Add Customer', ['class' => 'btn btn-primary']); ?>
			</div>
		</div>

	<?php echo form_close(); ?>
</div>