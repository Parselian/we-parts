<?php
require_once(__DIR__ . '/configs/config.php');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--    <link rel="stylesheet" href="./css/bootstrap-grid.min.css"> -->
	<link rel="stylesheet" href="./css/reset.css">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
				rel="stylesheet">
	<title>title</title>
</head>
<body>
<? require_once(__DIR__ . './modules/burger-menu.php') ?>

<? require_once(__DIR__ . '/modules/header.php') ?>

<main class="container">
	<div class="tile tile_big promo">
		<h1 class="page__title tile__title">Запчасти для всех устройств Apple</h1>
		<picture>
			<img src="./images/index-promo-tile-bg.png" alt="запчасти Apple" class="tile__bg">
			<source srcset="./images/webp/index-promo-tile-bg.webp" type="image/webp">
		</picture>
	</div>

    <? require_once(__DIR__ . '/modules/category-devices.php') ?>

    <? require_once(__DIR__ . '/modules/category-common-parts.php') ?>

	<section class="about">
		<h2 class="about__title"><?= $company_name ?> - магазин запчастей Apple</h2>
		<p class="about__text">Интернет-магазин <?= $company_name ?> - крупная торговая площадка,
			специализирующаяся на продаже запчастей Apple. У нас вы сможете приобрести детали для
			MacBook, iMac, iPhone, iPad и другой техники Apple.</p>

		<h3 class="about__title">Запчасти для техники Apple</h3>
		<p class="about__text">Техника Apple сейчас очень популярна, поэтому и интернет-магазинов с запчастями для
			нее существует очень много. Тогда почему среди такого разнообразия стоит выбрать именно нас?</p>
		<div class="about__text">Причин несколько:</div>
		<ul class="about__list">
			<li class="about__list-item">у магазина самый крупный ассортимент оригинальных деталей для техники
				Apple, у нас вы точно найдете нужную запчасть для своего устройства;</li>
			<li class="about__list-item">мы предлагаем как оригинальные детали, так и практически ничем не
				отличимые от оригинала копии. Мы честно заявляем качество - наши изделия проходят технические
				проверки, чтобы на выходе мы могли быть уверены, что они точно подружатся с вашей техникой;</li>
			<li class="about__list-item">цены в <?= $company_name?> - доступные, наценки на представленный товар
				практически нет;</li>
			<li class="about__list-item">для оптовых клиентов мы предлагаем выгодные условия приобретения,
				сниженные цены, а также внутренние акции.</li>
		</ul>

		<h3 class="about__title">Как организована доставка</h3>
		<div class="about__text">Если вы находитесь в Санкт-Петербурге, получить свой заказ можно следующими
			способами:</div>
		<ul class="about__list">
			<li class="about__list-item">забрать в одном из пунктов самовывоза;</li>
			<li class="about__list-item">заказать курьерскую доставку по СПб.</li>
		</ul>

		<p class="about__text">А если запчасти нужны очень срочно, но возможности подъехатть на пункт самовывоза
			нет? В таком случае вы можете заказать сверхсрочную доставку в пределах СПб, согласно которой заказ
			доставляется в течение всего 2-х часов.
		</p>
		<p class="about__text">Купить запчасти Apple можно находясь в лубом регионе России и стран СНГ. На стоимость
			доставки влияет отдаленность места назначения и вес посылки. Для уточнения стоимости доставки следует
			написать нам на email или позвонить по телефону <a href="$phone_link" class="about__phone"><?=$phone_format?></a>
		</p>
	</section>
</main>

<? require_once(__DIR__ . '/modules/footer.php'); ?>
</body>
</html>