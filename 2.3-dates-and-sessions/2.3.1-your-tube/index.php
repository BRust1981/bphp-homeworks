<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    function createSession($term = null)
    {
        session_set_cookie_params($term);
        session_start();

        if(shouldBeIncremented()){
            incrementViews(getViews());
            if(!empty($_SESSION['viewtimeend'])){
                session_destroy();
                session_start();
            }
        } 
        updateSessionTime($term);

    }

    function updateSessionTime($term){
        $_SESSION['viewtimeend'] = date_create("+ $term second", new DateTimeZone('Europe/Moscow'));
    }

    createSession(30);

    /**
     * Функция получает текущее количество просмотров на видео
     *
     * @return int
     */

    /**
     * Функция получает текущее количество просмотров на видео
     *
     * @return int
     */
    function getViews()
    {
        $views = include 'views.php';
        return (int) $views;
    }

    /**
     * Функция увеличивает количество просмотров на 1
     *
     * @param int $views
     */
    function incrementViews($views)
    {
        $views++;
        $data = "<?php \r\nreturn {$views};";
        file_put_contents('views.php', $data);
    }

    /**
     * Функция проверяет, нужно ли увеличивать число просмотров
     *
     * @return bool
     */
    function shouldBeIncremented(): bool
    {
        if(empty($_SESSION['viewtimeend'])){
            return true;
        } else {
            $now = date_create('now', new DateTimeZone('Europe/Moscow'));
            // echo $now->format('H:i:s d.m.Y') . '<br>';
            // echo $_SESSION['viewtimeend']->format('H:i:s d.m.Y') . '<br>';
            if($now > $_SESSION['viewtimeend']) {
                return true;
            } else {
                return false;
            }
        }
    }

    //
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Tube</title>
</head>
<header style="width:100%; border-bottom: 1px solid black">
    <b>YOUR TUBE</b>
</header>
<body>
<div style="width: 69%; border-right: 1px solid black; display: inline-block">
    <div style="text-align: center; border: 1px solid black; background-color: black; color: white; height: 39.375%">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        Очень интересное видео
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <div style="margin-top: 2px; border-top: 1px solid black;">
        <b>Просмотров: <?php echo getViews()?> </b>
    </div>
</div>
<div style="width: 29%; display: inline-block; margin-bottom: 100%">
    <div style="text-align: center; border: 1px solid black; background-color: black; color: white; height: 39.375%; margin:1px">
        <br>
        <br>
        Очень интересное видео
        <br>
        <br>
    </div>
    <div style="text-align: center; border: 1px solid black; background-color: black; color: white; height: 39.375%; margin:1px">
        <br>
        <br>
        Очень интересное видео
        <br>
        <br>
    </div>
    <div style="text-align: center; border: 1px solid black; background-color: black; color: white; height: 39.375%; margin:1px">
        <br>
        <br>
        Очень интересное видео
        <br>
        <br>
    </div>
    <div style="text-align: center; border: 1px solid black; background-color: black; color: white; height: 39.375%; margin:1px">
        <br>
        <br>
        Очень интересное видео
        <br>
        <br>
    </div>

</div>

</body>
</html>
