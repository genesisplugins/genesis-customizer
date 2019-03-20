(function (document, $) {
    if ($('.header-search').hasClass('full-screen')) {

        $('.header-search-toggle').on('click', function () {
            $('.header-search').toggleClass('visible');
        });

        $('.header-search-close').on('click', function () {
            $('.header-search').removeClass('visible');
        });

    } else {
        $('.header-search-toggle').on('click', function () {
            $('.header-search').slideToggle('fast');
        });
    }

})(document, jQuery);

