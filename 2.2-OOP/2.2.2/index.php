<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  require 'autoload.php';
  require './config/SystemConfig.php';

  $item = new JsonFileAccessModel('users');
  //echo DATABASE_PATH;
  //var_dump($item);
  //$item->connect();
  $content = $item->read();
  print_r($content);
  echo '<br>';

  $content = $item->readJson();
  print_r($content);

  $item2 = new JsonFileAccessModel('users2');
  $item2->write('{"o5":{"name":"Ilon","password":"dragon","email":"i-lon.not.musk@yoho.com","rate":86}}');
//  $item2->writeJson('{"o5":{"name":"Ilon","password":"dragon","email":"i-lon.not.musk@yoho.com","rate":86},"o2":{"name":"Zed","password":"blaze","email":"ew3wes@gnomail.com","rate":81}}');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <progress value="0.0" id=""></progress>
    <form action="index.php" id="form">
        <input type="file" name="file" required>
        <button id="send">Отправить</button>
    </form>
</body>
</html>