<?


	/*---------------------- IS LOGGED CHECK --------------------------*/
    if (isset($_COOKIE['id']) && isset($_COOKIE['hash']))
    {
		require_once(__DIR__.'/configs/db-cfg.php');

		$link = mysqli_connect($host, $username, $password, $database)
			or die('Connection error! ' . mysqli_error($link));

        $id = $_COOKIE['id'];
        $query = mysqli_query($link, "SELECT * FROM ENGINEERS WHERE ENGINEER_ID = '".intval($id)."' LIMIT 1")
            or die('Error! ' . mysqli_error($link));
        $userdata = mysqli_fetch_assoc($query);

        if (($userdata['ENGINEER_HASH'] !== $_COOKIE['hash']) || ($userdata['ENGINEER_ID'] !== $_COOKIE['id']))
        {
            setcookie("id", "", time() - 3600*24*30*12, "/");
            setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true);
            print "Что-то пошло не так...";
        }
        else
        {
//            print "Привет, ".$userdata['NAME'].". Все работает!";
        }
    }
    else
    {
    	header('Location: /sign-in');
	}
	/*---------------------- IS LOGGED CHECK END --------------------------*/

	require_once(__DIR__ . '/modules/header.php');
?>

<main class="container profile-edit-goods">
	<h1 class="inner-page__title profile-edit-goods__page-title">
		Изменение данных о товарах
	</h1>

	<form action="#" method="POST" class="profile-edit-goods__page-form">

		<div class="profile-edit-goods__row">
			<h2 class="profile-edit-goods__title">Выберите тип устройства:</h2>
			<section class="category-devices">
				<input type="hidden" id="selected-device">

				<?
					$link = mysqli_connect($host, $username, $password, $database)
						or die('Connection error! ' . mysqli_error($link));

					$device_groups = mysqli_query($link, "SELECT * FROM DEVICE_GROUP")
						or die('Error! ' . mysqli_error($link));

					for ($i = 0; $i < mysqli_num_rows($device_groups); ++$i)
					{
						$device_group = mysqli_fetch_row($device_groups);
						/*
						 * $device_group[0] = DEVICE_GROUP_ID
						 * $device_group[1] = DEVICE_GROUP_URL
						 * $device_group[2] = DEVICE_GROUP_NAME
						 * */

						?>
							<div class="tile tile_small tile-device" data-device="<?=$device_group[1]?>">
								<svg class="tile__icon">
									<use xlink:href="./images/stack/sprite.svg#<?=$device_group[1]?>"></use>
								</svg>
								<div class="tile__text">на <?=$device_group[2]?></div>
							</div>
						<?
					}
				?>
			</section>
		</div>

		<div class="profile-edit-goods__row">
			<h2 class="profile-edit-goods__title">Выберите тип запчасти:</h2>

			<select name="selected-cat-part" id="selected-category-part" class="profile-edit-goods__select
			profile-edit-goods__select_mobile">
				<option name="option-disabled" disabled selected>Выберите тип запчасти</option>
			</select>

			<section class="category-parts">
				<input type="hidden" id="selected-part">

			</section>
		</div>

		<div class="profile-edit-goods__row">
			<h2 class="profile-edit-goods__title">Выберите запчасть:</h2>

			<select name="parts-list" id="parts-list" class="profile-edit-goods__select">
				<option val="none" disabled selected>Выберите запчасть</option>
				<option val="1">Аккумулятор MacBook Air B11309</option>
				<option val="2">Аккумулятор MacBook Air B11309</option>
				<option val="3">Аккумулятор MacBook Air B11309</option>
				<option val="4">Аккумулятор MacBook Air B11309</option>
			</select>
				<!--<div class="profile-edit-goods__select">
					<div class="profile-edit-goods__select-input-wrap">
						<div class="profile-edit-goods__select-input" data-part="">Аккумулятор MacBook Air B11309</div>
						<svg class="profile-edit-goods__select-input-icon">
							<use xlink:href="./images/stack/sprite.svg#arrow"></use>
						</svg>
					</div>
					<ul class="profile-edit-goods__select-list">
						<li class="profile-edit-goods__select-list-item" data-val="">Аккумулятор MacBook Air B11309</li>
						<li class="profile-edit-goods__select-list-item" data-val="">Аккумулятор MacBook Air B11309</li>
						<li class="profile-edit-goods__select-list-item" data-val="">Аккумулятор MacBook Air B11309</li>
						<li class="profile-edit-goods__select-list-item" data-val="">Аккумулятор MacBook Air B11309</li>
					</ul>
				</div>-->
		</div>

		<div class="profile-edit-goods__row">
			<img src="./images/macbook-batteries.jpg" alt="" class="profile-edit-goods__img">
		</div>

		<div class="profile-edit-goods__row">
			<div class="profile-edit-goods__row-inputs">
				<div class="profile-edit-goods__input-wrap">
					<label for="old-price" class="form__label profile-edit-goods__label">Текущая цена</label>
					<input id="old-price" type="text" class="form__input profile-edit-goods__input" disabled>
				</div>
				<div class="profile-edit-goods__input-wrap">
					<label for="new-price" class="form__label profile-edit-goods__label">Новая цена</label>
					<input id="new-price" rows="10" type="text" class="form__input profile-edit-goods__input" placeholder="Введите цену">
				</div>
			</div>

			<div class="profile-edit-goods__row-inputs">
				<div class="profile-edit-goods__input-wrap">
					<label for="old-amount" class="form__label profile-edit-goods__label">Текущее кол-во</label>
					<input id="old-amount" type="text" class="form__input profile-edit-goods__input" disabled>
				</div>
				<div class="profile-edit-goods__input-wrap">
					<label for="new-amount" class="form__label profile-edit-goods__label">Новое кол-во</label>
					<input id="new-amount" rows="10" type="text" class="form__input profile-edit-goods__input" placeholder="Введите новое кол-во">
				</div>
			</div>

<!--			<div class="profile-edit-goods__row-inputs profile-edit-goods__row-edit-names">-->
<!--				<div class="profile-edit-goods__input-wrap">-->
<!--					<label for="old-name" class="form__label profile-edit-goods__label">Текущее название</label>-->
<!--					<textarea id="old-name" rows="5" type="text" class="form__textarea profile-edit-goods__input" disabled>Аккумулятор MacBook Air B11922 5000mAh новый</textarea>-->
<!--				</div>-->
<!--				<div class="profile-edit-goods__input-wrap">-->
<!--					<label for="new-name" class="form__label profile-edit-goods__label">Новое название</label>-->
<!--					<textarea id="new-name" rows="5" type="text" class="form__textarea profile-edit-goods__input"-->
<!--							  placeholder="Введите новое название"></textarea>-->
<!--				</div>-->
<!--			</div>-->
		</div>

		<button type="submit" class="form__submit profile-edit-goods__form-button">Обновить данные</button>
	</form>

</main>

<? require_once(__DIR__ . '/modules/footer.php') ?>
</body>
</html>
