<?php

function generate($rows, $placesPerRow, $avaliableCount){
  if($rows * $placesPerRow < $avaliableCount){
    $arr = [];
    for($j = 1; $j <= $placesPerRow; $j++){
      $arr[$j] = false;
    }
    $resArr = [];
    for($i = 1; $i <= $rows; $i++){
      $resArr[$i] = $arr;
    }
    return $resArr;
  } else {
    return false;
  }
}

function reserve(&$map, $row, $place){
  if($map[$row][$place]){
    return false;
  } else {
    $map[$row][$place] = true;
    return true;
  }
}

$chairs = 50;
$map = generate(5, 8, $chairs);

$requiredRow = 3;
$requiredPlace = 5;

$reverve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reverve);

echo '<br/>' . '<br/>';

$reverve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reverve);


function logReserve($row, $place, $result){
    if ($result) {
        echo "Ваше место забронировано! Ряд $row, место $place".PHP_EOL;
    } else {
        echo "Что-то пошло не так=( Бронь не удалась".PHP_EOL;
    }
}


?>