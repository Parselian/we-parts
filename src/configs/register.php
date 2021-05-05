<?php
    require_once(__DIR__ . '/db-cfg.php');

    $link = mysqli_connect($host, $username, $password, $database)
        or die('Error!' . mysqli_error($link));

    if (isset($_POST))
    {
        $err = [];


        switch (true) {
            case !preg_match("/[а-яА-Я]+$/", $_POST['engineer_name']):
                $err[] = "Имя может состоять только из букв русского алфавита";
                break;
            case !preg_match("/[а-яА-Я]+$/", $_POST['engineer_surname']):
                $err[] = "Фамилия может состоять только из букв русского алфавита";
                break;
            case strlen($_POST['engineer_name']) < 2 || strlen($_POST['engineer_name']) > 30:
                $err[] = "Имя не может быть меньше 2-ух букв или больше 30-ти";
                break;
            case strlen($_POST['engineer_password']) < 6;
                $err[] = "Пароль не может быть меньше 6-ти символов";
                break;
        }


        $query = mysqli_query($link, "SELECT ENGINEER_ID FROM ENGINEERS " .
            "WHERE EMAIL = '".mysqli_real_escape_string($link, $_POST['login'])."'");

        if (mysqli_num_rows($query) > 0)
        {
            $err[] = "Пользователь с таким почтовым ящиком уже существует!";
        }

        if (count($err) == 0)
        {
            $user_name = $_POST['engineer_name'];
            $user_surname = $_POST['engineer_surname'];
            $user_phone = $_POST['engineer_phone'];
            $user_email = $_POST['engineer_email'];

            $pwd = md5(md5(trim($_POST['engineer_password'])));

            mysqli_query($link, "INSERT INTO ENGINEERS SET " .
                "NAME = '".$user_name."', " .
                "SURNAME = '".$user_surname."', " .
                "EMAIL = '".$user_email."', " .
                "PASSWORD = '".$pwd."', " .
                "PHONE = '".$user_phone."', " .
                "ENGINEER_ID = 5");
            header("Location: /profile.php");
            exit();
        }
        else
        {
            print "<br>При регистрации произошли следующие ошибки:</b></br>";
            foreach ($err as $error)
            {
                print $error."</br>";
            }
        }
    }
    else
    {
        echo 'something wrong';
    }