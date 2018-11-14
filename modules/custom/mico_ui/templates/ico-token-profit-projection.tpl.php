
<?php
    global $base_url;
    $form = drupal_get_form("form_token_purchase_request_form");
    $total_reserved_token =  db_query("SELECT sum(token_amount) from {token_reservation}")->fetchField();
    $total_token_to_be_reserved = variable_get('mico_core_total_number_of_token_to_be_sold');
    $total_number_of_user = db_query("SELECT count(u.uid) from {users} u inner join {token_reservation} tr on(u.uid=tr.uid)")->fetchField();
//echo $total_number_of_user;exit;

    $visually_reserved = $total_reserved_token % $total_token_to_be_reserved;

    $already_sold_percentage = ((INITIAL_NUMBER_OF_TOKENS + $visually_reserved) * 100 )/$total_token_to_be_reserved;
    //$already_sold_percentage = ((INITIAL_NUMBER_OF_TOKENS + $total_reserved_token) * 100 )/$total_token_to_be_reserved;
    $per_token_price = variable_get('mico_core_per_token_price');

    $cls = 0;

    if ($no_of_token < 10){
        $cls = 0.24;
    } else if ($no_of_token < 20){
        $cls = 0.32;
    } else if ($no_of_token >= 20){
        $cls = 0.44;
    }

    $first_year_return = number_format(floor(($no_of_token * $cls * FIRST_YEAR_FACTOR)/ FIXED_FACTOR));
    $second_year_return = number_format(floor(($no_of_token * $cls * SECOND_YEAR_FACTOR)/ FIXED_FACTOR));
    $third_year_return = number_format(floor(($no_of_token * $cls * THIRD_YEAR_FACTOR)/ FIXED_FACTOR));
    $fourth_year_return = number_format(floor(($no_of_token * $cls * FOURTH_YEAR_FACTOR)/ FIXED_FACTOR));

    ?>

<div class="progress">
    <div class="progress-bar investement" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <?php echo t("Investment ¥ @total_amount", array("@total_amount" => number_format($per_token_price * $no_of_token))); ?>
    </div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <div class="progress">
        <div class="progress-bar year1" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" >
            <?php echo t("1st year return ¥ <strong>@first_year_return</strong>", array("@first_year_return" => $first_year_return)); ?>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <div class="progress">
        <div class="progress-bar year2" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" >
            <?php echo t("2nd year return ¥ <strong>@second_year_return</strong>", array("@second_year_return" => $second_year_return)); ?>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <div class="progress">
        <div class="progress-bar year3" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            <?php echo t("3rd year return ¥ <strong>@third_year_return</strong>", array("@third_year_return" => $third_year_return)); ?>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <div class="progress">
        <div class="progress-bar year4" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            <?php echo t("4th year return ¥ <strong>@fourth_year_return</strong>", array("@fourth_year_return" => $fourth_year_return)); ?>
        </div>
    </div>
</div>
<div class="monthly-return"><?php echo t("※Monthly return. Those number are approximations and can vary depending of the market rate of cryptocurrencies and electricity costs.")?></div>
</div>