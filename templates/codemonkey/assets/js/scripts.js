"use strict";

$(document).ready(function ()
{
    nav_scroll_down('header.main_header', 'down', 0);

    $('[data-action="open_mobile_menu"]').on('click', function()
    {
        $('header.mobile_header').addClass('open');
    });

    $(document).on('click', '[data-action="close_mobile_menu"], header.mobile_header > nav > ul > li > a', function()
    {
        $('header.mobile_header').removeClass('open');
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
