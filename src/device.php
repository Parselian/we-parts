<?
	require_once(__DIR__ . '/modules/header.php');
	$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	$device_group_url = $_GET['device_group_url'];
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
							<a href="<?= $url . '/' . $part_group[1]?>" class="category-parts__mobile-list-link">
								<?= $part_group[2]?>
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
							<use xlink:href="/images/stack/sprite.svg#<?= $part_group_desc[3]?>"></use>
						</svg>
						<span class="tile__text"><?= $part_group_desc[2]?></span>
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


			/*------------ GETTING ALL PARTS DATA FROM THE PARTS TABLE -----------------------*/
			$get_cat_ids = "SELECT PARTS_GROUP_URL FROM PARTS_GROUP WHERE DEVICE_GROUP_URL = '$device_group_url'";
			$cat_urls_arr = mysqli_query($link, $get_cat_ids)
				or die('Error! ' . mysqli_error($link));
			/*------------------------------- END --------------------------------------------*/

			$engineer_id = (empty($_COOKIE['id'])) ? 0 : $_COOKIE['id'];

			for ($i = 0; $i < mysqli_num_rows($cat_urls_arr); ++$i)
			{
				$cat_url = mysqli_fetch_row($cat_urls_arr)[0];

				$get_parts_arr = "SELECT * FROM PARTS WHERE PARTS_GROUP_URL = '".$cat_url."'";
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
						$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
						$url = $url . '/' . $part_data[4] . '/' . $part_data[1];
					?>
						<div class="catalog__card">
							<input type="hidden" value="<?=$part_data[3]?>">
							<?
								if (!file_exists(__DIR__ . '/images/' . $part_data[1] . '.jpg') &&
								!file_exists(__DIR__ . '/images/webp/' . $part_data[1] . '.webp'))
								{
									$photo_url = 'no_photo';
								}
								else
								{
									$photo_url = $part_data[1];
								}
							?>
							<picture>
								<img src="/images/<?= $photo_url?>.jpg" alt="<?= $part_data[2]?>" class="catalog__card-img">
								<source srcset="/images/webp/<?= $photo_url?>.webp" type="image/webp">
							</picture>

							<a href="<?= $url ?>" class="catalog__card-title"><?= $part_data[2]?></a>

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

								<a href="<?= $url ?>" class="catalog__card-btn catalog__card-btn_now">
									<svg class="catalog__card-btn-icon">
										<use xlink:href="/images/stack/sprite.svg#clicking"></use>
									</svg>
									<span>Купить в 1 клик</span>
								</a>
							</div>
						</div>
					<?
				}
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

		<p class="text" style="margin-top: 40px">
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
<script src="/configs/catalog.js"></script>
</body>
</html>