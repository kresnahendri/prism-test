<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <h1>
  	<?php echo $supplier->name ?>
  	<a href="<?php echo site_url('admin/supplier') ?>" class="btn btn-sm btn-danger">Back</a>
  	<a href="<?php echo site_url('admin/supplier/'.$supplier->id.'/edit') ?>" class="btn btn-sm btn-info">Edit</a>
  </h1>
  <table class="table table-stripped">
  	<tr>
  		<td>Email</td><td>: <?php echo $supplier->email ?></td>
  	</tr>
  	<tr>
  		<td>Description</td><td>: <?php echo $supplier->description ?></td>
  	</tr>
  </table>
</div>