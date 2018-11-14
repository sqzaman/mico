<?php// print_r($elements); ?>
<?php
//print_r($form);

//$reservation_info = drupal
?>
<div class="container profile-edit">
    <div class="form">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <section class="separator-grain separator group">
                    <label><?php echo t("Email"); ?></label>
                        <?php
                        // kpr($form);
                        //TODO: user drupal_render, drupal_render_children and preprocess functions
                        print render($form['account']['mail']);
                        print render($form['account']['name']);
                        ?>
                </section>
                <label><?php echo t('First name'); ?></label>
    <?php
print render($form['profile_main']['field_first_name']);
?>   
    <label><?php echo t('Last name'); ?></label>
<?php

print render($form['profile_main']['field_last_name']);

?>

                <label><?php echo t('My wallet (Ethereum)'); ?></label>
                <?php

                print render($form['profile_main']['field_user_wallet']);

                ?>
            </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <section class="group">
            <label><?php echo t('Current password') ?></label>
                <?php
                print render($form['account']['current_pass']);
                print render($form['account']['pass']);
                print render($form['account']['pass2']);
                ?>
            </section>
        </div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 button-edit">
    <?php
    //print_r($form); exit;
//print drupal_render_children($form);
print render($form['form_build_id']);
print render($form['form_id']);
print render($form['form_token']);
print render($form['actions']);
//print render($form['#validate']);
?>
</div>

</div>
</div>
<style type="text/css">
    .tabs .secondary{
        display: none;
    }

</style>
