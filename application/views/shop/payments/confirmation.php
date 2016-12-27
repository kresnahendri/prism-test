<?php echo form_open('payment-confirmation', ['class' => 'form-horizontal']); ?>
	<!-- Order Number -->
	<div class="form-group">
		<label class="col-md-4 control-label">No. Order</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="order_no" value="">
		</div>
	</div>

	<!-- Seller Bank -->
	<div class="form-group">
		<label class="col-md-4 control-label">Destination Bank</label>
		<div class="col-md-6">
			<select class="form-control" name="merchant_bank">
				<option value="">-Select Bank-</option>
				<option value="BCA">BCA</option>
				<option value="Mandiri">Mandiri</option>
				<option value="BRI">BRI</option>
				<option value="BNI">BNI</option>
				<option value="OCBC NISP">OCBC NISP</option>
			</select>
		</div>
	</div>

	<!-- Cutomer Bank -->
	<div class="form-group">
		<label class="col-md-4 control-label">Your Bank</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="customer_bank" value="<?php echo set_value('customer_bank') ?>" placeholder="BCA, BRI, BNI, Mandiri, Others">
		</div>
	</div>

	<!-- Cutomer Bank Account-->
	<div class="form-group">
		<label class="col-md-4 control-label">Account Name</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="customer_bank_account" value="<?php echo set_value('customer_bank_account') ?>" placeholder="John Lennon">
		</div>
	</div>

	<!-- Total Amount-->
	<div class="form-group">
		<label class="col-md-4 control-label">Total Amount</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="total_amount" placeholder="-Rp-" value="<?php echo set_value('total_amount') ?>">
		</div>
	</div>

	<!-- Transfer Date-->
	<div class="form-group">
		<label class="col-md-4 control-label">Payment Date</label>
		<div class="col-md-6">
			<input type="date" class="form-control" name="payment_date" value="<?php echo set_value('payment_date') ?>">
		</div>
	</div>

	<!-- Button-->
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button class="btn btn-success pull-right">Confirm</button>
		</div>
	</div>

<?php echo form_close(); ?>