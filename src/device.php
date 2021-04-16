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
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
		  rel="stylesheet">
	<title><?= $site_title ?></title>
</head>
<body>

<? require_once(__DIR__ . './modules/burger-menu.php') ?>

<? require_once(__DIR__ . '/modules/header.php') ?>

<main class="container">

	<? require_once(__DIR__ . '/modules/breadcrumbs.php') ?>

	<div class="category-parts__mobile">
		<button class="category-parts__mobile-btn">Категории</button>

		<ul class="category-parts__mobile-list">
			<li class="category-parts__mobile-list-item">
				<a href="/product-page.php" class="category-parts__mobile-list-link">Охлаждение</a>
			</li>
			<li class="category-parts__mobile-list-item">
				<a href="/product-page.php" class="category-parts__mobile-list-link">Аккумулятор</a>
			</li>
			<li class="category-parts__mobile-list-item">
				<a href="/product-page.php" class="category-parts__mobile-list-link">Дисплей</a>
			</li>
			<li class="category-parts__mobile-list-item">
				<a href="/product-page.php" class="category-parts__mobile-list-link">Плата</a>
			</li>
			<li class="category-parts__mobile-list-item">
				<a href="/product-page.php" class="category-parts__mobile-list-link">Клавиатура</a>
			</li>
			<li class="category-parts__mobile-list-item">
				<a href="/product-page.php" class="category-parts__mobile-list-link">Зарядное ус-во</a>
			</li>
		</ul>
	</div>

	<section class="category-parts">
		<div class="tile tile_small" data-device="accumulator">
			<svg class="tile__icon">
				<use xlink:href="./images/stack/sprite.svg#accumulator"></use>
			</svg>
			<div class="tile__text">Аккумулятор</div>
		</div>

		<div class="tile tile_small" data-device="display">
			<svg class="tile__icon">
				<use xlink:href="./images/stack/sprite.svg#display-frame"></use>
			</svg>
			<div class="tile__text">Дисплей</div>
		</div>

		<div class="tile tile_small" data-device="cooling">
			<svg class="tile__icon">
				<use xlink:href="./images/stack/sprite.svg#cooling-system"></use>
			</svg>
			<div class="tile__text">Охлаждение</div>
		</div>

		<div class="tile tile_small" data-device="motherboard">
			<svg class="tile__icon">
				<use xlink:href="./images/stack/sprite.svg#motherboard"></use>
			</svg>
			<div class="tile__text">Плата</div>
		</div>

		<div class="tile tile_small" data-device="keyboard">
			<svg class="tile__icon">
				<use xlink:href="./images/stack/sprite.svg#keyboard"></use>
			</svg>
			<div class="tile__text">Клавиатура</div>
		</div>

		<div class="tile tile_small" data-device="charger">
			<svg class="tile__icon">
				<use xlink:href="./images/stack/sprite.svg#charger"></use>
			</svg>
			<div class="tile__text">зарядные ус-ва</div>
		</div>
	</section>

	<div class="catalog">
		<div class="catalog__cards">
			<div class="catalog__card">
				<picture>
					<img src="./images/keyboard-macbook-a1181.jpg" alt="" class="catalog__card-img">
					<source srcset="./images/webp/keyboard-macbook-a1181.webp" type="image/webp">
				</picture>

				<a href="#" class="catalog__card-title">Клавиатура MacBook 13 a1181 белая лавиатура MacBook 13 a1181
					белая</a>

				<div class="catalog__card-row">
					<div class="catalog__card-col">
						<span class="catalog__card-price">2 990 Р</span>
						<span class="catalog__card-wholesale">Опт 2 270 Р</span>
					</div>

					<div class="catalog__card-col catalog__card-availability">
						Доступно: <span class="catalog__card-availability-stock">1 шт.</span>
					</div>
				</div>

				<div class="catalog__card-btns">
					<input type="number" value="1" class="catalog__card-quantity">

					<button class="catalog__card-btn catalog__card-btn_cart">
						<svg class="catalog__card-btn-icon">
							<use xlink:href="./images/stack/sprite.svg#shopping-cart"></use>
						</svg>
						<span>Купить</span>
					</button>

					<a href="#" class="catalog__card-btn catalog__card-btn_now">
						<svg class="catalog__card-btn-icon">
							<use xlink:href="./images/stack/sprite.svg#clicking"></use>
						</svg>
						<span>Купить в 1 клик</span>
					</a>
				</div>
			</div>
			<div class="catalog__card">
				<picture>
					<img src="./images/keyboard-macbook-a1181.jpg" alt="" class="catalog__card-img">
					<source srcset="./images/webp/keyboard-macbook-a1181.webp" type="image/webp">
				</picture>

				<a href="#" class="catalog__card-title">Клавиатура MacBook 13 a1181 белая лавиатура MacBook 13 a1181
					белая</a>

				<div class="catalog__card-row">
					<div class="catalog__card-col">
						<span class="catalog__card-price">2 990 Р</span>
						<span class="catalog__card-wholesale">Опт 2 270 Р</span>
					</div>

					<div class="catalog__card-col catalog__card-availability">
						Доступно: <span class="catalog__card-availability-stock">1 шт.</span>
					</div>
				</div>

				<div class="catalog__card-btns">
					<input type="number" value="1" class="catalog__card-quantity">

					<button class="catalog__card-btn catalog__card-btn_cart">
						<svg class="catalog__card-btn-icon">
							<use xlink:href="./images/stack/sprite.svg#shopping-cart"></use>
						</svg>
						<span>Купить</span>
					</button>

					<a href="#" class="catalog__card-btn catalog__card-btn_now">
						<svg class="catalog__card-btn-icon">
							<use xlink:href="./images/stack/sprite.svg#clicking"></use>
						</svg>
						<span>Купить в 1 клик</span>
					</a>
				</div>
			</div>
			<div class="catalog__card">
				<picture>
					<img src="./images/keyboard-macbook-a1181.jpg" alt="" class="catalog__card-img">
					<source srcset="./images/webp/keyboard-macbook-a1181.webp" type="image/webp">
				</picture>

				<a href="#" class="catalog__card-title">Клавиатура MacBook 13 a1181 белая лавиатура MacBook 13 a1181
					белая</a>

				<div class="catalog__card-row">
					<div class="catalog__card-col">
						<span class="catalog__card-price">2 990 Р</span>
						<span class="catalog__card-wholesale">Опт 2 270 Р</span>
					</div>

					<div class="catalog__card-col catalog__card-availability">
						Доступно: <span class="catalog__card-availability-stock">1 шт.</span>
					</div>
				</div>

				<div class="catalog__card-btns">
					<input type="number" value="1" class="catalog__card-quantity">

					<button class="catalog__card-btn catalog__card-btn_cart">
						<svg class="catalog__card-btn-icon">
							<use xlink:href="./images/stack/sprite.svg#shopping-cart"></use>
						</svg>
						<span>Купить</span>
					</button>

					<a href="#" class="catalog__card-btn catalog__card-btn_now">
						<svg class="catalog__card-btn-icon">
							<use xlink:href="./images/stack/sprite.svg#clicking"></use>
						</svg>
						<span>Купить в 1 клик</span>
					</a>
				</div>
			</div>
			<div class="catalog__card">
				<picture>
					<img src="./images/keyboard-macbook-a1181.jpg" alt="" class="catalog__card-img">
					<source srcset="./images/webp/keyboard-macbook-a1181.webp" type="image/webp">
				</picture>

				<a href="#" class="catalog__card-title">Клавиатура MacBook 13 a1181 белая лавиатура MacBook 13 a1181
					белая</a>

				<div class="catalog__card-row">
					<div class="catalog__card-col">
						<span class="catalog__card-price">2 990 Р</span>
						<span class="catalog__card-wholesale">Опт 2 270 Р</span>
					</div>

					<div class="catalog__card-col catalog__card-availability">
						Доступно: <span class="catalog__card-availability-stock">1 шт.</span>
					</div>
				</div>

				<div class="catalog__card-btns">
					<input type="number" value="1" class="catalog__card-quantity">

					<button class="catalog__card-btn catalog__card-btn_cart">
						<svg class="catalog__card-btn-icon">
							<use xlink:href="./images/stack/sprite.svg#shopping-cart"></use>
						</svg>
						<span>Купить</span>
					</button>

					<a href="#" class="catalog__card-btn catalog__card-btn_now">
						<svg class="catalog__card-btn-icon">
							<use xlink:href="./images/stack/sprite.svg#clicking"></use>
						</svg>
						<span>Купить в 1 клик</span>
					</a>
				</div>
			</div>
		</div>

		<div class="catalog__controls">
			<button class="catalog__more">
				<div class="loader-icon loader-icon_active">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<span class="catalog__more-text">Показать еще 12 товаров</span>
			</button>

			<div class="catalog__pagination">
				<a href="#" class="catalog__pagination-arrow catalog__pagination-prev">
					&#8592; <span class="catalog__pagination-arrow-text">Назад</span>
				</a>

				<div class="catalog__pagination-dots">
					<a href="#" class="catalog__pagination-dot catalog__pagination-dot_active">1</a>
					<a href="#" class="catalog__pagination-dot">2</a>
					<a href="#" class="catalog__pagination-dot">3</a>
					<a href="#" class="catalog__pagination-dot">4</a>
					<a href="#" class="catalog__pagination-dot">5</a>
					<a href="#" class="catalog__pagination-dot">6</a>
				</div>

				<a href="#" class="catalog__pagination-arrow catalog__pagination-next">
					<span class="catalog__pagination-arrow-text">Вперёд</span> &#8594;
				</a>
			</div>
		</div>

		<p class="text">
			Комплектующие для ноутбука обеспечивают его корректную работу. Усли они плохого качества, то устройство
			может перестать работать, его срок службы значительно сократится. Выбирайте оригинальные адаптеры, платы,
			аккумуляторы и многое другое для ремонта техники Apple, и она будет исправно служить в дальнейшем.
		</p>
		<p class="text">
			В интернет-магазине компании <?= $company_name?> вы можете купить запчасти MacBook, MacBook Pro, MacBook
			Air и другой техники Apple. Работаем как с частными покупателями, так и поставляем оптом оригинальные
			запчасти MacBook Pro, Air для сервисных центров. Организуем оперативную доставку. Сы прямые поставщики,
			поэтому даем гарантию лучшей цены на комплектующие Apple.
		</p>
	</div>
</main>

<? require_once(__DIR__ . '/modules/footer.php'); ?>

</body>
</html>