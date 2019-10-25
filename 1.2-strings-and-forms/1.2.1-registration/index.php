<?php
  $login = $_REQUEST['login'];
  $password = $_REQUEST['password'];
  $email = $_REQUEST['email'];
  $firstname = $_REQUEST['firstName'];
  $lastname = $_REQUEST['lastName'];
  $middlename = $_REQUEST['middleName'];
  $code = $_REQUEST['code'];
  
  //echo strlen($firstname), $firstname;

  if(!preg_match('/([a-z|A-Z]+\d+)/', $login)){
    echo "Логин $login содержит недопустимые символы.<br />";
    $error = true;
  }
  if(strlen($password) < 8){
    echo "Длина пароля должна быть минимум 8 символов.<br />";
    $error = true;
  }
  if(!preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/', $email)){
    echo "Электронная почта должна быть формата почта@домен.доменнаязона.<br />";
    $error = true;
  }
  if(strlen($firstname) == 0){
    echo "Имя не может быть пустым.<br />";
    $error = true;
  }
  if(strlen($lastname) == 0){
    echo "Фамилия не может быть пустой.<br />";
    $error = true;
  }
  if(strlen($middlename) == 0){
    echo "Отчество не может быть пустым.<br />";
    $error = true;
  }
  if($code !== 'nd82jaake'){
    echo "Не правильное кодовое слово!<br />";
    $error = true;
  }
  
  // Все успешно
  if(!$error){
    echo "Регистрация прошла успешно!";
  }
?>