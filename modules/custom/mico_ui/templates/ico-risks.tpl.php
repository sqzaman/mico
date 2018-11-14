<?php
global $base_url;

?>
<section class="risks">
    <div class="container">
        <div class="row">
            <h3 class="title"><?php echo t("Risks") ?></h3>
        </div>
        <div class="informations">
            <?php echo t("There are various risks that may occur upon obtaining tokens. Please check the contents of the white paper thoroughly before acquiring the token. The risks are as follows.") ?>
        </div>
        <ul>
            <li>
                <div class="list-title"><?php echo t("Computer infrastructure dependency") ?></div>
                <?php echo t("Mining depends on computer hardware, Internet environment and so on. The revenue calculated on the white paper is a projection without any environmental issue. Service interruption or delay might occur due to our robust protection against cyber attacks from the outside.") ?>
            </li>
            <li>
                <div class="list-title"><?php echo t("Crypto Currency Price") ?></div>
                <?php echo t("We will efficiently do mining of currencies with the highest market capitalization, but if the value of the virtual currency declines over the long term, the value of the token will decline and possibly, the profit of the mining business will deteriorate. That affects the distribution money.") ?>
            </li>
            <li>
                <div class="list-title"><?php echo t("Mining Machine Cost") ?></div>
                <?php echo t("We will reinvest 20% of the annual profit into procurement of the latest mining machine and upgrades, but if the equipment price in the future soars, there is a possibility that the expected profit will be affected.") ?>
            </li>
            <li>
                <div class="list-title"><?php echo t("Change of Electricity Rate") ?></div>
                <?php echo t("As shown in the white paper, electricity cost is assumed to be about 15% of revenue. That indicates current Japanese electricity bill. Electricity rates vary. If the electricity bill rises for the long term, the profit of the mining business will deteriorate and there is a possibility that the distribution fee will be affected.") ?>
            </li>
            <li>
                <div class="list-title"><?php echo t("Inevitable Accident") ?></div>
                <?php echo t("The operation of the mining center may be interrupted, postponed or terminated due to one of the following reasons. War, a long term of communication failure, suspension of electricity supply due to energy shortage, orders of municipalities or government agencies etc. If these problems occurred before issuing a token, the refund will be paid at the ETH exchange rate of the day.") ?>
            </li>
            <li>
                <div class="list-title"><?php echo t("The value of the token") ?></div>
                <?php echo t("The value of the token may fluctuate greatly for various reasons. The AI Innovation Group can not guarantee the value of a token.") ?>
            </li>
        </ul>
    </div>
</section>
