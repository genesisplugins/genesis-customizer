(function (document, $) {

    $(window).on("load resize scroll", function () {
        var header = $('.site-header');
        var height = header.outerHeight();
        var scroll = $(window).scrollTop();

        // TODO: move function.
        if (scroll >= height) {
            $('.back-to-top-icon').css({
                'opacity': '1',
            })
        } else {
            $('.back-to-top-icon').css({
                'opacity': '0',
            })
        }
    });

})(document, jQuery);
