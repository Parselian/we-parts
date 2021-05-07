<?php
ini_set('error_reporting', E_ALL);
	 ini_set('display_errors', 1);
	 ini_set('display_startup_errors', 1);
    require_once(__DIR__.'/../configs/db-cfg.php');

    $device_group = $_GET['device_group'];
    $part_cats_data = [];

    $link = mysqli_connect($host, $username, $password, $database)
        or die('Connection error! ' . mysqli_error($link));

    $query = "SELECT * FROM PARTS_GROUP WHERE DEVICE_GROUP_URL = '". $device_group ."'";
    $part_cats = mysqli_query($link, $query)
        or die('Error getting part_categories data ' . mysqli_error($link));


    for ($i = 0; $i < mysqli_num_rows($part_cats); ++$i)
    {
        $part_cat = mysqli_fetch_row($part_cats);

        array_push($part_cats_data, $part_cat);
    }

    $part_cats = json_encode($part_cats_data);
    print_r($part_cats);


    mysqli_close($link);
