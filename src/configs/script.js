'use-strict';

$(window).on('load', function() {
    $('.burger-btn').on('click', function() {
        if ($(this).find('input').is(':checked')) {
            $('.burger-menu').toggleClass('burger-menu_open')
        }
    })

    if ($(window).width() < 900) {
        $('.footer__col-title').on('click', function() {
            const list = $(this).find('.footer__list');

            if (list.hasClass('footer__list_open')) {
                list.removeClass('footer__list_open').slideUp()
            } else {
                list.addClass('footer__list_open').slideDown()
            }

            $(this).find('.footer__col-title-icon').toggleClass('footer__col-title-icon_active')
        })
    }

    $('.header__contacts-item').on('click', function(e) {
        $(this).toggleClass('header__contacts-item_active')
        $(this).find('.header__contacts-popup').toggleClass('header__contacts-popup_open')
    })





});