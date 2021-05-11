<?php
    require_once(__DIR__ . '/../configs/db-cfg.php');

    $new_price = $_POST['new_price'];
    $new_amount = $_POST['new_amount'];
    $engineer_id = $_COOKIE['id'];
    $part_url = $_POST['part_url'];

    $link = mysqli_connect($host, $username, $password, $database)
        or die('Connection error! ' . mysqli_error($link));

    $query = mysqli_query($link, "UPDATE PARTS_PRICES SET PARTS_PRICE = '".$new_price."', PARTS_QUANTITY = '".(int)$new_amount."'
    WHERE ENGINEER_ID = '".$engineer_id."' AND PART_URL = '".$part_url."'")
        or die('Query error! '. mysqli_error($link));


    mysqli_close($link);
    return true;