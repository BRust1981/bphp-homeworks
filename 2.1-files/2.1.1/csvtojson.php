<?php
  $content = file('data.csv');
  $head = explode(';', str_ireplace(["\n","\r"], ['', ''], $content[0]));

  for($i = 1; $i < count($content);$i++){
    $string = explode(';', str_ireplace(["\n","\r"], ['', ''], $content[$i]));
    for($key = 0; $key < count($head); $key++){
      $json[$head[$key]] = $string[$key];
    }
    $result[$i - 1] = $json;
  }

  echo json_encode($result);
  $jsonfile = fopen('data.json', 'a');
  fwrite($jsonfile, json_decode($result));
  fclose($jsonfile);
?>
