<?php
require_once(__DIR__.'/configs/db-cfg.php');



$_GET['url'] = strtr($_GET['url'],['.php'=>'']);
$parsed_url = parse_url($_GET['url']);
list($device_group, $part_group, $part_url) = explode('/', $parsed_url['path']);



$link = mysqli_connect($host, $username, $password, $database)
    or die('Error! ' . mysqli_error($link));
$get_device_group_id = "SELECT DEVICE_GROUP_ID FROM DEVICE_GROUP WHERE DEVICE_GROUP_URL = '$device_group'";
$device_group_id = mysqli_query($link, $get_device_group_id)
    or die('Error! ' . mysqli_error($link));

$get_selected_part_data = "SELECT * FROM PARTS WHERE PART_URL = '$part_url'";
$selected_part_data = mysqli_query($link, $get_selected_part_data)
    or die('Error! ' . mysqli_error($link));
mysqli_close($link);



if (mysqli_num_rows($device_group_id) > 0 && !isset($part_group))
{
    $_GET['device_group_url'] = $device_group;

    require_once(__DIR__.'/device.php');
}
else if (isset($part_group) && !isset($part_url)) {
    $_GET['device_group_url'] = $device_group;
    $_GET['selected_part_category'] = $part_group;

    require_once(__DIR__ . '/category-part.php');
}
else if (mysqli_num_rows($selected_part_data) > 0 && isset($part_url)) {
    $_GET['selected_part_data'] = $selected_part_data;

    require_once(__DIR__ . '/product-page.php');
}
else if (file_exists(__DIR__ . '/' . $device_group . '.php'))
{
    require_once (__DIR__ . '/' . $device_group .'.php');
}
else
{
    require_once (__DIR__ . '/404.php');
}