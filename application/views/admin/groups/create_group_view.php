<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<h1>Добавить группу</h1>
<?php echo $this->session->flashdata('message');?>
<?php echo form_open('',array('class'=>'form-horizontal'));?>
  <div class="form-group">
    <?php echo form_label('Название','group_name', array('class'=>'col-sm-2 control-label'));?>
    <?php echo form_error('group_name');?>
    <div class="col-sm-10">
      <?php echo form_input('group_name','','class="form-control"');?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('Описание','group_description', array('class'=>'col-sm-2 control-label'));?>
    <?php echo form_error('group_description');?>
    <div class="col-sm-10">
      <?php echo form_input('group_description','','class="form-control"');?>
    </div> 
  </div>
  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">  
        <?php echo form_submit('submit', 'Добавить группу', 'class="btn btn-primary"');?>
      </div> 
  </div>        
<?php echo form_close();?>
