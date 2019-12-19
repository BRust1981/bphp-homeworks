<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Авторизация</title>
  <style type="text/css">
    input {
		display: block;
		margin-top: 10px;
	}
	button {
		margin-top: 10px;
	}
  </style>
</head>
<body>
<form action="index.php" method="post">
  <input type="text" name="login" placeholder="Логин" required>
  <input type="password" name="password" placeholder="Пароль" required>
  <button type="submit">Отправить</button>
  <?php
    if(isset($_COOKIE['bruteforcedetected'])){
      echo '<script>
        alert("Слишком часто вводите пароль. Попробуйте еще раз через минуту.");
    </script>';
    } elseif(isset($_COOKIE['logintime'])) {
      echo '<script>
        alert("Вы авторизованы.");
    </script>';
    }
  ?>
</form>
</body>
</html>
