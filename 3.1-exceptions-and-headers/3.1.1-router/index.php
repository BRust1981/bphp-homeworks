<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  /**
 * Доступные страницы на сайте
 *
 * @var array $availableLinks
 */
  $availableLinks = include './availableLinks.php';

  require './router.php';

  $check = new Router($availableLinks);

  
try {
  echo "Вы находитесь на странице <b>" . $check->isAvailablePage() . "</b>";
}catch(Exception $e){
  $errcode = $e->getCode();
  header("HTTP/1.1 $errcode");
  switch($errcode){
    case 404:
      header('Location: http://' . $_SERVER['HTTP_HOST'] . "/3.1-exceptions-and-headers/3.1.1-router/$errcode.php");
      break;
    default:
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/3.1-exceptions-and-headers/3.1.1-router/error.php');

  }
}


?>