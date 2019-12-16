<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  /*
  Фиксировать в куках будем время ошибки и логироавть только данные с момента 
  попытки взлома (третья попытка в 60 секунд считается брутом, ее и фиксируем)
  */
  $users = [
          'admin' => 'admin1234',
          'randomUser' => 'somePassword',
          'janitor' => 'nimbus2000'
    ];
  
  //если не зафиксирована попытка перебора
  if(!isset($_COOKIE['bruteforcedetected'])){
    //Если пришли значения login и password
    if(isset($_POST['login']) && isset($_POST['password'])){
      //если пришедшие значения логина-пароля совпали с существующими в системе
      if(array_key_exists($_POST['login'], $users) && $users[$_POST['login']] == $_POST['password']){
        $time = time();
        setcookie('loginsuccess', $_POST['login'], $time);    //
        setcookie('logintime', $time + 120, $time);    //
        // иначе фиксируем ошибку
      } else {
        //фиксируем время
        $curtime = time();
        // если кука с ошибками уже заводилась
        if(isset($_COOKIE['errortime1'])){
          // если уже был второй случай ошибки
          if(isset($_COOKIE['errortime2'])){
            //если первая ошибка была менее минуты назад (о наличии второй говорит предыдущая проверка и она значит тоже входит в эту минуту)
            if($_COOKIE['errortime1'] + 60 > $curtime){
              setcookie('bruteforcedetected', true, time() + 86400);
              //fixBrute
            } else {
              setcookie('errortime1', $_COOKIE['errortime2'], time() + 86400);
              setcookie('errortime2', $curtime, time() + 86400);
            }
            $_COOKIE['errortime'] = $curtime;
            $_COOKIE['errorcount'] = 1;
          } else {
            setcookie('errortime2', $curtime, time() + 86400);
          }
        } else {
          setcookie('errortime1', $curtime, time() + 86400);
        }
        
      }
    } 
  }

  header('HTTP/1.1 200 OK'); 
  header('Location: http://' . $_SERVER['HTTP_HOST'] . '/2.3-dates-and-sessions/2.3.2-brute-protection/form.php');
  
?>
