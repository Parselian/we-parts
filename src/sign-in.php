<?
	require_once(__DIR__.'/configs/db-cfg.php');

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
//		print "Включите куки!";
    }

	require_once(__DIR__ . '/modules/header.php');
?>

    <main class="container">
        <h1 class="inner-page__title">
            Войти
        </h1>

        <div class="signup">
            <form action="/configs/login.php" method="POST" class="signup__col signup__form">
				<div class="form__input-wrap signup__form-input-wrap">
                    <label for="user_email" class="form__label signup__form-input-label">E-mail <span
                            class="text_alert">*</span></label>
                    <input id="user_email" type="text" name="engineer_email" class="form__input signup__form-input" required>
                </div>
                <div class="form__input-wrap signup__form-input-wrap">
                    <label for="user_password" class="form__label signup__form-input-label">Пароль <span
                            class="text_alert">*</span></label>
                    <input id="user_password" type="text" name="engineer_password" class="form__input signup__form-input" required>
                </div>

				<div class="form__input-wrap signup__form-checkbox-wrap">
                    <input id="user_remember" type="checkbox" class="form__input signup__form-input">
                    <label for="user_remember" class="signup__form-checkbox-label">Запомнить</label>
                </div>

				<button type="submit" class="form__submit signup__form-submit">Войти</button>
            </form>

            <div class="signup__col signup__features">
                <a href="/sign-up" class="form__submit signup__form-submit">Создать учетную запись</a>
            </div>
        </div>
    </main>

    <? require_once(__DIR__ . '/modules/footer.php') ?>

</body>
</html>