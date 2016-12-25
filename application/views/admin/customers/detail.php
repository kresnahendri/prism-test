<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <h1>
  	<?php echo $customer->name ?>
  	<a href="<?php echo site_url('admin/customer') ?>" class="btn btn-sm btn-danger">Back</a>
  	<a href="<?php echo site_url('admin/customer/'.$customer->id.'/edit') ?>" class="btn btn-sm btn-info">Edit</a>
  </h1>
  <table class="table table-stripped">
  	<tr>
  		<td>Email</td><td>: <?php echo $customer->email ?></td>
  	</tr>
  	<tr>
  		<td>Phone</td><td>: <?php echo $customer->phone ?></td>
  	</tr>
    <tr>
      <td>address</td><td>: <?php echo $customer->address ?></td>
    </tr>
    <tr>
      <td>city</td><td>: <?php echo $customer->city ?></td>
    </tr>
    <tr>
      <td>province</td><td>: <?php echo $customer->province ?></td>
    </tr>
    <tr>
      <td>Country</td><td>: <?php echo $customer->country ?></td>
    </tr>
    <tr>
      <td>ZIP</td><td>: <?php echo $customer->zip ?></td>
    </tr>
  </table>
</div>