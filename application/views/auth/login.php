<?php if (validation_errors()): ?>
  <div class="alert alert-danger" style="margin-top: 15px;">
    <?php echo validation_errors() ?>
  </div>
<?php endif ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h1><?php echo lang('login_heading');?></h1>
    <p><?php echo lang('login_subheading');?></p>
  </div>
  <div class="panel-body">
    <?php echo form_open("auth/login");?>
  
      <div class="form-group">
        <?php echo form_label('Username:', 'identity');?>
        <?php echo form_input($identity, '', ['class' => 'form-control']);?>
      </div>

      <div class="form-group">
        <?php echo lang('login_password_label', 'password');?>
        <?php echo form_input($password, '', ['class' => 'form-control']);?>
      </div>

      <div class="form-group">
        <?php echo lang('login_remember_label', 'remember');?>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
      </div>

      <?php echo form_submit('submit', lang('login_submit_btn'), ['class' => 'btn btn-primary']);?>

    <?php echo form_close();?>
  </div>
</div>
<!-- <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p> -->