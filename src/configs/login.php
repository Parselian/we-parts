<?php
    require_once(__DIR__.'/db-cfg.php');

    function generateHASH($length = 6) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $hash = "";
        $clen = strlen($chars) - 1;

        while (strlen($hash) < $length)
        {
            $hash .= $chars[mt_rand(0, $clen)];
        }

        return $hash;
    }

    $link = mysqli_connect($host, $username, $password, $database)
        or die('Error! ' . mysqli_error($link));

    if (isset($_POST))
    {
        $query = mysqli_query($link, "SELECT ENGINEER_ID, PASSWORD FROM ENGINEERS " .
            "WHERE EMAIL = '".mysqli_real_escape_string($link, $_POST['engineer_email'])."' LIMIT 1")
            or die('Error! ' . mysqli_error($link));
        $data = mysqli_fetch_assoc($query);

        if ($data['PASSWORD'] == md5(md5($_POST['engineer_password'])))
        {
            $hash = md5(generateHASH(10));

            mysqli_query($link, "UPDATE ENGINEERS SET ENGINEER_HASH = '".$hash."' WHERE ENGINEER_ID = '".$data['ENGINEER_ID']."'")
                or die('Error! ' . mysqli_error($link));

            setcookie("id", $data['ENGINEER_ID'], time() + 60 * 60 * 24 * 30, "/");
            setcookie("hash", $hash, time()+60*60*24*30, "/", null, 1, true); // httponly !!!

            header('Location: /configs/check-login.php');
            exit();
        }
        else
        {
            print 'Введён неверный логин/пароль';
        }
    }