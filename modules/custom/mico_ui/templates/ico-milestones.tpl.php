<?php
global $base_url, $language;

?>
<section class="milestones">
    <div class="container">
        <div class="row">
            <h3 class="title"><?php echo t("Milestones"); ?></h3>
        </div>
        <div class="informations">
            <ul>
                <li><strong><?php echo t("Phase 1");?>: </strong><?php echo t("Acquire the facilities and machines to be placed in Hokkaido. Construction and setup of 3,000 mining machines is expected to be completed within 6 months from this first batch.") ?></li>
                <li><strong><?php echo t("Phase 2");?>: </strong><?php echo t("Once we raise the seed capital and release our portal by this ICO, SMS members will be entitled to a monthly dividend (receivable at the end of every month, starting from January 2018.)") ?></li>
                <li><strong><?php echo t("Phase 3");?>: </strong><?php echo t("To maintain our top performance position and the stabilize the profit distribution, we will reinvest our returns to grow the farm and increase revenues. This will result in increasing lifetime dividends.") ?></li>

            </ul>
        </div>
        <?php
        $image_name =  "milestones.png";
        if ($language->language == "ja") {
            $image_name = "milestones_ja.png";
        }

        ?>
        <img src="<?php print $base_url . "/" . path_to_theme() . '/images/'. $image_name; ?>" />
    </div>
</section>