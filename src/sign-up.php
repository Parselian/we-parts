<?
	require_once(__DIR__ . '/configs/db-cfg.php');


    $link = mysqli_connect($host, $username, $password, $database)
        or die('Connection error! ' . mysqli_error($link));

    if (isset($_COOKIE['id']) && isset($_COOKIE['hash']))
    {
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
            print "Привет, ".$userdata['NAME'].". Все работает!";
            header('Location: /profile');
            exit();
        }
    }
    else
        {
//            print "Включите куки!";
        }

	require_once(__DIR__ . '/modules/header.php');
?>


    <main class="container">
        <h1 class="inner-page__title">
            Создать учетную запись
        </h1>

        <div class="signup">
            <form action="/configs/register.php" method="POST" class="signup__col signup__form">
                <div class="signup__form-row">
                    <div class="form__input-wrap signup__form-input-wrap">
                        <label for="user_name" class="form__label signup__form-input-label">Имя <span
                                class="text_alert">*</span></label>
                        <input id="user_name" type="text" name="engineer_name" class="form__input signup__form-input" placeholder="Ваше имя"
                               required>
                    </div>
                    <div class="form__input-wrap signup__form-input-wrap">
                        <label for="user_name" class="form__label signup__form-input-label">Фамилия <span
                                class="text_alert">*</span></label>
                        <input id="user_name" type="text" name="engineer_surname" class="form__input signup__form-input"
							   placeholder="Ваша фамилия"
                               required>
                    </div>
                </div>
                <div class="form__input-wrap signup__form-input-wrap">
                    <label for="user_name" class="form__label signup__form-input-label">Телефон <span
                            class="text_alert">*</span></label>
                    <input id="user_name" type="text" name="engineer_phone" class="form__input signup__form-input" placeholder="Телефон"
                           required>
                </div>
                <div class="form__input-wrap signup__form-input-wrap">
                    <label for="user_name" class="form__label signup__form-input-label">Email <span
                            class="text_alert">*</span></label>
                    <input id="user_name" type="text" name="engineer_email" class="form__input signup__form-input" placeholder="Ваш e-mail"
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
                    <input id="user_name" type="text" name="engineer_password" class="form__input signup__form-input" required>
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