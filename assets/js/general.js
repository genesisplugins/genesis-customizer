(function (document, $) {

    /*
     * Add button class to menu item spans.
     */
    var menuItem = $('.menu-item.button');

    menuItem.removeClass('button');
    menuItem.find('span').addClass('button');

    if (menuItem.hasClass('small')) {
        menuItem.removeClass('small');
        menuItem.find('span').addClass('small');
    }

    if (menuItem.hasClass('ghost')) {
        menuItem.removeClass('ghost');
        menuItem.find('span').addClass('ghost');
    }

    /**
     * Remove ghost button class in sticky header.
     */
    if ($('body').hasClass('has-sticky-header') || $('body').hasClass('has-sticky-header-mobile') || $('body').hasClass('has-sticky-header-desktop')) {
        var stickyGhostButton = $('.site-header .ghost');

        $(window).on("load resize scroll", function () {
            if ($('.site-header').hasClass('shrink')) {
                stickyGhostButton.removeClass('ghost');
            } else {
                stickyGhostButton.addClass('ghost');
            }
        });
    }

})(document, jQuery);


