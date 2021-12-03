<h1><?php echo $args['title']; ?></h1>

<form action="options.php" method="post">
    <?php 
        settings_fields( $args['optionGroup'] );
        do_settings_sections( $args['settingsPageSlug'] ); 
    ?>
    <input name="submit" class="button button-primary" type="submit" value="<?php echo $args['saveButtonText']; ?>" />
</form>