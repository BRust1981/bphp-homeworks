<?php
$variable = null;
//  Ваш программный код, в котором переменной $type
//  присваивается одно из значений: bool, float, 
//  int, string, null или other
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
</head>
<body>
    <p><?
    if(is_bool($variable)){
      if($variable){
        echo 'true is bool'; 
      } else {
        echo 'false is bool'; 
      }
    } elseif (is_float($variable)) {
      echo "$variable is float";
    } elseif (is_int($variable)) {
      echo "$variable is int";
    } elseif (is_string($variable)) {
      echo "$variable is string";
    } elseif (is_null($variable)) {
      echo "null is null";
    } else {
      echo "$variable is other";
    }
    ?></p>
</body>
</html>