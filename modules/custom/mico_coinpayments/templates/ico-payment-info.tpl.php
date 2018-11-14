<?php
//print_r($info) ;
$time_in_min = $info['timeout']/60

?>
<div style="word-wrap:break-word;">
    <div id="payment-error-message" class="col-md-12" style="display:none; color:red">

    </div>
    <div class="col-md-12">
        <label><?php echo t("Amount") ?></label>
        <div><?php echo $info['amount'] ?></div>
    </div>
    <div class="col-md-12">
        <label><?php echo t("Payment Id") ?></label>
        <div><?php echo $info['txn_id'] ?></div>
    </div>
    <div class="col-md-12">
        <label><?php echo t("Payment Address") ?></label>
        <div><pre><?php echo $info['address'] ?></pre></div>
    </div>
    <div class="col-md-12">
        <label><?php echo t("Payment Timeout") ?></label>
        <div><?php echo $time_in_min . " minutes" ?>  <span style="color:red"><?php echo t('(Please check the "Payment Status URL" for the remaining time before you make the payments.)') ?></span></div>
    </div>
    <div class="col-md-12">
        <label><?php echo t("Payment Status Url") ?></label>
        <div><a href="<?php echo $info['status_url'] ?>" target='_blank'><?php echo $info['status_url'] ?></a></div>
    </div>
    <div class="col-md-12">
        <label><?php echo t("QR code") ?></label>
        <div><img src="<?php echo $info['qrcode_url'] ?>"></img></div>
    </div>
</div>
