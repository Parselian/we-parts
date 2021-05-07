<?php
    ini_set('error_reporting', E_ALL);
	 ini_set('display_errors', 1);
	 ini_set('display_startup_errors', 1);
    require_once(__DIR__ . '/../configs/db-cfg.php');

    $selected_parts_group = $_GET['parts_group_url'];

    print_r($selected_parts_group);

    $link = mysqli_connect($host, $username, $password, $database)
        or die('Connection error! ' . mysqli_error($link));

    $get_parts = mysqli_query($link, "SELECT * FROM PARTS WHERE PARTS_GROUP_URL = '". $selected_parts_group ."'")
        or die('Error getting parts info ' . mysqli_error($link));

    $parts = mysqli_fetch_all($get_parts);
    print_r($parts);