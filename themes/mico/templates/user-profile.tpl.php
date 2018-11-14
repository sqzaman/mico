<?php
global $language, $user;
$profile = profile2_load_by_user($user, 'main');
$confirmed_token_amount = db_query("SELECT SUM(token_amount) as total_reserved_token from {token_reservation} WHERE user_email = :user_email AND uid IS NOT NULL", array(":user_email" => $user->mail))->fetchField();
$membership = db_query("SELECT * FROM {smscoin_membership} WHERE email = :user_email", array(":user_email" => $user->mail))->fetchObject();
$membership_flag = (isset($membership->status) && $membership->status >= 100 );
$membership_fee = variable_get('mico_coinpayments_amount', '');
$transaction_fee =  variable_get('mico_coinpayments_transaction_fee', '');
$round_total = $membership_fee + $transaction_fee;

?>
<section class="profile">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="profile">
                    <h3><?php echo t('Profile'); ?></h3>
                    <div class="profile-label"><?php echo t('First name'); ?></div>
                    <div class="profile-input"><?php echo $profile->field_first_name[LANGUAGE_NONE][0]['value']; ?> </div>
                    <div class="profile-label"><?php echo t('Last name'); ?></div>
                    <div class="profile-input"><?php echo $profile->field_last_name[LANGUAGE_NONE][0]['value']; ?></div>
                    <div class="profile-label"><?php echo t('Email'); ?></div>
                    <div class="profile-input" style="text-transform: none;"><?php echo $user->mail; ?></div>
                    <div class="profile-label"><?php echo t('My wallet (Ethereum)'); ?></div>
                    <div class="profile-input"><pre><?php if (isset($profile->field_user_wallet[LANGUAGE_NONE][0]['value'])) echo $profile->field_user_wallet[LANGUAGE_NONE][0]['value']; else echo "****************************************" ?></pre></div>
                    <div class="edit-button">
                        <a href="/<?php echo $language->language . '/user/'. $user->uid . '/edit'?>" class="btn">                        <i aria-hidden="true" class="mdi mdi-account-edit"></i>
<?php echo t('Edit Profile'); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="white-card">
                    <h3><?php echo t('White Card'); ?></h3>
                    <div class="card">
                        <?php if((!isset($membership->id)) || ((isset($membership->status) && $membership->status < 100 ))): ?>
                                <div class="buy-card">
                                    <div class="message"><?php echo t("Be a Proud Member") ?></div>
                                    <button class="btn get-membership" data-toggle="modal" data-target="#getMembership"><?php echo t("Get Membership") ?></button>
                                    <div id="getMembership" class="modal fade" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?php echo t("Get Membership") ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body">
                                            <div class="panel-body">
                                        <div class="col-md-12">
                                            <?php echo t("Membership Fee") ?>
                                            <div class="pull-right"><span>ETH</span> <strong><?php echo $membership_fee ?></strong></div>
                                        </div>
                                        <div class="col-md-12">
                                            <?php echo t("Transaction Fees") ?>
                                            <div class="pull-right"><span>ETH</span> <strong><?php echo $transaction_fee ?></strong></div>
                                        </div>
                                        <div class="col-md-12 order-total">
                                            <?php echo t("Order Total") ?>
                                            <div class="pull-right"><span>ETH</span> <strong><?php echo $round_total ?></strong></div>
                                            <hr>
                                        </div>
                                        <div id="membership-payment-error-msg" style="display:none; color:red">
                                        </div>
                                        <button type="button" id="membership-payment" class="btn btn-primary btn-lg btn-block">
                                            <i id="membership-payment-spinner" class="fa fa-spinner fa-spin" style="font-size:24px; display:none"></i>&nbsp;
                                            <?php echo t("Pay")?>
                                        </button>

                                </div>
                                            </div>
                                        </div>
                                  </div>
                            </div>
                            </div>
                        <?php endif; ?>
                        <img src="<?php print base_path().path_to_theme();?>/img/whitecard-profile.png">
                        <div class="name"><?php echo $profile->field_first_name[LANGUAGE_NONE][0]['value'] . " ". $profile->field_last_name[LANGUAGE_NONE][0]['value']; ?></div>
                        <div class="number"><?php echo (isset($membership) && !empty($membership->status)) ? $membership->membership_id : "####-####-####-####"; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="token">
                    <h3><?php echo t('Token Reserved'); ?></h3>
                    <div class="token-reserved">
                        <img src="<?php print base_path().path_to_theme();?>/img/logo-footer.png">
                        <div class="text"><?php echo t('Token Reserved'); ?></div>
                        <div class="number"><?php echo $confirmed_token_amount; ?></div>
                        <?php if(variable_get('mico_core_expose_ico_smart_contract_address')) :?>
                            <?php if(isset($profile->field_user_wallet[LANGUAGE_NONE][0]['value'])) :?>
                                <a class="btn" href="https://etherscan.io/token/<?php echo variable_get('mico_core_ico_smart_contract_address');?>?a=<?php echo $profile->field_user_wallet[LANGUAGE_NONE][0]['value']; ?>" target="_blank"><?php echo t('View your token'); ?></a>
                            <?php endif; ?>
                            <a class="btn" href="https://etherscan.io/token/<?php echo variable_get('mico_core_ico_smart_contract_address')."#balances";?>" target="_blank"><?php echo t('View global token'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="smart-contract">
                    <h3><?php echo t('SMS Contract'); ?></h3>
                    <div>
                        <?php if($membership_flag && variable_get('mico_core_expose_ico_smart_contract_address') && variable_get('mico_core_ico_smart_contract_address')): ?>
                            <pre><?php echo variable_get('mico_core_ico_smart_contract_address'); ?></pre>
                            <?php print theme("smart_contract_qr_code", array('text' => variable_get('mico_core_ico_smart_contract_address')))?>
                        <?php else: ?>
                            <pre><?php echo "##############################################"; ?></pre>
                        <?php endif;?>

                        <?php if($membership_flag && variable_get('mico_core_expose_ico_smart_contract_address') && variable_get('mico_core_ico_smart_contract_address_explore_url')) :?>
                            <a class="btn btn-info" href="<?php echo variable_get('mico_core_ico_smart_contract_address_explore_url');?>" target="_blank" ><?php echo t('Explore'); ?></a>
                        <?php endif; ?>
                    </div>
                    <h3><?php echo t('Profit Distribution Contract'); ?></h3>
                    <div>
                        <?php if($membership_flag && variable_get('mico_core_expose_ico_profit_distribution_address') && variable_get('mico_core_ico_profit_distribution_address')): ?>
                            <pre><?php echo variable_get('mico_core_ico_profit_distribution_address'); ?></pre>
                        <?php else: ?>
                            <pre><?php echo "##############################################"; ?></pre>
                        <?php endif;?>
                                              
                        <?php if($membership_flag && variable_get('mico_core_expose_ico_profit_distribution_address') && variable_get('mico_core_ico_profit_distribution_address_explore_url')):?>
                            <a class="btn btn-info" href="<?php echo variable_get('mico_core_ico_profit_distribution_address_explore_url');?>" target="_blank" ><?php echo t('Explore'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
</section>

<div id="coinpayment-info" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo t('Payment information');?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="panel-body" id="coinpayment-info-details">

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    pre{
        text-transform: none;
    }
</style>
