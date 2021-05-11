'use-strict';

$(window).on('load', function() {
    if ($('.catalog__card').length < 20) {
        $('.catalog__controls').css('display', 'none')
    } else {
        $('.catalog__cards').slick({
            dots: true,
            rows: 5,
            slidesPerRow: 4,
            dotsClass: 'catalog__pagination'
        })
    }

    $('.catalog__card-title').text($('.catalog__card-title').text().substr(0, 60) + '...')

    $('.category-parts__mobile-btn').on('click', function() {
        $('.category-parts__mobile-list').slideToggle()
    })
})