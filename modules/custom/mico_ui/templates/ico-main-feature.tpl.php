<?php
global $base_url, $language;

?>
<section class="informations">
    <div class="container">
        <div class="row">
            <div class="hidden-xs col-md-5 col-lg-5 img-gpu">

                <img src="<?php print $base_url . "/" . path_to_theme() . '/images/map.png'; ?>" />
                <?php
                $image_name =  "mexchange-figure.png";
                if ($language->language == "ja") {
                    $image_name = "mexchange-figure_ja.png";
                }

                ?>
                <img class="figure" src="<?php print $base_url . "/" . path_to_theme() . '/images/'. $image_name; ?>" />
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <h3 class="title"><?php echo t("The SMS project")?></h3>
                <h3 class="sub-title"><?php echo t("SMS project is the most advanced diversified virtual currency mining operation with the offering of profit distribution up to 34% from the global revenue.");?></h3>
                <br />
                <ul>
                    <li><strong><?php echo t("Pay as you go, profit as we grow")?></strong> : <?php echo t("By targeting the funding at 3 billion YEN, we can expand our mining capacity, to 3,000 mining machines with the most cutting-edge hardware, all by March 2018. And the profit from only 1 token investment is at approximate 1,200 yen per month from the end of January 2018.")?></li>
                    <li><strong><?php echo t("Japanese standards, high power, efficient, and government support") ?></strong> : <?php echo t("We are procuring the first batch of mining machines in Hokkaido, the most northern and coldest part of Japan. Because of our efficient design which targets heat flow for our facility and the utilization of the cold temperature from the surrounding environment, our mining farm will be the most power efficient mining farm in all of Japan. In addition, our governmental support of electricity consumption helps us to ensure the greatest core profit will be served to each individual investor straight away.")?></li>
                    <li><strong><?php echo t("On-the-fly contract with free upgrades.") ?></strong> : <?php echo t("You own SMS token, you own all the rights to receive the profit distribution as well. Since we will reinvest 20% of the profit to upgrade the mining machines and we dynamically ensure the best profitable configuration for our mining farms, the SMS holders don’t need to worry about hardware performance dropping as with other mining clouds.")?></li>
                    <li><strong><?php echo t("Supported by our mExchange") ?></strong> : <?php echo t("The SMS token can be traded by \"mExchange\" which is the virtual currency trading system developed by AI Innovation Japan, a partner company. Not only SMS token holders can earn money from buying and selling tokens through our exchange, but also he has the right to receive benefits from our mining centers as well.");?></li>
                    <li><strong><?php echo t("Transferable token, transferable benefit.") ?></strong> : <?php echo t("Token can be traded amongst club members in mExchange. Therefore, investor will have both of the benefits of trading and profit distribution simultaneously.");?></li>
                </ul>
                
            </div>
                
        </div>
    </div>
</section>
