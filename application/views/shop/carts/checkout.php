<div class="row">
	<?php echo form_open('shop/cart/checkout'); ?>
		
		<div class="col-md-3">
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
		
		<div class="col-md-3">
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

			<!-- payment method -->
			<div class="form-group">
				<?php echo form_label('Payment Method', 'payment_method', ['class' => 'control-label']); ?>
				<select name="payment_method" class="form-control">
					<option value="1">Bank Transfer</option>
					<option value="2">COD</option>
					<option value="3">Credit Card</option>
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<?php $this->load->view('shop/carts/cart_table', ['checkout' => TRUE]); ?>
			
			<!-- notes -->
			<div class="form-group">
				<?php echo form_label('Notes', 'notes', ['class' => 'control-label']); ?>
				<?php echo form_textarea('notes', set_value('notes'), ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Customer notes']); ?>
			</div>

			<!-- button: cancel, submit -->
			<div class="form-group pull-right">
				<a href="<?php echo site_url('admin/customer') ?>" class="btn btn-danger">Cancel</a>
				<?php echo form_submit('', 'Order', ['class' => 'btn btn-primary']); ?>
			</div>
		</div>

		<input type="hidden" value="<?php echo $this->m_sale->getnerate_order_number() ?>" name="order_no">
	<?php echo form_close(); ?>
</div>