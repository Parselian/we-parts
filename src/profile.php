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
//            print "Привет, ".$userdata['NAME'].". Все работает!";
        }
    }
    else
	{
		header('Location: /sign-in.php');
//		print "Включите куки!";
    }

	require_once(__DIR__ . '/modules/header.php');

?>

    <main class="container">
        <h1 class="inner-page__title">
            Добро пожаловать!
        </h1>
        <div class="inner-page__subtitle">
            На этой странице вы можете управлять всеми возможностями данного сервиса.
        </div>

        <div class="profile-main__links">
            <a href="/profile-update" class="profile-main__link">
                <span class="profile-main__link-title">Профиль</span>
                <span class="profile-main__link-text">Изменить email, пароль и другие данные профиля</span>
            </a>
            <a href="/profile-edit-goods" class="profile-main__link">
                <span class="profile-main__link-title">Товары</span>
                <span class="profile-main__link-text">Добавить новый товар, изменить цены на существующие</span>
            </a>
        </div>
    </main>

    <? require_once(__DIR__ . '/modules/footer.php') ?>

</body>
</html>