<?php
require_once(__DIR__ . '/configs/config.php');
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--    <link rel="stylesheet" href="./css/bootstrap-grid.min.css"> -->
	<link rel="stylesheet" href="./css/reset.css">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/fonts.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
		  rel="stylesheet">
	<title><?= $site_title ?></title>
</head>
<body class="flex_stretch">
    <? require_once(__DIR__ . './modules/burger-menu.php') ?>

    <? require_once(__DIR__ . '/modules/header.php') ?>

    <main class="container">
        <h1 class="inner-page__title">
            Добро пожаловать!
        </h1>
        <div class="inner-page__subtitle">
            На этой странице вы можете управлять всеми возможностями данного сервиса.
        </div>

        <div class="profile-main__links">
            <a href="#" class="profile-main__link">
                <span class="profile-main__link-title">Профиль</span>
                <span class="profile-main__link-text">Изменить email, пароль и другие данные профиля</span>
            </a>
            <a href="#" class="profile-main__link">
                <span class="profile-main__link-title">Товары</span>
                <span class="profile-main__link-text">Добавить новый товар, изменить цены на существующие</span>
            </a>
        </div>
    </main>

    <? require_once(__DIR__ . '/modules/footer.php') ?>

</body>
</html>