<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <p><b><?php echo $product_review->author ?></b></p>
  <p><i><?php echo $product_review->email ?></i></p>
  <p><?php echo nl2br($product_review->content) ?></p>
  <?php echo form_open('admin/review/update/'.$product_review->id); ?>
    <input type="hidden" name="author" value="<?php echo $product_review->author ?>">
    <input type="hidden" name="email" value="<?php echo $product_review->email ?>">
    <input type="hidden" name="content" value="<?php echo $product_review->content ?>">
    <input type="hidden" name="product_id" value="<?php echo $product_review->product_id ?>">
    <div class="checkbox">
      <label>
        <?php echo form_checkbox('active', 1, $product_review->active); ?>
        Active
      </label>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="<?php echo site_url('admin/review') ?>" class="btn btn-danger">Back</a>
  <?php echo form_close(); ?>

</div>