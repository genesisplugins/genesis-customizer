(function (document, $) {
    var genesisMenuParams = typeof genesis_responsive_menu === 'undefined' ? '' : genesis_responsive_menu;

    $(function () {
        if ($('body').hasClass('has-logo-above-mobile') || $('body').hasClass('has-logo-below-mobile')) {
            $('.menu-toggle').wrap('<div class="menu-toggle-bar"></div>');
        }
    });

    if ($('body').hasClass('has-logo-center')) {
        $(window).on("load resize", function () {
            var logo = $('.has-logo-center .title-area');
            var menu = $('.has-logo-center .menu-primary > .menu-item');
            var items = menu.length / 2 - 1;
            var windowWidth = $(window).innerWidth();
            var header = $('.site-header').outerWidth();
            var breakpoint = genesisMenuParams.headerBreakpoint;

            if (windowWidth >= breakpoint || header >= breakpoint) {
                menu.eq(Math.floor(items)).after(logo);
            } else {
                logo.insertBefore($('.menu-toggle-bar'));
            }
        });
    }

})(document, jQuery);


