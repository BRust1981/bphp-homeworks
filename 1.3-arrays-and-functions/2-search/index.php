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

function search($places, $map){
  for($k = 1; $k <= count($map); $k++){
    for($j = 1; $j <= count($map[$k]) - $places + 1; $j++){
      if(!$map[$k][$j]){
        $maybe = true;
        //echo 'found false in ' . $k . ',' . $j . '<br/>';
        for($i = $j + 1; $i < $j + $places; $i++){
          //echo $k . ',' . $i . ' - ' . $map[$k][$i] . '<br/>';
          if($map[$k][$i]){
            $maybe = false;
            break;
          }
        }
        if($maybe){
          return [$k, $j];
        }
      }
    }
  }
  return null;
}

function printmap($map){
  for($k = 1; $k <= count($map); $k++){
    echo "$k:\t";
    for($j = 1; $j <= count($map[$k]); $j++){
       $sym = (empty($map[$k][$j])) ? 'F' : 'T';
       echo $sym . "\t" . "\t";
    }
    echo '<br/>';
  }
}

$chairs = 50;
$map = generate(5, 8, $chairs);

$map[1] = [1 => true, false, true, true, false, true, false, true];
$map[2] = [1 => true, true, true, false, true, true, true, true];
$map[3] = [1 => true, true, true, true, true, true, true, true];
$map[4] = [1 => true, true, true, true, false, true, false, false];
$map[5] = [1 => true, true, true, true, true, true, true, true];

printmap($map);

$free = search(2, $map);
echo "Свободные места начинаются в(во) " . $free[0] . " ряду начиная с " . $free[1] . " места.";

?>