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

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
</head>
<body class="flex_stretch">
    <? require_once(__DIR__ . './modules/burger-menu.php') ?>

    <? require_once(__DIR__ . '/modules/header.php') ?>

    <main class="container notfound">
		<div class="notfound__wrap">
			<picture>
				<img src="./images/404.png" alt="" class="notfound__img">
				<source srcset="./images/webp/404.webp" type="image/webp">
			</picture>
			<div class="notfound__info">
				<h1 class="inner-page__title notfound__title">Извините!</br>Мы не смогли найти то, что вы искали.</h1>
				<div class="notfound__text">Запрашиваемая страница не найдена.</div>
				<div class="notfound__links">
					<a href="#" class="notfound__link">Вернуться на главную</a>
				</div>
			</div>
		</div>
    </main>

    <? require_once(__DIR__ . '/modules/footer.php') ?>
</body>
</html>