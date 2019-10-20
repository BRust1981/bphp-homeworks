<?php
  date_default_timezone_set ('Europe/Moscow');
  $weekDays = ["понедельник","вторник","среда","четверг","пятница","суббота","воскресенье"];
  $weekWork = [[9.10,18.00],[9.00,18.00],[9.00,18.00],[10.00,18.00],[10.00,18.00],[10.00,18.00],[-1,-1]];
  $weekDay = $weekDays[date("N")-1];
  $today = "Сегодня $weekDay";

  $hour = date("H");
  if($hour >= $weekWork[date("N")-1][0] && $hour < $weekWork[date("N")-1][1]){
    $welcome = "Это лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас до " . $weekWork[date("N")-1][1];
  } else {
    if($hour < $weekWork[date("N")-1][0]){
      $comeIn = "Сегодня";
      $from = $weekWork[date("N")-1][0];
    } elseif($hour >= $weekWork[date("N")-1][1] && $weekWork[date("N")][0] !== -1 || $weekWork[date("N")-1][0] == -1){
      $comeIn = "Завтра";
      if($weekWork[date("N")-1][0] == -1){
        $from = $weekWork[0][0];
      } else {
        $from = $weekWork[date("N")][0];
      }
    } else {
      $comeIn = "Послезавтра";
      $from = $weekWork[0][0];
    }
    $from = number_format($from, 2, '.', '');
    $welcome = "$comeIn - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с $from";
  }

  if($hour >= 6 && $hour < 11){
    $greeting = "Доброго утра!";
    $image = 'img/morning.jpg';
  } elseif($hour >= 11 && $hour < 18){
    $greeting = "Доброго дня";
    $image = 'img/day.jpg';
  } elseif($hour >= 18 && $hour < 23){
    $greeting = "Доброго вечера";
    $image = 'img/evening.jpg';
  } elseif($hour = 23 || $hour < 6){
    $greeting = "Доброй ночи!";
    $image = 'img/night.jpg';
  } else {
    $greeting = '';
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="img" style="background-image: url(<?= $image; ?>)">
    <div class="greeting">
    <h1>
    <?php
    echo $greeting;
    ?>
    </h1>
    <h1>
    <?php
    echo $today;
    ?>
    </h1>
    <h1>
    <?php
    echo $welcome;
    ?>
    </h1>
    </div>
  </div>
</body>
</html>