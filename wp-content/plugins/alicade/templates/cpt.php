<div class="wrap">
    <h1>Custom Post Type</h1>

    <?php settings_errors(); ?>


    <form action="options.php" method="post">

        <?php
        settings_fields('alicade_cpt_settings');
        do_settings_sections('alicade');
        submit_button();
        ?>
    </form>
</div>