<?php $i = 1; ?>
<table class="table table-striped">
  <thead>
    <th width="5%">QTY</th>
    <th width="30%">Item Name</th>
    <?php if (!$checkout): ?>
      <th class="text-right">Avail. Stock</th>
    <?php endif ?>
    <th class="text-right">Item Price</th>
    <th class="text-right">Sub-Total</th>
    <?php if (!$checkout): ?>
      <th></th>
    <?php endif ?>
  </thead>

  <tbody>
    <?php foreach ($this->cart->contents() as $items): ?>
      <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
      <?php echo form_hidden($i.'[stock]', $items['stock']); ?>
      <?php if ($checkout): ?>
        <?php echo form_hidden('product_id'.$i, $items['id']); ?>
        <?php echo form_hidden('product_price'.$i, $items['price']); ?>
        <?php echo form_hidden('product_qty'.$i, $items['qty']); ?>
      <?php endif ?>
      <tr> 
        <!-- qty input -->
        <td>
          <?php if ($checkout): ?>
            <p><?php echo $items['qty'] ?></p>
          <?php else: ?>
            <?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'class' => 'form-control', 'style' => 'width: 70px;', 'type' => 'number')); ?>
          <?php endif ?>
        </td>
        <!-- img & name -->
        <td>
          <a href="<?php echo site_url('shop/product/'.$items['id']) ?>">
            <img src="<?php echo PRODUCT_IMG_BASE_URL.$items['img'] ?>" alt="<?php echo $items['name'] ?>" style="width: 50%;"><br>
            <?php echo $items['name']; ?> 
          </a>
        </td>
        <!-- stock -->
        <?php if (!$checkout): ?>
          <td class="text-right"><?php echo $items['stock'] ?></td>
        <?php endif ?>
        <!-- retail price -->
        <td class="text-right">Rp <?php echo $this->cart->format_number($items['price']); ?></td>
        <!-- subtotal -->
        <td class="text-right">Rp <?php echo $this->cart->format_number($items['subtotal']); ?></td>
        <!-- remove button -->
        <?php if (!$checkout): ?>
          <td>
            <a href="<?php echo site_url('shop/cart/remove/'.$items['rowid']) ?>">
              <i class="fa fa-times"></i>    
            </a>
          </td>
        <?php endif ?>
      </tr>
      <?php $i++; ?>
      <?php echo form_hidden('counter', $i); ?>
    <?php endforeach; ?>

    <tr>

      <?php if (!$checkout): ?>
        <td colspan="3"></td>
      <?php else: ?>
        <td colspan="2"></td>
      <?php endif ?>
      <td class="text-right"><strong>Total</strong></td>
      <td class="text-right">Rp <?php echo $this->cart->format_number($this->cart->total()); ?></td>
    </tr>
  </tbody>
</table>