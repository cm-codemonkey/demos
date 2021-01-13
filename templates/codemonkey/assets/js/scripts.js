"use strict";

$(document).ready(function ()
{
    nav_scroll_down('header.main-header', 'down', 0);

    $('[data-open-mobile]').on('click', function()
    {
        $('header.mobile-header').addClass('open');
    });

    $('[data-close-mobile]').on('click', function()
    {
        $('header.mobile-header').removeClass('open');
    });
});

function nav_scroll_down(target, css, height)
{
    var nav = {

        initialize: function()
        {
            $(document).each(function()
            {
                nav.scroller()
            });

            $(document).on('scroll', function()
            {
                nav.scroller()
            });
        },
        scroller: function()
        {
            if ($(document).scrollTop() > height)
                $(target).addClass(css);
            else
                $(target).removeClass(css);
        }
    }

    nav.initialize();
}
