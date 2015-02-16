<div class="wrap">
    <h2>Plyyr Settings</h2>
    <form method="post" action="options.php"> 
        <?php @settings_fields('plyyr-group'); ?>
        <?php @do_settings_fields('plyyr-group'); ?>

        <?php do_settings_sections('plyyr'); ?>

        <?php @submit_button(); ?>
    </form>
</div>