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

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
</head>
<body class="flex_stretch">
    <? require_once(__DIR__ . './modules/burger-menu.php') ?>

    <? require_once(__DIR__ . '/modules/header.php') ?>

    <main class="container contacts">
        <h1 class="inner-page__title">
             Гарантия и возврат
        </h1>

        <div class="refund-attention">
            <div class="refund-attention__text">Для того, чтобы оформить обмен или возврат товара, необходимо написать в один из мессенджеров</div>
            <ul class="refund-attention__list">
                <li class="refund-attention__list-item">
                    <svg class="refund-attention__list-item-icon">
                        <use xlink:href="./images/stack/sprite.svg#telegram"></use>
                    </svg>
                    <a href="#" class="refund-attention__list-item-text">Гарантийный отдел в Telegram</a>
                </li>
                <li class="refund-attention__list-item">
                    <svg class="refund-attention__list-item-icon">
                        <use xlink:href="./images/stack/sprite.svg#whatsapp"></use>
                    </svg>
                    <a href="#" class="refund-attention__list-item-text">Гарантийный отдел в WhatsApp</a>
                </li>
            </ul>
                <div class="refund-attention__text refund-attention__text_notice">Указать: Номер заказа, артикул
                    товара, причину возврата, приложить фотографии.</div>
                <div class="refund-attention__text">
                    Заявки на обмен или возврат товара обрабатываются в течении рабочего дня.
                </div>
                <div class="refund-attention__text">
                    Часы работы гарантийного отдела: Пн-Пт 10:00 до 18:00
                </div>
                <p class="refund-attention__text">
                    Просим обратить внимание на то, что возврат денежных средств на банковский счет осуществляется в
                    течение от 5 до 30 дней со дня предхявления соответствующего требования. В случае возврата
                    денежных средств за товар, предоставленный по средству дистанционной торговли (через ТК_, в
                    течение от 5 до 30 дней после получения нами реквизитов, по которым будет осуществлен денежный
                    перевод.
                </p>
        </div>

		<div class="refund__row">
			<div class="refund__col">
				<div class="refund__rules-title">Возврат товара надлежащего качества</div>
				<div class="refund__rules-text">Для возврата товара надлежащего качества должны быть соблюдены следующие
					условия:</div>
				<ul class="refund__rules-list">
					<li class="refund__rules-list-item">Срок возврата товара надлежащего качества составляет 14 дней,
						не
						считая
						дня его покупки (или вручения через транспортную компанию);</li>
					<li class="refund__rules-list-item">Полная комплектация товара;</li>
					<li class="refund__rules-list-item">Товар не был в употреблении;</li>
					<li class="refund__rules-list-item">Сохранен товарный вид;</li>
					<li class="refund__rules-list-item">Присутствуют пломбы, фабричные ярлыки;</li>
					<li class="refund__rules-list-item">Имеется товарный чек;</li>
					<li class="refund__rules-list-item">Возврат товара надлежащего качества может быть оформлен любым
						челоеком
						при наличии товарного чека (или транспортной накладной).</li>
				</ul>
				<div class="refund__rules-text">
					Возврат товара, предоставленного по средству дистанционной торговли (который был получен через
					транспортную компанию), осуществляется только по предварительному согласованию с нашим
					гарантийным отделом. Срок возврата товара надлежащего качества. Согласно законодательству
					Российской Федерации, срок возврата товара надлежащего качества составляет 14 дней, не считая
					дня его покупки.
				</div>
			</div>

			<div class="refund__col">
				<div class="refund__rules-title">Возврат товара ненадлежащего качества</div>
				<div class="refund__rules-text">Правила для возврата товара ненадлежащего качества:</div>
				<ul class="refund__rules-list">
					<li class="refund__rules-list-item">Возврат товара ненадлежащего качества осуществляется в течение
						гарантийного срока, указанного в товарном чеке;</li>
					<li class="refund__rules-list-item">Для обмкна товара ненаддлежащего качества на новый наличие
						кассового
						чека необязательно;</li>
					<li class="refund__rules-list-item">Сохранение товарного вида или целостности упаковка
						необязательно;
					</li>
					<li class="refund__rules-list-item">Фирменный стикер нашего магазина должен быть сохранен (у
						мелких
						товаров
						вместо стикера используется наш штамп);</li>
					<li class="refund__rules-list-item">Магазин вправе на свое усмотрение перед осуществлением
						гарантийного
						обслуживания принимать товар на диагностику для подтверждения заявленного клиентом дефекта. В
						случае, если заявленный дефект не будет выявлен, магазин вправе вернуть клиенту товар без
						возможности отказаться от исполнения договора купли-продажи и возврата уплаченной за
						указанный товар денежной суммы;
					</li>
					<li class="refund__rules-list-item">Возврат товара ненадлежащего качества может быть оформлен любым
						человеком при предъявлении товарного чека.</li>
					<li class="refund__rules-list-item">Гарантийный период на новый товар, предоставленный в качестве
						обмены
						бракованному, начинает свое исчисление с момента предоставления нового товара и
						соответствует сроку, указанному в товарном чеке. Срок возврата товара ненадлежащего
						качества в пределах гарантийного срока товара.</li>
				</ul>
			</div>
		</div>
    </main>

    <? require_once(__DIR__ . '/modules/footer.php') ?>
</body>
</html>