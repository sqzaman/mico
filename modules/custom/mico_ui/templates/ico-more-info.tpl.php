
<?php
    global $base_url;
    $form = drupal_get_form("simple_subscription_form");
?>
<section class="more-informations">
    <div class="pattern">
        <div class="container">
            <div class="more-buttons">
                <h4>Want to know more about our project ?</h4>
                <a href="<?php echo $base_url?>/sites/default/files/scoreReport.pdf" target="_blank" class="btn button-link">Whitepapers</a>
                <a href="#" class="btn button-link">Join us on slack</a>
            </div>
            <div class="single newsletter">
                <?php //print drupal_render($form);?>
                <h4>You can also subscribe to our newsletter</h4>
                <form action="<?php print $form['#action'] ?>" method="<?php print $form['#method'] ?>" id="<?php print $form['#id'] ?>" accept-charset="UTF-8">
                <div class="input-group">
                    <?php $form['mail']['#attributes'] = array ('class' => array('form-control'), 'placeholder' => "Enter your email"); ?>
                    <?php print drupal_render($form['mail']) ?>
                    <span class="input-group-btn">
                        <?php
                            $form['submit']['#attributes'] = array ('class' => array('btn'));
                            unset($form['header']);
                            unset($form['footer']);
                        ?>
                        <?php print drupal_render($form['submit']) ?>
                     </span>

                    <?php print drupal_render_children($form) ;?>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>