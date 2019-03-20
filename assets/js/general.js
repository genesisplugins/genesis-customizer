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

})(document, jQuery);


