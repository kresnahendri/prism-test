<div class="col-md-12">
	
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

	<a href="<?php echo site_url('admin/purchase/create') ?>" class="btn btn-primary pull-right">Add purchase</a><br><br>
	<?php if ($purchases): ?>
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-hovered" id="dataTable">
						<thead>
							<th>purchases Order</th>
							<th>Supplier</th>
							<th>Total Amount</th>
							<th><i class="fa fa-check-circle-o"></i></th>
							<th><i class="fa fa-ship"></i></th>
							<th><i class="fa fa-dollar"></i></th>
							<th><i class="fa fa-building"></i></th>
							<th></th>
						</thead>
						<tbody>
							<?php foreach ($purchases as $purchase): ?>			
								<tr>
									<td><?php echo $purchase->order_no ?></td>
									<td><?php echo $purchase->supplier_id ?></td>
									<td><?php echo number_format($this->m_purchase->get_total_amount_by_purchase_id($purchase->id)) ?></td>
									<td><?php echo $purchase->accepted ? '<i class="fa fa-check">' : ''; ?></td>
									<td><?php echo $purchase->shipped ? '<i class="fa fa-check">' : ''; ?></td>
									<td><?php echo $purchase->paid ? '<i class="fa fa-check">' : ''; ?></td>
									<td><?php echo $purchase->recived ? '<i class="fa fa-check">' : ''; ?></td>
									<td>
										<!-- view button: detail -->
										<a href="<?php echo site_url('admin/purchase/'.$purchase->id) ?>" class="btn btn-xs btn-success">
											<i class="fa fa-eye"></i>
										</a>
										<!-- edit button -->
										<!-- <a href="<?php echo site_url('admin/purchase/'.$purchase->id.'/edit') ?>" class="btn btn-xs btn-warning">
											<i class="fa fa-pencil"></i>
										</a> -->
										<!-- delete button -->
										<?php echo anchor("admin/purchase/delete/".$purchase->id, '<i class="fa fa-times"></i>', ['onclick' => "return confirm('Do you want delete this purchase?')", "class" => "btn btn-xs btn-danger"]);
										?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php else: ?>
		<h3>No purchases Order</h3>
	<?php endif ?>

</div>