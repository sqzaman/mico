
<?php
    global $base_url;
    $total_reserved_token =  db_query("SELECT sum(token_amount) from {token_reservation} WHERE uid IS NOT NULL")->fetchField();
    $total_token_to_be_reserved = variable_get('mico_core_total_number_of_token_to_be_sold');
    //$total_number_of_user = db_query("SELECT count(u.uid) from {users} u inner join {token_reservation} tr on(u.uid=tr.uid)")->fetchField();

    $visually_reserved = $total_reserved_token % $total_token_to_be_reserved;

    $already_sold_percentage = ((INITIAL_NUMBER_OF_TOKENS + $visually_reserved) * 100 )/$total_token_to_be_reserved;
    //$already_sold_percentage = ((INITIAL_NUMBER_OF_TOKENS + $total_reserved_token) * 100 )/$total_token_to_be_reserved;
?>

    <div class="progress" style="background-color: transparent;">
        <div class="pb green pb-size nopadding an-wave"><span style="width:<?php echo $already_sold_percentage?>%"><i></i></span></div>
    </div>

    <div id="reservation-status">

        <?php echo t("Total <strong>@reserved_token</strong> token reserved already!",
        array(
                "@reserved_token" => number_format(INITIAL_NUMBER_OF_TOKENS + $total_reserved_token)
            )
        )
        ?>

    </div>
    <div>
        <?php echo t("Total <strong>@total_token</strong> token will be sold in this phase!", array("@total_token" => number_format($total_token_to_be_reserved))); ?>
    </div>
