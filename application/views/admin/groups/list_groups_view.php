<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<h1>Группы</h1>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <a href="<?php echo site_url('admin/groups/create');?>" class="btn btn-primary">Добавить группу</a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">
      <?php
      if(!empty($groups))
      {
        echo '<table class="table table-striped">';
        echo ' <thead><tr><th>ID</th><th>Название</th></th><th>Описание</th><th></th></tr> </thead>';
        foreach($groups as $group)
        {
          echo '<tr>';
          echo '<td>'.$group->id.'</td><td>'.anchor('admin/users/index/'.$group->id,$group->name).'</td><td>'.$group->description.'</td><td>'.anchor('admin/groups/edit/'.$group->id,'Изменить');
          if(!in_array($group->name, array('admin','members'))) echo ' '.anchor('admin/groups/delete/'.$group->id,'Удалить');
          echo '</td>';
          echo '</tr>';
        }
        echo '</table>';
      }
      ?>
    </div>
  </div>
</div>