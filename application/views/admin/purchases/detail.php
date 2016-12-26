<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <h1>
  	<?php echo $purchase->first_row()->order_no ?>
    <?php if ($this->m_purchase->is_completed($purchase->first_row()->purchase_id)): ?>
      <span class="label label-success">C O M P L E T E D</span>
    <?php endif ?>
  </h1>
  <div class="row">
    <div class="col-md-8">
      <h3>Supplier Data</h3>
      <p><b>Name:</b> <?php echo $purchase->first_row()->supplier_name ?></p>
      <p><b>Email:</b> <?php echo $purchase->first_row()->email ?></p>
      <p><b>Phone:</b> <?php echo $purchase->first_row()->description ?></p>
    </div>
    <div class="col-md-4">
      <h3>Order Status</h3>
      <p><b>Order Date:</b> <?php echo date('Y-m-d', strtotime($purchase->first_row()->order_date)) ?></p>
      <p><b>Accepted:</b> <?php echo $purchase->first_row()->accepted ? date('Y-m-d', strtotime($purchase->first_row()->accepted_date)) : '-'; ?></p>
      <p><b>Paid:</b> <?php echo $purchase->first_row()->paid ? date('Y-m-d', strtotime($purchase->first_row()->paid_date)) : '-'; ?></p>
      <p><b>Shipped:</b> <?php echo $purchase->first_row()->shipped ? date('Y-m-d', strtotime($purchase->first_row()->shipped_date)) : '-'; ?></p>
      <p><b>Recived:</b> <?php echo $purchase->first_row()->recived ? date('Y-m-d', strtotime($purchase->first_row()->recived_date)) : '-'; ?></p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-stripped table-bordered">
        <thead>
          <th>SKU</th>
          <th>Product Name</th>
          <th>Qty</th>
          <th>Price @</th>
          <th>Amount</th>
        </thead>
        <tbody>
          <?php $total_amount = 0 ?>
          <?php foreach ($purchase->result() as $s): ?>            
            <tr>
              <td><?php echo $s->sku ?></td>
              <td><?php echo $s->product_name ?></td>
              <td><?php echo $s->product_qty ?></td>
              <td><?php echo number_format($s->product_price) ?></td>
              <td><?php echo number_format($s->product_price * $s->product_qty) ?></td>
              <?php $total_amount += ($s->product_price * $s->product_qty) ?>
            </tr>
          <?php endforeach ?>
          <tr>
            <td colspan="4"></td>
            <td><?php echo number_format($total_amount) ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <h4>Notes:</h4>
      <p><?php echo $purchase->first_row()->notes ?></p>
    </div>
  </div>

    <?php if (!$this->m_purchase->is_completed($purchase->first_row()->purchase_id)): ?>
      <?php echo form_label('Update Status', 'status', ['class' => 'control-label']); ?>
      <?php echo form_open('admin/purchase/update-status/'.$purchase->first_row()->purchase_id); ?>
        <?php echo form_hidden('order_no', $purchase->first_row()->order_no); ?>
        <?php echo form_hidden('notes', $purchase->first_row()->notes); ?>
        <?php echo form_hidden('supplier_id', $purchase->first_row()->supplier_id); ?>
        <!-- status -->
        <div class="row">
          <!-- accepted checkbox -->
          <div class="col-md-3">
            <div class="checkbox">
              <label>       
                <?php echo form_checkbox('accepted', 1, $purchase->first_row()->accepted); ?>
                <i class="fa fa-check-circle-o"></i> Accepted
                <input type="date" class="form-control" name="accepted_date" value="<?php if($purchase->first_row()->accepted_date) { echo date('Y-m-d', strtotime($purchase->first_row()->accepted_date)); } ?>">
              </label>
            </div>
          </div>

          <!-- shipped checkbox -->
          <div class="col-md-3">
            <div class="checkbox">
              <label>       
                <?php echo form_checkbox('shipped', 1, $purchase->first_row()->shipped); ?>
                <i class="fa fa-ship"></i> Shipped
                <input type="date" class="form-control" name="shipped_date" value="<?php if($purchase->first_row()->shipped_date) { echo date('Y-m-d', strtotime($purchase->first_row()->shipped_date)); } ?>">
              </label>
            </div>
          </div>

          <!-- paid checkbox -->
          <div class="col-md-3">
            <div class="checkbox">
              <label>       
                <?php echo form_checkbox('paid', 1, $purchase->first_row()->paid); ?>
                <i class="fa fa-dollar"></i> Paid
                <input type="date" class="form-control" name="paid_date" value="<?php if($purchase->first_row()->paid_date) { echo date('Y-m-d', strtotime($purchase->first_row()->paid_date)); } ?>">
              </label>
            </div>
          </div>

          <!-- recived checkbox -->
          <div class="col-md-3">
            <div class="checkbox">
              <label>       
                <?php echo form_checkbox('recived', 1, $purchase->first_row()->recived); ?>
                <i class="fa fa-building"></i> Recived
                <input type="date" class="form-control" name="recived_date" value="<?php if($purchase->first_row()->recived_date) { echo date('Y-m-d', strtotime($purchase->first_row()->recived_date)); } ?>">
              </label>
            </div>
          </div>
        </div>
        <div class="form-group pull-right">
          <a href="<?php echo site_url('admin/purchase') ?>" class="btn btn-danger">Back</a>
          <button class="btn btn-primary">Update</button>
        </div>
      <?php echo form_close(); ?>
    <?php else: ?>
      <!-- <h1><span class="label label-success">C O M P L E T E D</span> -->
      <a href="<?php echo site_url('admin/purchase') ?>" class="btn btn-danger pull-right">Back</a></h1>
    <?php endif ?>

</div>