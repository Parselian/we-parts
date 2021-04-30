<?php

require_once(__DIR__.'/configs/db-cfg.php');

$_GET['url'] = strtr($_GET['url'],['.php'=>'']);
$parsed_url = parse_url($_GET['url']);
list($device_group, $part_url) = explode('/', $parsed_url['path']);



if ($device_group && !isset($part_url))
{
    $link = mysqli_connect($host, $username, $password, $database)
        or die('Error! ' . mysqli_error($link));
    $query = "SELECT DEVICE_GROUP_ID FROM DEVICE_GROUP WHERE DEVICE_GROUP_URL = '$device_group'";
    $_GET['device_group_id'] = mysqli_fetch_row(mysqli_query($link, $query))[0]
        or die('Error! ' . mysqli_error($link));
    mysqli_close($link);

    require_once(__DIR__.'/device.php');
}
else if ($part_url) {
    $link = mysqli_connect($host, $username, $password, $database)
        or die('Error! ' . mysqli_error($link));
    $query = "SELECT * FROM PARTS WHERE PART_URL = '$part_url'";
    $_GET['selected_part_data'] = mysqli_fetch_row(mysqli_query($link, $query))
        or die('Error! ' . mysqli_error($link));
    mysqli_close($link);

    require_once(__DIR__ . '/product-page.php');
}
else
{
    require_once(__DIR__ . '/404.php');
}
