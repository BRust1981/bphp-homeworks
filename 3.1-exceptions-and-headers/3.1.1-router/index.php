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

  if(!empty($_GET) && !empty($_GET['page'])){

    $pagename = $_GET['page'];

    if($check->isAvailablePage($pagename)){
      header('HTTP/1.1 404 Not Found'); 
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/3.1-exceptions-and-headers/3.1.1-router/404.php');
    } else{
      echo "Вы находитесь на странице <b>$pagename</b>";
    }

  } else {
    header('HTTP/1.1 400 Bad Request'); 
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/3.1-exceptions-and-headers/3.1.1-router/error.php');
  }

?>