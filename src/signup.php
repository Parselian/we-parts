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
            Создать учетную запись
        </h1>

        <div class="signup">
            <form action="#" method="POST" class="signup__col signup__form">
                <div class="signup__form-row">
                    <div class="form__input-wrap signup__form-input-wrap">
                        <label for="user_name" class="form__label signup__form-input-label">Имя <span
                                class="text_alert">*</span></label>
                        <input id="user_name" type="text" class="form__input signup__form-input" placeholder="Ваше имя"
                               required>
                    </div>
                    <div class="form__input-wrap signup__form-input-wrap">
                        <label for="user_name" class="form__label signup__form-input-label">Фамилия <span
                                class="text_alert">*</span></label>
                        <input id="user_name" type="text" class="form__input signup__form-input" placeholder="Ваша фамилия"
                               required>
                    </div>
                </div>
                <div class="form__input-wrap signup__form-input-wrap">
                    <label for="user_name" class="form__label signup__form-input-label">Телефон <span
                            class="text_alert">*</span></label>
                    <input id="user_name" type="text" class="form__input signup__form-input" placeholder="Телефон"
                           required>
                </div>
                <div class="form__input-wrap signup__form-input-wrap">
                    <label for="user_name" class="form__label signup__form-input-label">Email <span
                            class="text_alert">*</span></label>
                    <input id="user_name" type="text" class="form__input signup__form-input" placeholder="Ваш e-mail"
                           required>
                </div>
                <div class="form__input-wrap signup__form-input-wrap">
                    <label for="user_name" class="form__label signup__form-input-label">Пароль <span
                            class="text_alert">*</span></label>
                    <input id="user_name" type="text" class="form__input signup__form-input" required>
                </div>
                <div class="form__input-wrap signup__form-input-wrap">
                    <label for="user_name" class="form__label signup__form-input-label">Подтверждение пароля <span
                            class="text_alert">*</span></label>
                    <input id="user_name" type="text" class="form__input signup__form-input" required>
                </div>

                <div class="signup__form-footnote-wrap">
                    <input id="checkbox" type="checkbox" class="signup__footnote-check" required>
                    <label for="checkbox" class="signup__footnote-label">
                        Настоящим подтверждаю, что я ознакомлен и согласен с условиями политики конфиденциальности.
                    </label>
                </div>

                <button type="submit" class="form__submit signup__submit">Регистрация</button>
            </form>

            <div class="signup__col signup__features">
                <h2 class="signup__features-title">Преимущества зарегестрированного пользователя</h2>
                <ul class="signup__features-list">
                    <li class="signup__features-list-item">Отслеживание заказов на персональной странице</li>
                    <li class="signup__features-list-item">Возможность настроить магазин под себя для более удобных
                        покупок
                    </li>
                    <li class="signup__features-list-item">Ускоренное оформление последующих заказов</li>
                </ul>
            </div>
        </div>
    </main>

    <? require_once(__DIR__ . '/modules/footer.php') ?>

</body>
</html>