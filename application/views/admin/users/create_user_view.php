<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<h1>Создать пользователя</h1>
<?php echo form_open('',array('class'=>'form-horizontal'));?>
<div class="form-group">
  <?php echo form_label('Логин','username', array('class'=>'col-sm-2 control-label'));?>
  <?php echo  form_error('username');?>
  <div class="col-sm-10">
    <?php echo  form_input('username',set_value('username'),'class="form-control"');?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('Email','email', array('class'=>'col-sm-2 control-label'));?>
  <?php echo  form_error('email');?>
  <div class="col-sm-10">
    <?php echo  form_input('email','','class="form-control"');?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('Password','password', array('class'=>'col-sm-2 control-label'));?>
  <?php echo form_error('password');?>
  <div class="col-sm-10">
    <?php echo form_password('password','','class="form-control"');?>
  </div>  
</div>
<div class="form-group">
  <?php echo form_label('Confirm password','password_confirm', array('class'=>'col-sm-2 control-label'));?>
  <?php echo form_error('password_confirm');?>
  <div class="col-sm-10">
  <?php echo form_password('password_confirm','','class="form-control"');?>
  </div>
</div>
<div class="form-group">
<?php echo form_label('Groups','groups[]', array('class'=>'col-sm-2 control-label'));?>
  <div class="col-sm-10">
  <?php
  if(isset($groups))
  {
    foreach($groups as $group)
    {
      echo '<div class="checkbox">';
      echo '<label>';
      echo form_checkbox('groups[]', $group->id, set_checkbox('groups[]', $group->id));
      echo ' '.$group->name;
      echo '</label>';
      echo '</div>';
    }
  }
  ?>
  </div>
</div>
  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10"> 
      <?php echo form_submit('submit', 'Создать пользователя', 'class="btn btn-primary"');?>    
  </div>
</div>
<?php echo form_close();?>