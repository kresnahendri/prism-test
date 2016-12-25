<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <h1>
  	<?php echo $category->name ?>
  	<a href="<?php echo site_url('admin/category') ?>" class="btn btn-sm btn-danger">Back</a>
  	<a href="<?php echo site_url('admin/category/'.$category->id.'/edit') ?>" class="btn btn-sm btn-info">Edit</a>
  </h1>
  <table class="table table-stripped">
  	<tr>
  		<td>Description</td><td>: <?php echo $category->description ?></td>
  	</tr>
  </table>
</div>