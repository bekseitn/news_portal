<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<h1>Пользователя</h1>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <a href="<?php echo site_url('admin/users/create');?>" class="btn btn-primary">Добавить пользователя</a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">
    <?php
    if(!empty($users))
    {
      echo '<table class="table table-striped">';
      echo '<thead><tr><th>ID</th><th>Логин</th></th><th>Email</th><th>Последнее посещение</th><th>Operations</th></tr></thead>';
      foreach($users as $user)
      {
        echo '<tr>';
        echo '<td>'.$user->id.'</td><td>'.$user->username.'</td></td><td>'.$user->email.'</td><td>'.date('Y-m-d H:i:s', $user->last_login).'</td><td>';
        if($current_user->id != $user->id) echo anchor('admin/users/edit/'.$user->id,'Изменить').' '.anchor('admin/users/delete/'.$user->id,'Удалить');
        else echo '&nbsp;';
        echo '</td>';
        echo '</tr>';
      }
      echo '</table>';
    }
    ?>
    </div>
  </div>
</div>