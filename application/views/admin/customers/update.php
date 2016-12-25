<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <?php $this->load->view('admin/partials/_validation_errors'); ?>

	<?php echo form_open('admin/customer/'.$customer->id.'/edit'); ?>
		<div class="col-md-6">
			<!-- name -->
			<div class="form-group">
				<?php echo form_label('Customer Name', 'name', ['class' => 'control-label']); ?>
				<?php echo form_input('name', $customer->name, ['class' => 'form-control', 'placeholder' => 'Customer name']); ?>
			</div>
			
			<!-- email -->
			<div class="form-group">
				<?php echo form_label('Email', 'email', ['class' => 'control-label']); ?>
				<?php echo form_input('email', $customer->email, ['class' => 'form-control', 'placeholder' => 'Customer email']); ?>
			</div>

			<!-- phone -->
			<div class="form-group">
				<?php echo form_label('Phone', 'phone', ['class' => 'control-label']); ?>
				<?php echo form_input('phone', $customer->phone, ['class' => 'form-control', 'placeholder' => 'Customer phone']); ?>
			</div>

			<!-- address -->
			<div class="form-group">
				<?php echo form_label('Address', 'address', ['class' => 'control-label']); ?>
				<?php echo form_textarea('address', $customer->address, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Customer address']); ?>
			</div>
		</div>
		
		<div class="col-md-6">
			<!-- city -->
			<div class="form-group">
				<?php echo form_label('City', 'city', ['class' => 'control-label']); ?>
				<?php echo form_input('city', $customer->city, ['class' => 'form-control', 'placeholder' => 'City']); ?>
			</div>

			<!-- province -->
			<div class="form-group">
				<?php echo form_label('Province', 'province', ['class' => 'control-label']); ?>
				<?php echo form_input('province', $customer->province, ['class' => 'form-control', 'placeholder' => 'Province']); ?>
			</div>

			<!-- country -->
			<div class="form-group">
				<?php echo form_label('Country', 'country', ['class' => 'control-label']); ?>
				<?php echo form_input('country', $customer->country, ['class' => 'form-control', 'placeholder' => 'Country']); ?>
			</div>

			<!-- zip -->
			<div class="form-group">
				<?php echo form_label('ZIP', 'country', ['class' => 'control-label']); ?>
				<?php echo form_input('zip', $customer->zip, ['class' => 'form-control', 'placeholder' => 'ZIP']); ?>
			</div>

			<!-- button: cancel, submit -->
			<div class="form-group pull-right">
				<a href="<?php echo site_url('admin/customer') ?>" class="btn btn-danger">Cancel</a>
				<?php echo form_submit('', 'Update Customer', ['class' => 'btn btn-primary']); ?>
			</div>
		</div>

	<?php echo form_close(); ?>
</div>