
<?php
    global $base_url;
    $form = drupal_get_form("form_token_purchase_request_form");
    //$total_reserved_token =  db_query("SELECT sum(token_amount) from {token_reservation}")->fetchField();
    //$total_token_to_be_reserved = variable_get('mico_core_total_number_of_token_to_be_sold');
    //$total_number_of_user = db_query("SELECT count(u.uid) from {users} u inner join {token_reservation} tr on(u.uid=tr.uid)")->fetchField();
//echo $total_number_of_user;exit;

    //$already_sold_percentage = ((INITIAL_NUMBER_OF_TOKENS + $total_reserved_token) * 100 )/$total_token_to_be_reserved;
    ?>
<section class="status">
        <div class="container">
                <h1 class="title"><?php echo t('Join now for the early bird bonus') ?></h1>
            <div class="row">
                    <div id="reservation-progress">
                        <?php print theme("ico_token_presale_reservation_progress"); ?>
                    </div>
                    <div class="single newsletter">
                        <div class="row">
                            <form action="<?php print $form['#action'] ?>" method="<?php print $form['#method'] ?>" id="<?php print $form['#id'] ?>" accept-charset="UTF-8" class="reservation-form">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <?php print drupal_render($form['lastname']) ?>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <?php print drupal_render($form['firstname']) ?>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <?php print drupal_render($form['email']) ?>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <?php print drupal_render($form['country']) ?>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <?php print drupal_render($form['phone_number']) ?>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <?php print drupal_render($form['number_of_token_requested']) ?>
                                </div>
                                <br />
                                <br />
                                <div id="notice">
                                    <?php echo t("※If the number of applications reaches the maximum number of members (40,000), there will be priority based on the number of token.");?>
                                    <br />
                                    <?php echo t("※Cancellation is possible within 10 days after reservation. A cancellation fee of 5% will be charged after the free cancellation period.");?>
                                    <br />
                                    <?php echo t("※We are limiting the number of reservation to 2,500 tokens per person so that more people can join and enjoy the priviledge of early bird bonus. If you want to order more than 2,500 tokens, please make additional purchase during general period.");?>
                                </div>
                                <div id="profit-projection" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                </div>
                                <div class="alert alert-warning" id="message-warning" style="display: none; clear:both;">
                                    <span id="message"></span>
                                </div>
                                <div class="alert alert-danger" id="message-danger" style="display: none;clear:both;">
                                    <span id="message"><strong style="color: red">* </strong><?php echo t("Marked fields are mandatory");?></span>
                                </div>


                                <div>
                                     <?php $form['submit']['#attributes'] = array ('id' => array('token-reservation-request')); ?>
                                     <?php print drupal_render($form['submit']) ?>
                                 </div>
                                    <?php print drupal_render_children($form) ;?>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
</section>
<style type="text/css">
    #notice {
        text-align: left;
        font-size: 11px;
        font-style: italic;
    }

</style>