(function (document, $) {
    var genesisMenuParams = typeof genesis_responsive_menu === 'undefined' ? '' : genesis_responsive_menu;

    $(function () {
        var logo = $('.has-logo-center .title-area');
        var menu = $('.has-logo-center .menu-primary > .menu-item');
        var items = menu.length / 2 - 1;
        var windowWidth = $(window).innerWidth();
        var breakpoint = genesisMenuParams.headerBreakpoint;

        if ($('body').hasClass('has-logo-above-mobile')) {
            $('.menu-toggle').wrap('<div class="menu-toggle-bar"></div>');
        }

        if ($('body').hasClass('has-logo-center')) {
            $(window).on("load resize scroll", function () {
                if (windowWidth >= breakpoint) {
                    menu.eq(Math.floor(items)).after(logo);
                } else {
                    logo.insertBefore($('.menu-toggle-bar'));
                }
            });
        }
    });

})(document, jQuery);


