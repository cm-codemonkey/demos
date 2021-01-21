<?php

defined('_EXEC') or die;

$this->dependencies->add(['css', '{$path.plugins}owlcarousel/assets/owl.carousel.min.css']);
$this->dependencies->add(['css', '{$path.plugins}owlcarousel/assets/owl.theme.default.min.css']);
$this->dependencies->add(['js', '{$path.plugins}owlcarousel/owl.carousel.min.js']);
$this->dependencies->add(['css', '{$path.plugins}fancybox/source/jquery.fancybox.css']);
$this->dependencies->add(['js', '{$path.plugins}fancybox/source/jquery.fancybox.pack.js']);
$this->dependencies->add(['js', '{$path.js}Index/index.js?v=1.0.0']);
$this->dependencies->add(['other', '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLCea8Q6BtcTHwY3YFCiB0EoHE5KnsMUE&callback=map"></script>']);

?>

<main class="main_body">
    <form name="contact">
        <input type="text" name="name" placeholder="{$lang.complete_name}" class="m-b-10 p-lr-20">
        <input type="email" name="email" placeholder="{$lang.email}" class="m-b-10 p-lr-20">
        <input type="text" name="phone" placeholder="{$lang.phone}" class="m-b-10 p-lr-20">
        <textarea name="message" placeholder="{$lang.message}"></textarea>
        <button type="submit">Enviar</button>
    </form>
</main>
