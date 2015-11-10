<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Панель администратора</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script> 
  
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
</head>

<body>
<?php
if($this->ion_auth->logged_in()) {
?>
<nav class="navbar navbar-inverse">
  <div class="container">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?=site_url()?>">Главная</a></li>  
      <li><a href="<?php echo site_url('news'); ?>">Новости</a></li>
      <?php
      if($this->ion_auth->is_admin())
      {
      ?>
        <li><a href="<?php echo site_url('admin/groups'); ?>">Группы</a></li>
        <li><a href="<?php echo site_url('admin/users'); ?>">Пользователи</a></li>
      <?php
      }
      ?>
      <li><a href="<?php echo site_url('admin/user/logout');?>">Выйти</a></li>
    </ul>
  </div>
</nav>
<?php
}
?>
<?php
if($this->session->flashdata('message'))
{
?>
  <div class="container">
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
      <?php echo $this->session->flashdata('message');?>
    </div>
  </div>
<?php
}
?>

<div class="container bs-docs-container">
  <div class="row">
    <div class="col-md-12" role="main"> 