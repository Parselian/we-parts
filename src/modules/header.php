<header class="header">
    <div class="container">
        <div class="header__top">
            <nav class="header__top-list">
                <a href="#" class="header__top-list-item">О нас</a>
                <a href="#" class="header__top-list-item">Отзывы</a>
                <a href="#" class="header__top-list-item">Контакты</a>
            </nav>
        </div>

        <div class="header__main">
            <svg class="logo header__logo">
                <use xlink:href=""></use>
            </svg>
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