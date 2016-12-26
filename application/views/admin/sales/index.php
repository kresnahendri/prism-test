<div class="col-md-12">
	
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

	<a href="<?php echo site_url('admin/sale/create') ?>" class="btn btn-primary pull-right">Add sale</a><br><br>
	<?php if ($sales): ?>
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-hovered" id="dataTable">
						<thead>
							<th>Sales Order</th>
							<th>Customer</th>
							<th>Total Amount</th>
							<th><i class="fa fa-check-circle-o"></i></th>
							<th><i class="fa fa-ship"></i></th>
							<th><i class="fa fa-dollar"></i></th>
							<th><i class="fa fa-building"></i></th>
							<th></th>
						</thead>
						<tbody>
							<?php foreach ($sales as $sale): ?>			
								<tr>
									<td><?php echo $sale->order_no ?></td>
									<td><?php echo $sale->customer_id ?></td>
									<td><?php echo number_format($this->m_sale->get_total_amount_by_sale_id($sale->id)) ?></td>
									<td><?php echo $sale->accepted ? '<i class="fa fa-check">' : ''; ?></td>
									<td><?php echo $sale->shipped ? '<i class="fa fa-check">' : ''; ?></td>
									<td><?php echo $sale->paid ? '<i class="fa fa-check">' : ''; ?></td>
									<td><?php echo $sale->recived ? '<i class="fa fa-check">' : ''; ?></td>
									<td>
										<!-- view button: detail -->
										<a href="<?php echo site_url('admin/sale/'.$sale->id) ?>" class="btn btn-xs btn-success">
											<i class="fa fa-eye"></i>
										</a>
										<!-- edit button -->
										<!-- <a href="<?php echo site_url('admin/sale/'.$sale->id.'/edit') ?>" class="btn btn-xs btn-warning">
											<i class="fa fa-pencil"></i>
										</a> -->
										<!-- delete button -->
										<?php echo anchor("admin/sale/delete/".$sale->id, '<i class="fa fa-times"></i>', ['onclick' => "return confirm('Do you want delete this sale?')", "class" => "btn btn-xs btn-danger"]);
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
		<h3>No Sales Order</h3>
	<?php endif ?>

</div>