<?php
  $url = $_REQUEST['url'];
  $date = $_REQUEST['americandate'];
  $price = $_REQUEST['price'];

  //echo $date;

  if(preg_match('/^https/', $url)){
    echo 'https: Да';
  } else {
    echo 'https: Нет';
  }

  echo '<br/>';

  if(preg_match('/\d{2}-\d{2}-\d{4}/', $date)){
    echo mb_substr($date, 3, 2).'.'.mb_substr($date, 0, 2).'.'.mb_substr($date, 6);
  } else {
    echo "Не формат даты!";
  }

  echo '<br/>';

  if(preg_match('/\d+/', $price)){
    echo number_format($price, 0, '.', ' ').' руб.';
  } else {
    echo 'Не число!';
  }
?>