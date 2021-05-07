<?
	require_once(__DIR__ . '/modules/header.php');

	$engineer_id = empty($_COOKIE['id']) ? 0 : $_COOKIE['id'];
	$part_data = mysqli_fetch_row($_GET['selected_part_data']);
	/*
	 * $part_data[0] - PART_ID
	 * $part_data[1] - PART_URL
	 * $part_data[2] - PART_NAME
	 * $part_data[3] - PART_DESCRIPTION
	 * $part_data[4] - PARTS_GROUP_URL
	 * */

	/*---------------------------------------------------------------------------------------------------------
	 * Достаем цены для залогиненого инженера и если инженер не залогинен или уникальная цена не найдена,
	 * то берем дефолтную цену (пользователя с ENGINEER_ID 0) */

	$link = mysqli_connect($host, $username, $password, $database)
	or die('Error!' . mysqli_error($link));
	$get_part_price = mysqli_query($link,
	    "SELECT * FROM PARTS_PRICES WHERE PART_URL = '" . $part_data[1] . "' AND 
							ENGINEER_ID = '" . $engineer_id . "' LIMIT 1")
	or die ('Error! ' . mysqli_error($link));

	if (mysqli_num_rows($get_part_price) > 0) {
	    $part_price = mysqli_fetch_row($get_part_price);
	} else {
	    $get_part_price = mysqli_query($link,
	        "SELECT * FROM PARTS_PRICES WHERE PART_URL = '" . $part_data[1] . "' AND 
							ENGINEER_ID = '".$engineer_id."' LIMIT 1")
	    or die ('Error! ' . mysqli_error($link));

	    $part_price = mysqli_fetch_row($get_part_price);
	}

	/*
	 * part_price[0] - ID (PRIMARY_KEY)
	 * part_price[1] - PARTS_PRICE
	 * part_price[2] - PARTS_QUANTITY
	 * part_price[3] - PARTS_PRICES_ID
	 * part_price[4] - ENGINEER_ID
	 * */

	/*----------------------------- КОНЕЦ ПРОВЕРКИ НА ЗАЛОГИНЕННОСТЬ -------------------------------------------*/
?>

<main class="container">
    <? require_once(__DIR__ . '/modules/breadcrumbs.php') ?>

	<div class="product">
		<div class="product__row product__general">
			<div class="product__col product__img-wrap">
				<picture>
					<source srcset="/images/webp/<?= $part_data[1] ?>.webp" type="image/webp">
					<img src="/images/<?= $part_data[1] ?>.jpg" alt="<?= $part_data[2] ?>" class="product__img">
				</picture>
			</div>

			<div class="product__col product__form-wrap">
				<form action="" method="POST" class="product__form">
					<div class="product__form-vendor">Артикул: <?= $part_data[1] ?></div>

					<div class="product__form-row">
						<div class="product__form-col">
							<div class="product__form-price"><?= $part_price[1] ?> &#8381;</div>
							<div class="product__form-wholesale">Опт <?= $part_price[1] ?> &#8381;</div>

							<div class="amount-input__wrap">
								<span class="amount-input__label">Кол-во:</span>
								<input type="text" value="1" class="amount-input">
								<span class="amount-input__inc">+</span>
								<span class="amount-input__dec">-</span>
							</div>

							<button class="product__form-btn product__form-btn-cart">
								<svg class="product__form-btn-icon">
									<use xlink:href="/images/stack/sprite.svg#shopping-cart"></use>
									<span>В корзину</span>
								</svg>
							</button>

							<button type="submit" class="product__form-btn product__form-btn-now">Купить в 1 клик</button>
						</div>

						<div class="product__form-col">
							<div class="product__form-features">
								<div class="product__form-feature">
									<span class="product__form-feature-title">Гарантия</span>
									<span class="product__form-feature-separator"></span>
									<span class="product__form-feature-text">3 мес</span>
								</div>
							</div>

							<div class="product__form-availability">
								<h4 class="product__form-availability-title">Наличие в магазинах:</h4>

								<div class="product__form-availability-place">
									<svg class="product__form-availability-place-icon">
										<use xlink:href="/images/stack/sprite.svg#delivery-truck"></use>
									</svg>
									<span class="product__form-availability-place-name">Склад</span>
									<span class="product__form-availability-place-stock"><?= $part_price[2] ?></span>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="product__row product__about">
			<div class="product__specifications">
				<h2 class="product__about-title">Характеристики</h2>

				<div class="product__specifications-wrap">
					<div class="product__specification">
						<span class="product__specification-title">Гарантия</span>
						<span class="product__specification-val">3 мес.</span>
					</div>
					<div class="product__specification">
						<span class="product__specification-title">Категория</span>
						<span class="product__specification-val">Аккумуляторы</span>
					</div>
					<div class="product__specification">
						<span class="product__specification-title">Качество</span>
						<span class="product__specification-val">ААА</span>
					</div>
					<div class="product__specification">
						<span class="product__specification-title">Модель</span>
						<span class="product__specification-val">А1181</span>
					</div>
					<div class="product__specification">
						<span class="product__specification-title">Напряжение</span>
						<span class="product__specification-val">10.8V</span>
					</div>
					<div class="product__specification">
						<span class="product__specification-title">Тип</span>
						<span class="product__specification-val">Li-ion</span>
					</div>
					<div class="product__specification">
						<span class="product__specification-title">Энергоёмкость</span>
						<span class="product__specification-val">55Wh / 5600mAh</span>
					</div>
				</div>
			</div>

			<div class="product__description">
				<h2 class="title product__about-title">Описание товара</h2>
                <?= $part_data[3] ?>
			</div>
		</div>
	</div>
</main>

<? require_once(__DIR__ . '/modules/footer.php'); ?>

</body>
</html>
