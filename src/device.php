<?
	require_once(__DIR__ . '/modules/header.php');
	print_r($_GET);
	$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	$device_group_id = $_GET['device_group_id'];
?>

<main class="container">
	<? require_once(__DIR__ . '/modules/breadcrumbs.php') ?>

	<div class="category-parts__mobile">
		<button class="category-parts__mobile-btn">Категории</button>

		<ul class="category-parts__mobile-list">
			<?
				$link = mysqli_connect($host, $username, $password, $database)
					or die('Error! ' . mysqli_error($link));
				$query = "SELECT * FROM PARTS_GROUP WHERE DEVICE_GROUP_ID = " . $_GET['device_group_id'] . "";
				$result = mysqli_query($link, $query)
					or die('Error! ' . mysqli_error($link));

				for ($i = 0; $i < mysqli_num_rows($result); ++$i)
				{
					$part_group = mysqli_fetch_row($result);
					/*
					  * $part_group[0] - part_group_id
					  * $part_group[1] - part_group_url
					  * $part_group[2] - device_group_id
					  * $part_group[3] - part_group_name
					*/

					?>
						<li class="category-parts__mobile-list-item">
							<button data-part-group="<?= $part_group[1]?>" class="category-parts__mobile-list-link">
								<?= $part_group[3]?>
							</button>
						</li>
					<?
				}

				mysqli_close($link);
			?>
		</ul>
	</div>

	<section class="category-parts">
		<?
			$link = mysqli_connect($host, $username, $password, $database)
				or die('Error! ' . mysqli_error($link));
			$query = "SELECT * FROM PARTS_GROUP WHERE DEVICE_GROUP_ID = " . $_GET['device_group_id'] . "";
			$result = mysqli_query($link, $query)
				or die('Error! ' . mysqli_error($link));

			for ($i = 0; $i < mysqli_num_rows($result); ++$i)
			{
				$part_group_desc = mysqli_fetch_row($result);

				/*
				  * $part_group[0] - part_group_id
				  * $part_group[1] - part_group_url
				  * $part_group[2] - device_group_id
				  * $part_group[3] - part_group_name
				*/

				?>
					<button class="tile tile_small" data-device="<?= $part_group_desc[1]?>">
						<svg class="tile__icon">
							<use xlink:href="/images/stack/sprite.svg#<?= $part_group_desc[1]?>"></use>
						</svg>
						<span class="tile__text"><?= $part_group_desc[3]?></span>
					</button>
				<?
			}
		?>
	</section>

	<div class="catalog">
		<div class="catalog__cards">
		<?
			$link = mysqli_connect($host, $username, $password, $database)
				or die('Error! ' . mysqli_error($link));
			/*------------ GETTING ALL PARTS DATA FROM THE PARTS TABLE -----------------------*/
			$get_parts_arr = "SELECT * FROM PARTS";
			$parts_arr = mysqli_query($link, $get_parts_arr)
				or die('Error! ' . mysqli_error($link));
			/*------------------------------- END --------------------------------------------*/

			/*------------ GETTING ALL PARTS DATA FROM THE PARTS TABLE -----------------------*/
			$get_cat_ids = "SELECT PARTS_GROUP_ID FROM PARTS_GROUP WHERE DEVICE_GROUP_ID = '$device_group_id'";
			$cat_ids_arr = mysqli_query($link, $get_cat_ids)
				or die('Error! ' . mysqli_error($link));
			/*------------------------------- END --------------------------------------------*/


			/*
			 * НУЖНО СДЕЛАТЬ ПРОВЕРКУ НА ТО, ЗАЛОГИНЕН ЛИ ПОЛЬЗОВАТЕЛЬ, И ЕСЛИ ДА - ПОДТЯНУТЬ ЦЕНЫ, СОГЛАСНО ЕГО ID,
			 * ЕСЛИ ЖЕ НЕТ - ВЗЯТЬ ЦЕНЫ ПОЛЬЗОВАТЕЛЯ ПОД ID РАВНЫМ 0
			 * */

			$get_part_prices = "SELECT * FROM PARTS_PRICES WHERE ENGINEER_ID = 0";
			$part_prices_arr = mysqli_query($link, $get_part_prices);




			for ($i = 0; $i < mysqli_num_rows($parts_arr); ++$i)
			{
				$part_data = mysqli_fetch_row($parts_arr);
				/*
				 * part_group[0] - PART_ID
				 * part_group[1] - PART_URL
				 * part_group[2] - PART_NAME
				 * part_group[3] - PARTS_GROUP_ID
				 * part_group[4] - PART_DESCRIPTION
				 * */

				for ($j = 0; $j < mysqli_num_rows($part_prices_arr); ++$j)
				{
					$part_price = mysqli_fetch_row($part_prices_arr);
					/*
					 * part_price[0] - ID (PRIMARY_KEY)
					 * part_price[1] - PARTS_PRICE
					 * part_price[2] - PARTS_QUANTITY
					 * part_price[3] - PARTS_PRICES_ID
					 * part_price[4] - ENGINEER_ID
					 * */

					if ($part_price[3] == $part_data[0]) {
						?>
							<div class="catalog__card">
								<picture>
									<img src="/images/<?= $part_data[1]?>.jpg" alt="<?= $part_data[2]?>" class="catalog__card-img">
									<source srcset="/images/webp/<?= $part_data[1]?>.webp" type="image/webp">
								</picture>

								<a href="<?= $url . '/' . $part_data[1]?>" class="catalog__card-title"><?= $part_data[2]?></a>

								<div class="catalog__card-row">
									<div class="catalog__card-col">
										<span class="catalog__card-price"><?= $part_price[1]?> &#8381;</span>
										<span class="catalog__card-wholesale">Опт <?= $part_price[1] ?> &#8381;</span>
									</div>

									<div class="catalog__card-col catalog__card-availability">
										Доступно: <span class="catalog__card-availability-stock"><?= $part_price[2]?> шт.</span>
									</div>
								</div>

								<div class="catalog__card-btns">
								<!--<input type="number" value="1" class="catalog__card-quantity">-->
									<div class="amount-input__wrap catalog__card-quantity">
										<input type="text" value="1" class="amount-input">
										<span class="amount-input__inc">+</span>
										<span class="amount-input__dec">-</span>
									</div>

									<button class="catalog__card-btn catalog__card-btn_cart">
										<svg class="catalog__card-btn-icon">
											<use xlink:href="/images/stack/sprite.svg#shopping-cart"></use>
										</svg>
										<span>Купить</span>
									</button>

									<a href="#" class="catalog__card-btn catalog__card-btn_now">
										<svg class="catalog__card-btn-icon">
											<use xlink:href="/images/stack/sprite.svg#clicking"></use>
										</svg>
										<span>Купить в 1 клик</span>
									</a>
								</div>
							</div>
						<?
						break;
					}
				}
			}
		?>
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