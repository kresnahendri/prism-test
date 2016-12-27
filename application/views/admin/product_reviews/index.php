<div class="col-md-12">
	
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

	<a href="<?php echo site_url('admin/review/create') ?>" class="btn btn-primary pull-right">Add review</a><br><br>
	
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-striped table-hovered" id="dataTable">
					<thead>
						<th>Author</th>
						<th>Content</th>
						<th>Status</th>
						<th>Product</th>
						<th></th>
					</thead>
					<tbody>
						<?php foreach ($product_reviews as $review): ?>			
							<tr>
								<td><?php echo $review->author ?></td>
								<td><?php echo $review->content	?></td>
								<td>
									<?php 
										if ($review->active) {
											echo '<label class="label label-success">active</label>';
										} else {
											echo '<label class="label label-danger">not active</label>';
										} 
									?>	
								</td>
								<td>
									<a href="<?php echo site_url('admin/product/'.$review->product_id) ?>">
										<?php echo $review->product_id ?>
									</a>
								</td>
								<td>
									<!-- view button: detail -->
									<a href="<?php echo site_url('admin/review/'.$review->id) ?>" class="btn btn-xs btn-success">
										<i class="fa fa-eye"></i>
									</a>
									<!-- delete button -->
									<?php echo anchor("admin/review/delete/".$review->id, '<i class="fa fa-times"></i>', ['onclick' => "return confirm('Do you want delete this review?')", "class" => "btn btn-xs btn-danger"]);
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