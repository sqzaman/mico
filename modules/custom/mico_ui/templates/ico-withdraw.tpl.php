<?php
global $base_url, $language;
?>
<section class="withdraw">
    <div class="container">
        <div class="row">
            <h3 class="title"><?php echo t("Profit Allocation") ?></h3>
        </div>
        <div class="informations">
            <?php echo t("Every month, SMS smart contracts will calculate automatically and allocate the dividend according to the amount of token ownership. Investor will be able to withdraw their profit from a wallet anytime according to their need.") ?>
        </div>

        <?php
        $image_name =  "withdraw.png";
        if ($language->language == "ja") {
            $image_name = "withdraw_ja.png";
        }
        ?>
        <img src="<?php print $base_url . "/" . path_to_theme() . '/images/' . $image_name; ?>" />
    </div>
</section>
