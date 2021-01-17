"use strict";

$(document).ready(function ()
{
    var slideshow = $('.slideshow > .owl-carousel').owlCarousel({
        stagePadding: 0,
        items: 1,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        rewind: true,
        loop: true
    });

    $('.slideshow > .prev').on('click', function ()
    {
        slideshow.trigger('prev.owl.carousel');
        slideshow.trigger('stop.owl.autoplay');

        setTimeout(function() { slideshow.trigger('play.owl.autoplay'); }, '60000');
    });

    $('.slideshow > .next').on('click', function ()
    {
        slideshow.trigger('next.owl.carousel');
        slideshow.trigger('stop.owl.autoplay');

        setTimeout(function() { slideshow.trigger('play.owl.autoplay'); }, '60000');
    });

    $('form[name="contact"]').on('submit', function(e)
    {
        e.preventDefault();

        var form = $(this);

        $.ajax({
            type: 'POST',
            data: form.serialize() + '&action=contact',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                if (response.status == 'success')
                {
                    alert('Gracias por ponerte en contacto');
                    location.reload();
                }
                else if (response.status == 'error')
                {
                    var errors = '';

                    for (var i = 0; i < response.errors.length; i++)
                        errors = errors + response.errors[i] + ' - ';

                    alert(errors);
                }
            }
        });
    });
});

function map()
{
    var locations = [
        {
            title: 'Company',
            lat: 21.1214886,
            lng: -86.9192734,
            zoom: 12
        }
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: locations[0].zoom,
        center: {
            lat: locations[0].lat,
            lng: locations[0].lng
        }
    });

    var marker = new google.maps.Marker({
        position: {
            lat: locations[0].lat,
            lng: locations[0].lng
        },
        map: map
    });

    var title = new google.maps.InfoWindow({
        content: locations[0].title
    });

    title.open(map, marker);
}
