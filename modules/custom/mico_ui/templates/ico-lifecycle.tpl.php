<?php
global $base_url, $language;
?>
<section class="lifecycle">
    <div class="container">
        <div class="row">
            <h3 class="title"><?php echo t("SMS Tokens") ?></h3>
        </div>
        <?php
        $image_name =  "lifecycle.png";
        if ($language->language == "ja") {
            $image_name = "lifecycle_ja.png";
        }

        ?>
        <img src="<?php print $base_url . "/" . path_to_theme() . '/images/' . $image_name; ?>" />
        <div class="row">
            <h3 class="title"><?php echo t("Transferable Token, Transferable benefit"); ?></h3>
            <div class="informations"><?php echo t("We are the main supporter to list this token into a cryptocurrency exchange supported by our alliance. Therefore, investor will have two benefits in both trading and the profit distribution together."); ?> </div>
        </div>
    </div>
</section>

