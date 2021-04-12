<?php
    require_once(__DIR__ . '/configs/config.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="./css/bootstrap-grid.min.css"> -->
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>title</title>
</head>
<body>
    <? require_once(__DIR__ . '/modules/header.php') ?>

    <main class="container">
        <div class="tile tile_big promo">
            <h1 class="page__title tile__title">Запчасти для всех устройств Apple</h1>
            <picture>
                <img src="./images/index-promo-tile-bg.png" alt="запчасти Apple" class="tile__bg">
                <source srcset="./images/webp/index-promo-tile-bg.webp" type="image/webp">
            </picture>
        </div>

        <section class="category-devices">
            <div class="tile tile_small" data-device="macbook">
                <svg class="tile__icon">
                    <use xlink:href="./images/stack/sprite.svg#macbook"></use>
                </svg>
                <div class="tile__text">На MacBook</div>
            </div>
            <div class="tile tile_small" data-device="imac">
                <svg class="tile__icon">
                    <use xlink:href="./images/stack/sprite.svg#imac"></use>
                </svg>
                <div class="tile__text">На iMac</div>
            </div>
            <div class="tile tile_small" data-device="iphone">
                <svg class="tile__icon">
                    <use xlink:href="./images/stack/sprite.svg#iphone"></use>
                </svg>
                <div class="tile__text">На iPhone</div>
            </div>
            <div class="tile tile_small" data-device="ipad">
                <svg class="tile__icon">
                    <use xlink:href="./images/stack/sprite.svg#ipad"></use>
                </svg>
                <div class="tile__text">На iPad</div>
            </div>
            <div class="tile tile_small" data-device="apple-watch">
                <svg class="tile__icon">
                    <use xlink:href="./images/stack/sprite.svg#apple-watch"></use>
                </svg>
                <div class="tile__text">На Watch</div>
            </div>
        </section>

        section.category-
    </main>
</body>
</html>