'use-strict';

$(window).on('load', function() {
    if ($('.catalog__card').length < 20) {
        $('.catalog__controls').css('display', 'none')
    } else {
        $('.catalog__controls').css('display', 'none')
        $('.catalog__cards').slick({
            dots: true,
            rows: 5,
            slidesPerRow: 4,
            adaptiveHeight: true,
            swipe: false,
            lazyLoad: 'ondemand',
            dotsClass: 'catalog__pagination',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        rows: 6,
                        slidesPerRow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        rows: 6,
                        slidesPerRow: 2
                    }
                }
            ]
        })
    }

    $('.catalog__card-title').each((i, item) => {
        $(item).text($(item).text().substr(0, 60) + '...')
    })


    $('.category-parts__mobile-btn').on('click', function() {
        $('.category-parts__mobile-list').slideToggle()
    })
})