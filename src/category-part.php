<?
	require_once(__DIR__ . '/modules/header.php');

	$device_group_url = $_GET['device_group_url'];
	$parts_group_url = $_GET['selected_part_category'];

	$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . $device_group_url;
?>

<main class="container">
	<? require_once(__DIR__ . '/modules/breadcrumbs.php') ?>

	<div class="category-parts__mobile">
		<button class="category-parts__mobile-btn">Категории</button>

		<ul class="category-parts__mobile-list">
			<?
				$link = mysqli_connect($host, $username, $password, $database)
					or die('Error! ' . mysqli_error($link));
				$query = "SELECT * FROM PARTS_GROUP WHERE DEVICE_GROUP_URL = '" . $device_group_url. "'";
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
							<a href="<?=$url .'/'. $part_group[1]?>" class="category-parts__mobile-list-link">
								<?= $part_group[3]?>
							</a>
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
			$query = "SELECT * FROM PARTS_GROUP WHERE DEVICE_GROUP_URL = '" . $device_group_url . "'";
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
				 * $part_group[4] - part_group_icon_url
				 */

				?>
					<a class="tile tile_small" href="<?= $url .'/'. $part_group_desc[1]?>">
						<svg class="tile__icon">
							<use xlink:href="/images/stack/sprite.svg#<?= $part_group_desc[4]?>"></use>
						</svg>
						<span class="tile__text"><?= $part_group_desc[3]?></span>
					</a>
				<?
			}
			mysqli_close($link);
		?>
	</section>

	<div class="catalog">
		<div class="catalog__cards">
		<?
			$link = mysqli_connect($host, $username, $password, $database)
				or die('Error! ' . mysqli_error($link));

			$engineer_id = (empty($_COOKIE['id'])) ? 0 : $_COOKIE['id'];
				$get_parts_arr = "SELECT * FROM PARTS WHERE PARTS_GROUP_URL = '".$parts_group_url."'";
				$parts_arr = mysqli_query($link, $get_parts_arr)
					or die ('Error! ' . mysqli_error($link));


				for ($j = 0; $j < mysqli_num_rows($parts_arr); ++$j)
				{
					$part_data = mysqli_fetch_row($parts_arr);
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

					$get_part_price = mysqli_query($link,
						"SELECT * FROM PARTS_PRICES WHERE PART_URL = '".$part_data[1]."' AND 
						ENGINEER_ID = '".$engineer_id."' LIMIT 1")
						or die ('Error! ' . mysqli_error($link));

					if (mysqli_num_rows($get_part_price) > 0)
					{
						$part_price = mysqli_fetch_row($get_part_price);
					}
					else
					{
						$get_part_price = mysqli_query($link,
						"SELECT * FROM PARTS_PRICES WHERE PART_URL = '".$part_data[1]."' AND 
						ENGINEER_ID = 0 LIMIT 1")
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

					  $url = $url . '/' . $parts_group_url . '/' . $part_data[1];
					?>
						<div class="catalog__card">
							<input type="hidden" value="<?=$part_data[3]?>">
							<picture>
								<img src="/images/<?= $part_data[1]?>.jpg" alt="<?= $part_data[2]?>" class="catalog__card-img">
								<source srcset="/images/webp/<?= $part_data[1]?>.webp" type="image/webp">
							</picture>

							<a href="<?= $url?>" class="catalog__card-title"><?=
								$part_data[2]?></a>

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

								<a href="<?= $url ?>" class="catalog__card-btn catalog__card-btn_cart">
									<svg class="catalog__card-btn-icon">
										<use xlink:href="/images/stack/sprite.svg#shopping-cart"></use>
									</svg>
									<span>Купить</span>
								</a>

								<a href="<?= $url?>" class="catalog__card-btn catalog__card-btn_now">
									<svg class="catalog__card-btn-icon">
										<use xlink:href="/images/stack/sprite.svg#clicking"></use>
									</svg>
									<span>Купить в 1 клик</span>
								</a>
							</div>
						</div>
					<?
			}
			mysqli_close($link);
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