<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  require 'autoload.php';
  require './config/SystemConfig.php';

  $item = new JsonFileAccessModel('users');
  $content = $item->read();
  print_r($content);
  echo '<br>';

  $content = $item->readJson();
  print_r($content);

  $item2 = new JsonFileAccessModel('users2');
  $item2->write('{"o5":{"name":"Ilon","password":"dragon","email":"i-lon.not.musk@yoho.com","rate":86}}');
?>