<?php
    require_once(__DIR__.'/../configs/db-cfg.php');

    $engineer_id = $_COOKIE['id'];
    $part_url = $_GET['part_url'];

    $link = mysqli_connect($host, $username, $password, $database)
        or die('Connection error! ' . mysqli_error($link));

    $query = mysqli_query($link, "SELECT * FROM PARTS_PRICES WHERE PART_URL = '".$part_url."' AND ENGINEER_ID = '". $engineer_id."' LIMIT 1")
        or die('Query error! ' . mysqli_error($link));

    $part_info = json_encode(mysqli_fetch_row($query));

    print_r($part_info);

    mysqli_close($link);
    return;