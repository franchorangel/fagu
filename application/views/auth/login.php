<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login", array( 'role' => 'form' ));?>
<div class="form-group">
  <p>
    <?php echo lang('login_identity_label', 'identity', 'class="sr-only"');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password', 'class="sr-only"');?>
    <?php echo form_input($password);?>
  </p>

  <div class="checkbox">
    <label>
      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
      <?php echo lang('login_remember_label');?>
    </label>
  </div>

  <p><?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-default"');?></p>

</div>
<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
