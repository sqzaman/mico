<?php
global $base_url;
$confirmed_token_amount = db_query("SELECT SUM(token_amount) as total_reserved_token from {token_reservation} WHERE user_email = :user_email AND uid IS NOT NULL", array(":user_email" => $reservation_info["user_email"]))->fetchField();
//echo $confirmed_token_amount;exit;
?>
<p>
<!-- ============ Header ============ -->
<div><?php echo t("Dear <strong>@FULLNAME</strong>", array("@FULLNAME" => $reservation_info['user_name'])); ?></div>
<br />
<!-- ============ Confirmation ============ -->
<div><?php echo t("Thank you for reserving SMS token."); ?></div>
<div><?php echo t("Please confirm your reservation by clicking the following URL"); ?></div>
<div><a href="<?php echo $base_url ."/mico/confirm-reservation/" .  $reservation_info['url_hash_code'];?>"><?php echo $base_url ."/mico/confirm-reservation/" .  $reservation_info['url_hash_code'];?></a></div>
<br />
<!-- ============ Reservation Info ============ -->
<div><strong><?php echo t("Your recent reservation information"); ?></strong></div>
<div>------------------------------</div>
<div><strong><?php echo t("Details"); ?></strong></div>
<div><?php echo t("Number of token: <strong>@NEW_RESERVED</strong> (Total: <strong>@TOTAL_RESERVED</strong>)", array("@NEW_RESERVED" => $reservation_info['token_amount'], "@TOTAL_RESERVED" => ($reservation_info['token_amount'] + $confirmed_token_amount))); ?></div>
<div><?php echo t("Date: <strong>@RESERVE_DATETIME</strong>", array("@RESERVE_DATETIME" => $reservation_info['reservation_time'])); ?></div>
<div>------------------------------</div>
<br />
<!-- ============ User Info ============ -->
<div>------------------------------</div>
<div><strong><?php echo t("User information"); ?></strong></div>
<div><?php echo t("Name: <strong>@FULLNAME</strong>", array("@FULLNAME" => $reservation_info['user_name'])); ?></div>
<div><?php echo t("Email: <strong>@EMAIL</strong>", array("@EMAIL" => $reservation_info['user_email'])); ?></div>
<div>------------------------------</div>
<br />
<!-- ============ Note ============ -->
<div><strong><?php echo t("■■ The following information is also necessary ■■") ?></strong></div>
<div><?php echo t("• The token you reserved can be purchased between 27 October 2017 14:00 (JST) to 27 October 2017 23:59 (JST). Regarding the details of the purchasing procedure, we will contact you again before 26 October 2017 23:59 (JST).") ?></div>
<div><?php echo t("• If you purchase additional token after the pre-ICO period, it will be accepted as a general period. (General period: 30 October 2017 14:00 (JST) to 10 November 2017 23: 59 (JST)).") ?></div>
<br />
<div><?php echo t("This mail is automatically distributed.") ?></div>
<div><?php echo t("Even if you reply, we can not respond, so please be informed and make sure to contact support team.") ?></div>
<br />
<div>------------------------------</div>
<div><?php echo t("Sincerely,<br />SMS Coin team") ?></div>
<br />
<div><strong><?php echo t("Contact information") ?></strong></div>
<div><?php echo "support@smscoin.jp" ?></div>
<div>------------------------------</div>
</p>