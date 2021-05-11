'use-strict';

$(window).on('load', function() {
        /* -------------- PROFILE EDIT GOODS PAGE FUNCS --------------- */
    const toggleFormRows = (selector) => {
         $(selector)
            .css('opacity', 1)
            .slideUp(450)
            .animate(
                {opacity: 0},
                {queue: false, duration: 300}
            );

         setTimeout(() => {
                   $(selector)
                    .css('opacity', 0)
                    .slideDown(450)
                    .animate(
                        {opacity: 1},
                        {queue: false, duration: 400}
                    );
            }, 450)
    }

    const hideFormRows = (selector) => {
        $(selector)
            .css('opacity', 1)
            .slideUp(450)
            .animate(
                {opacity: 0},
                {queue: false, duration: 300}
            );
    }

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
           toggleFormRows('.category-parts__row');

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
        }

        const appendListItems = (data) => {
            $('#selected-category-part option').not('[name="option-disabled"]').remove();
            $('#selected-category-part').val('none');

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

        const fillPartsSelect = (data) => {
            $('#parts-list option').not(':disabled').remove();
            $('#parts-list').val('none');

            data.forEach(item => {
                $('#parts-list').append(`<option value="${item[1]}">${item[2]}</option>`)
            })
        }

        $.ajax({
            url: '/functions/get_parts.php',
            method: "GET",
            dataType: 'json',
            data: {
                parts_group_url: partsGroupUrl
            },
            success: function(data) {
                fillPartsSelect(data);
                toggleFormRows('.parts-list__row');
            }
        })
    }

    $(document).on('click', function(e) {
        const target = $(e.target);

        switch (true) {
            case !!target.parents('.tile-device').length || target.is('.tile-device'):
                toggleTiles(target, '.category-devices', '#selected-device', 'data-device');
                hideFormRows('.profile-edit-goods__row:not(:first-child)');
                getPartCatsInfo('#selected-device');
                break;
            case !!target.parents('.tile-part-group').length || target.is('.tile-part-group'):
                toggleTiles(target, '.category-parts', '#selected-part', 'data-part-cat');
                hideFormRows('.part-info__row');
                getPartsInfo('#selected-part');
                break;
            default:
                break;
        }
    })

    $('#selected-category-part').on('change', function() {
        $('#selected-part').val($(this).val());

        getPartsInfo('#selected-part');
    })

    $('#parts-list').on('change', function(e) {
        const target = $(e.target);

        $.ajax({
            url: '/functions/get_part_info.php',
            method: 'GET',
            dataType: 'json',
            data: {
                part_url: target.val()
            },
            success: function(data) {
                $('.profile-edit-goods__img').attr('src', `/images/${data[4]}.jpg`)
                $('#old-price').val(data[1]).attr('placeholder', `${data[1]} &#8381;`)
                $('#old-amount').val(data[2]).attr('placeholder', `${data[2]} шт.`)
               toggleFormRows('.part-info__row');
            }
        })
    })

    $('form#change-product-info-form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/functions/update_part_info.php',
            method: 'POST',
            data: {
                new_price: $('#new-price').val() ? $('#new-price').val() : $('#old-price').val(),
                new_amount: $('#new-amount').val() ? $('#new-amount').val() : $('#old-amount').val(),
                part_url: $('#parts-list').val()
            },
            success: function() {
                $(`.form__submit-label`).text('Успешно!')
                $(`.form__submit-label`).removeClass('form__submit-label_error').addClass('form__submit-label_success')
                setTimeout(() => {
                    $('.form__submit-label').text('')
                }, 3000)
            },
            error: function() {
                $(`.form__submit-label`).text('Произошла ошибка!')
                $(`.form__submit-label`).removeClass('form__submit-label_success').addClass('form__submit-label_error')
                setTimeout(() => {
                    $('.form__submit-label').text('')
                }, 3000)
            }
        })
    })
})