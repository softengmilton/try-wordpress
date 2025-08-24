<div class="wrap">
    <h1>Alicad</h1>
    <?php settings_errors(); ?>


    <form action="options.php" method="post">
        <?php

        settings_fields('alicad_options_group');
        do_settings_sections('alicade');
        submit_button();

        ?>
    </form>
</div>