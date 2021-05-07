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
                console.log(list)
                list.addClass('footer__list_open').slideDown()
            }

            $(this).find('.footer__col-title-icon').toggleClass('footer__col-title-icon_active')
        })
    }

    $('.header__contacts-item').on('click', function(e) {
        $(this).toggleClass('header__contacts-item_active')
        $(this).find('.header__contacts-popup').toggleClass('header__contacts-popup_open')
    })



    const toggleTiles = (target, parentSelector, hiddenInputId, dataAttr) => {
        if (target.closest('.tile') && target.closest(parentSelector)) {
            $('select[name="selected-part"]').prop('selectedIndex', 0);
            $(`${parentSelector} .tile`).removeClass('tile_small-active');
            $(target).closest('.tile').addClass('tile_small-active');

            $(hiddenInputId).attr('value', $(parentSelector).find('.tile_small-active').attr(dataAttr));
        }
    }

    const getPartCatsInfo = (selector) => {
        const appendTiles = (data) => {
            $('.category-parts')
                .css('opacity', 1)
                .slideUp(450)
                .animate(
                    {opacity: 0},
                    {queue: false, duration: 300}
                );

            setTimeout(() => {
                $('.category-parts .tile').remove();

                data.forEach(( item ) => {
                    $('.category-parts').append(`
                        <div class="tile tile_small tile-part-group" data-part-cat="${item[1]}">
                            <svg class="tile__icon">
                                <use xlink:href="./images/stack/sprite.svg#${item[3]}"></use>
                            </svg>
                            <div class="tile__text">${item[2]}</div>
                        </div>
                    `)
                })
            }, 310)

            setTimeout(() => {
                   $('.category-parts')
                    .css('opacity', 0)
                    .slideDown(450)
                    .animate(
                        {opacity: 1},
                        {queue: false, duration: 400}
                    );
            }, 450)
        }

        const appendListItems = (data) => {
            $('#selected-category-part option').not('[name="option-disabled"]').remove();
            $('#selected-category-part option[disabled]').attr('selected');

            data.forEach(( item ) => {
                $('#selected-category-part').append(`<option value="${item[1]}">${item[2]}</option>`)
            })
        }

        $.ajax({
            url: "/functions/get_part_cats.php",
            method: "GET",
            dataType: 'json',
            data: {
                device_group: $(selector).val()
            },
            success: function(data) {
                appendListItems(data);

                appendTiles(data);
            }
        })
    }

    const getPartsInfo = (selector) => {
        const partsGroupUrl = $(selector).val() ? $(selector).val() : $('#selected-category-part').val();
        $.ajax({
            url: '/functions/get_parts.php',
            method: 'GET',
            data: {
                parts_group_url: partsGroupUrl
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
            }
        })
    }

    /*-------------- PROFILE EDIT GOODS PAGE FUNCS ---------------*/
    $(document).on('click', function(e) {
        const target = $(e.target);


        if (!!target.parents('.tile-device').length || target.is('.tile-device')) {
            toggleTiles(target, '.category-devices', '#selected-device', 'data-device');
            getPartCatsInfo('#selected-device');
            return;
        }


        if (!!target.parents('.tile-part-group').length || target.is('.tile-part-group')) {
            toggleTiles(target, '.category-parts', '#selected-part', 'data-part-cat');
            getPartsInfo('#selected-part');
            return;
        }
    })

    $('#selected-part').on('change', function(e) {
        const selectedDeviceVal = $('#selected-device').val(),
            selectedPartVal = $('#selected-part').val();


    })
});