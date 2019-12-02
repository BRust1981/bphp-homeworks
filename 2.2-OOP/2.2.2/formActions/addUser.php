<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  
  /*Подключение необходимых файлов*/

  require './../autoload.php';
  require './../config/SystemConfig.php';


  //Создание объекта
  $user = new User;
 
  //Передача значений свойств из формы в объект
  if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rate'])){
    $user->addUserFromForm($_POST['name'], $_POST['email'], $_POST['password'], $_POST['rate']);
  }

  //Сохранение
  $user->commit();

  //Далее перенаправление на страницу, с которой производилась отправка формы:
  header('HTTP/1.1 200 OK'); 
  header('Location: http://' . $_SERVER['HTTP_HOST'] . '/2.2-OOP/2.2.2');

?>