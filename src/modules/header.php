<header class="header">
    <div class="container">
        <div class="header__top">
			<picture>
				<source srcset="./images/webp/logo-white.webp" type="image/webp">
				<img src="./images/logo-white.png" alt="лого" class="logo header__logo header__logo_mobile">
			</picture>

			<nav class="header__top-list header__top-list_mobile">
				<a href="tel:<?=$phone_link?>" class="header__top-list-item">
					<svg class="header__top-list-icon">
						<use xlink:href="./images/stack/sprite.svg#phone-call"></use>
					</svg>
				</a>
				<a href="#" class="header__top-list-item">
					<svg class="header__top-list-icon">
						<use xlink:href="./images/stack/sprite.svg#placeholder"></use>
					</svg>
				</a>
				<a href="#" class="header__top-list-item">
					<svg class="header__top-list-icon">
						<use xlink:href="./images/stack/sprite.svg#user"></use>
					</svg>
				</a>
				<a href="#" class="header__top-list-item">
					<svg class="header__top-list-icon">
						<use xlink:href="./images/stack/sprite.svg#shopping-cart"></use>
					</svg>
				</a>
			</nav>

			<nav class="header__top-list header__top-list_desktop">
				<a href="#" class="header__top-list-item">О нас</a>
				<a href="#" class="header__top-list-item">Отзывы</a>
				<a href="#" class="header__top-list-item">Контакты</a>
			</nav>
        </div>

        <div class="header__main">
			<div class="header__col">
				<label for="check" class="burger-btn">
					<input type="checkbox" id="check"/>
					<span></span>
					<span></span>
					<span></span>
				</label>
				<picture>
					<source srcset="./images/webp/logo-white.webp" type="image/webp">
					<img src="./images/logo-white.png" alt="лого" class="logo header__logo header__logo_desktop">
				</picture>
			</div>

			<a href="tel:<?= $phone_link?>" class="header__main-search header__search-phone_mobile">
				<?= $phone_format?>
				<svg class="header__main-search-icon">
					<use xlink:href="./images/stack/sprite.svg#phone-call"></use>
				</svg>
			</a>

            <ul class="header__contacts">
                <li class="header__contacts-item">
                    <a href="<?= $phone_link?>" class="header__contacts-link">
                        <svg class="header__contacts-item-icon">
                            <use xlink:href="./images/stack/sprite.svg#phone-call"></use>
                        </svg>
                        <span class="header__contacts-item-text"><?= $phone_format;?></span>
                    </a>
                </li>
                <li class="header__contacts-item">
                    <svg class="header__contacts-item-icon">
                        <use xlink:href="./images/stack/sprite.svg#user"></use>
                    </svg>
                    <span class="header__contacts-item-text">Аккаунт</span>
                </li>
                <li class="header__contacts-item">
                    <svg class="header__contacts-item-icon">
                        <use xlink:href="./images/stack/sprite.svg#shopping-cart"></use>
                    </svg>
                    <span class="header__contacts-item-text">Корзина</span>
                </li>
            </ul>
        </div>
    </div>
</header>