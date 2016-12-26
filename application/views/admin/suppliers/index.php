<div class="col-md-12">
	
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

	<a href="<?php echo site_url('admin/supplier/create') ?>" class="btn btn-primary pull-right">Add Supplier</a><br><br>
	
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-striped table-hovered" id="dataTable">
					<thead>
						<th>Name</th>
						<th>Email</th>
						<th>Description</th>
						<th></th>
					</thead>
					<tbody>
						<?php foreach ($suppliers as $supplier): ?>			
							<tr>
								<td><?php echo $supplier->name ?></td>
								<td><?php echo $supplier->email ?></td>
								<td><?php echo $supplier->description	?></td>
								<td>
									<!-- view button: detail -->
									<a href="<?php echo site_url('admin/supplier/'.$supplier->id) ?>" class="btn btn-xs btn-success">
										<i class="fa fa-eye"></i>
									</a>
									<!-- edit button -->
									<a href="<?php echo site_url('admin/supplier/'.$supplier->id.'/edit') ?>" class="btn btn-xs btn-warning">
										<i class="fa fa-pencil"></i>
									</a>
									<!-- delete button -->
									<?php echo anchor("admin/supplier/delete/".$supplier->id, '<i class="fa fa-times"></i>', ['onclick' => "return confirm('Do you want delete this supplier?')", "class" => "btn btn-xs btn-danger"]);
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