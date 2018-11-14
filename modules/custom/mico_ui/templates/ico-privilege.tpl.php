<?php
global $base_url, $language;

?>
<section class="priviliege">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <h3 class="title"><?php echo t("White Card Privilege") ?></h3>
                <div class="informations"><?php echo t("Every member has the right to purchase tokens, and to receive the dividend from profits generated by mining machines every month (The proportion of distributions varies with rank.) In addition to  profit gaining from members' own trading on a trading platform, mExchange supported by our alliance.") ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <?php
                $image_name =  "card.png";
                if ($language->language == "ja") {
                    $image_name = "card_ja.png";
                }

                ?>
                  <img src="<?php print $base_url . "/" . path_to_theme() . '/images/'. $image_name; ?>" />
            </div>
        </div>
    </div>
    </div>
</section>