<?php
  echo "Полное имя: ". $fullName = $_REQUEST['lastName'].' '.$_REQUEST['firstName'].' '.$_REQUEST['middleName'].'<br />';
  echo "Фамилия и инициалы: ". $fio = mb_substr($_REQUEST['lastName'], 0, 1).mb_substr($_REQUEST['firstName'], 0, 1).mb_substr($_REQUEST['middleName'], 0, 1).'<br />';
  echo "Аббревиатура: ". $surnameAndInitials = $_REQUEST['lastName'].' '.mb_substr($_REQUEST['firstName'], 0, 1).'.'.mb_substr($_REQUEST['middleName'], 0, 1).'.'.'<br />';
  //echo $surnameAndInitials;
?>