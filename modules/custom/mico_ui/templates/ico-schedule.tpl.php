<?php
global $base_url;

?>
<section class="schedule">
    <div class="container">
        <div class="row">
            <h1 class="title"><?php echo t("Schedule"); ?></h1>
            <h2 class="subtitle"><?php echo t("Bonus"); ?> (<?php echo t("150,000 tokens"); ?>)</h2>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="block">
                    <div class="title"><?php echo t("Period 1"); ?></div>
                    <?php echo t("Free White card membership !"); ?>
                    <div class="date">
                        <div class="row">
                            <div class="title"><?php echo t("Schedule"); ?></div>
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <?php echo t("27 October 2017, 14:00 (JST)"); ?>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <img src="<?php print $base_url . "/" . path_to_theme() . '/images/arrow.png'; ?>" />
                            </div>

                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <?php echo t("29 October 2017, 23:59 (JST)"); ?>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <li> <?php echo t("0-9 tokens"); ?><strong>5%</strong></li>
                        <li> <?php echo t("10-49 tokens"); ?><strong>10%</strong></li>
                        <li> <?php echo t("50-99 tokens"); ?><strong>20%</strong></li>
                        <li> <?php echo t("100~ tokens"); ?><strong>30%</strong></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="block">
                <div class="title"><?php echo t("Period 2"); ?></div>

                <div class="date">
                    <div class="row">
                        <div class="title"><?php echo t("Schedule"); ?></div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <?php echo t("30 October 2017, 14:00 (JST)"); ?>
                    </div>

                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <img src="<?php print $base_url . "/" . path_to_theme() . '/images/arrow.png'; ?>" />
                        </div>

                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <?php echo t("10 November 2017, 23:59 (JST)"); ?>
                        </div>
                    </div>
                </div>
                <ul>
                    <li><?php echo t("0-9 tokens"); ?><strong>3%</strong></li>
                    <li> <?php echo t("10-49 tokens"); ?><strong>5%</strong></li>
                    <li> <?php echo t("50-99 tokens"); ?><strong>10%</strong></li>
                    <li> <?php echo t("100~ tokens"); ?><strong>15%</strong></li>
                </ul>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="block">
            <div class="title"><?php echo t("Period 3"); ?></div>

            <div class="date">
                <div class="row">
                    <div class="title"><?php echo t("Schedule"); ?></div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <?php echo t("11 November 2017, 00:00 (JST)"); ?>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <img src="<?php print $base_url . "/" . path_to_theme() . '/images/arrow.png'; ?>" />
                    </div>

                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <?php echo t("31 December 2017, 23:59 (JST)"); ?>
                    </div>
                </div>
            </div>
            <ul>
                <li> <?php echo t("0-9 tokens"); ?><strong>1%</strong></li>
                <li> <?php echo t("10-49 tokens"); ?><strong>3%</strong></li>
                <li> <?php echo t("50-99 tokens"); ?><strong>5%</strong></li>
                <li> <?php echo t("100~ tokens"); ?><strong>8%</strong></li>
            </ul>
        </div>
    </div>
    </div>
        <div id="notice">
            <?php echo t("※For the details of Bonus and Schedule, please read Whitepaper.");?>
        </div>
        <div class="row">
            <h2 class="subtitle"><?php echo t("Normal Schedule"); ?></h2>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="block">
                    <div class="title"><?php echo t("Period 4"); ?></div>
                    <div class="date">
                        <div class="row">
                            <div class="title"><?php echo t("Schedule"); ?></div>
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <?php echo t("1 January 2018, 00:00 (JST)"); ?>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <img src="<?php print $base_url . "/" . path_to_theme() . '/images/arrow.png'; ?>" />
                            </div>

                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <?php echo t("31 January 2018, 23:59 (JST)"); ?>
                            </div>
                        </div>
                    </div>
                    <?php echo t("The sale will be limited to 150,000 tokens, when we sell out during the bonus period, the sale for this batch is finished."); ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="block">
                    <div class="title"><?php echo t("3X split + 50,000 tokens"); ?></div>
                    <?php echo t("The SMS token holder will be given 3X token for free from the current holding amount."); ?>
                    <div class="date">
                        <div class="row">
                            <div class="title"><?php echo t("Schedule"); ?></div> 
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <?php echo t("2 January 2020, 00:00 (JST)"); ?>
                            </div> 

                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <img src="<?php print $base_url . "/" . path_to_theme() . '/images/arrow.png'; ?>" />
                            </div>

                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <?php echo t("8 January 2020, 23:59 (JST)"); ?>
                            </div>
                        </div>
                    </div>
                    <?php echo t("Extra 50,000 tokens will be open for sale."); ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="block">
                    <div class="title"><?php echo t("3X split + 50,000 tokens"); ?></div>
                    <?php echo t("The SMS token holder will be given 3X token for free from the current holding amount."); ?>
                    <div class="date"> 
                        <div class="row">
                            <div class="title"><?php echo t("Schedule"); ?></div>
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <?php echo t("2 January 2025, 00:00 (JST)"); ?>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <img src="<?php print $base_url . "/" . path_to_theme() . '/images/arrow.png'; ?>" />
                            </div>

                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <?php echo t("8 January 2025, 23:59 (JST)"); ?>
                            </div>
                        </div>
                    </div>
                    <?php echo t("Extra 50,000 tokens will be open for last sale."); ?>
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
        margin-top: 20px;
    }

</style>