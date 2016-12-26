<div class="col-md-12">
	
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

	<a href="<?php echo site_url('admin/customer/create') ?>" class="btn btn-primary pull-right">Add customer</a><br><br>
	
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-striped table-hovered" id="dataTable">
					<thead>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>City</th>
						<th></th>
					</thead>
					<tbody>
						<?php foreach ($customers as $customer): ?>			
							<tr>
								<td><?php echo $customer->name ?></td>
								<td><?php echo $customer->email ?></td>
								<td><?php echo $customer->phone	?></td>
								<td><?php echo $customer->city	?></td>
								<td>
									<!-- view button: detail -->
									<a href="<?php echo site_url('admin/customer/'.$customer->id) ?>" class="btn btn-xs btn-success">
										<i class="fa fa-eye"></i>
									</a>
									<!-- edit button -->
									<a href="<?php echo site_url('admin/customer/'.$customer->id.'/edit') ?>" class="btn btn-xs btn-warning">
										<i class="fa fa-pencil"></i>
									</a>
									<!-- delete button -->
									<?php echo anchor("admin/customer/delete/".$customer->id, '<i class="fa fa-times"></i>', ['onclick' => "return confirm('Do you want delete this customer?')", "class" => "btn btn-xs btn-danger"]);
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