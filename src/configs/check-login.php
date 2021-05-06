<?php
    require_once(__DIR__ . '/db-cfg.php');


    $link = mysqli_connect($host, $username, $password, $database)
        or die('Connection error! ' . mysqli_error($link));

    if (isset($_COOKIE['id']) && isset($_COOKIE['hash']))
    {
        $id = $_COOKIE['id'];
        $query = mysqli_query($link, "SELECT * FROM ENGINEERS WHERE ENGINEER_ID = '".intval($id)."' LIMIT 1")
            or die('Error! ' . mysqli_error($link));
        $userdata = mysqli_fetch_assoc($query);

        if (($userdata['ENGINEER_HASH'] !== $_COOKIE['hash']) || ($userdata['ENGINEER_ID'] !== $_COOKIE['id']))
        {
            setcookie("id", "", time() - 3600*24*30*12, "/");
            setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true);
            print "Что-то пошло не так...";
        }
        else
        {
            print "Привет, ".$userdata['NAME'].". Все работает!";
            header('Location: /profile');
            exit();
        }
    }
    else
        {
            header('Location: /sign-in');
            print "Включите куки!";
        }
