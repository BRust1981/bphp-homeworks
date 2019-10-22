<?php
  date_default_timezone_set ('Europe/Moscow');
  $weekDays = ["понедельник","вторник","среда","четверг","пятница","суббота","воскресенье"];
  $weekWork = [[9.00,18.00],[9.00,18.00],[9.00,18.00],[10.00,18.00],[10.00,18.00],[10.00,18.00],[-1,-1]];
  $weekDay = $weekDays[date("N")-1];
  $todayIs = "Сегодня $weekDay";

  $hour = date("H");
  $today = date("N")-1;
  if($today == 6){
    $tomorrow = 0;
  } else {
    $tomorrow = $today + 1;
  }

  //Если обратились в рабочее время
  if($hour >= $weekWork[$today][0] && $hour < $weekWork[$today][1]){
    $welcome = "Это лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас до " . $weekWork[date("N")-1][1];
  } else {
    //Если обратились в рабочий день, но до открытия
    if($hour < $weekWork[$today][0]){
      $comeIn = "Сегодня";
      $from = $weekWork[$today][0];
    } elseif($hour >= $weekWork[$today][1] && $weekWork[$tomorrow][0] !== -1 || $weekWork[$today][0] == -1){
      //Если в рабочий день, но после закрытия, при условии, что завтра не выходной (не обязательно, что это будет воскресенье) ИЛИ обратились в выходной
      //(работает для случая,что выходной один... по идее можно сделать алгоритм для работы хоть с 6-ю выходными и 1 рабочим, универсальный)
      $comeIn = "Завтра";
      $from = $weekWork[$tomorrow][0];
    } else {
      //если не сегодня и не завтра, то...
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
    echo $todayIs;
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