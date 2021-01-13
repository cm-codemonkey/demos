<?php defined('_EXEC') or die; ?>

        <footer class="main-footer">
            <div class="container">
                <p>Copyright © 2021 <strong><?php echo Configuration::$web_page; ?></strong> <i class="mdi mdi-heart text-danger"></i> {$lang.development_by} <a href="https://codemonkey.com.mx" target="_blank">codemonkey.com.mx</a></p>
            </div>
        </footer>
        <script src="{$path.js}jquery-3.4.1.min.js"></script>
        <script src="https://cdn.codemonkey.com.mx/js/valkyrie.js?v=1.0"></script>
        <script src="https://cdn.codemonkey.com.mx/js/codemonkey.js?v=1.0"></script>
        <script src="{$path.js}scripts.js?v=1.0"></script>
        <script defer src="https://kit.fontawesome.com/743152b0c5.js"></script>
        {$dependencies.js}
        {$dependencies.other}
    </body>
</html>
