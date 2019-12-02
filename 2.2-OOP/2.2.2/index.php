<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  require 'autoload.php';
  require './config/SystemConfig.php';
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
    <h2>Создать пользователя</h2>
    <form action="./formActions/addUser.php" id="form" method='POST'>
        <div>
            <span>Имя</span>
            <input type="text" name="name" required>
        </div>
        <div>
            <span>Пароль</span>
            <input type="password" name="password" required>
        </div>
        <div>
            <span>Электронная почта</span>
            <input type="email" name="email" required>
        </div>
        <div>
            <span>Рейтинг</span>
            <input type="number" name="rate" pattern="\d+" required>
        </div>
        <button id="send">Добавить пользователя</button>
    </form>

<?php
    $userList = new Users;
    $userList->displaySortedList();
?>

</body>
</html>