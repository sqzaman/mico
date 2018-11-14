<?php
global $base_url, $user, $language;
$total_reserved_token =  db_query("SELECT sum(token_amount) from {token_reservation} WHERE uid IS NOT NULL")->fetchField();
$total_token_to_be_reserved = variable_get('mico_core_total_number_of_token_to_be_sold');
$total_number_of_user = db_query("SELECT count(u.uid) from {users} u inner join {token_reservation} tr on(u.uid=tr.uid)")->fetchField();

$visually_reserved = $total_reserved_token % $total_token_to_be_reserved;

$already_sold_percentage = ((INITIAL_NUMBER_OF_TOKENS + $visually_reserved) * 100 )/$total_token_to_be_reserved;
//$already_sold_percentage = ((INITIAL_NUMBER_OF_TOKENS + $total_reserved_token) * 100 )/$total_token_to_be_reserved;

?>

<section class="hero" id="hero">
    <div class="container">
        <div class="text-hero">
            <h1 class="motto"><?php echo t("Asia’s Largest Mining Center") ?></h1>            
                <!--
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                            <div class="progress">
                                <div class="pb green pb-size nopadding an-wave"><span style="width:<?php echo $already_sold_percentage?>%"><i></i></span></div>
                                <div class="current"><?php echo t("Token reserved") ?>: <strong><?php echo number_format($total_reserved_token); ?></strong></div>
                                <div class="hardcap"><?php echo t("Hardcap") ?> : <strong><?php echo number_format($total_token_to_be_reserved); ?></strong></div>
                            </div>
                        <?php if($total_reserved_token > 150000): ?>
                        <div id="notice-accept">
                            <?php echo t("Thank you! The number of reservations has exceeded the limit, but we are still accepting reservations!"); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                -->
            <h2 style="color: white;"><?php echo t('The token sale has been done') ?></h2><br />
            <!--<div id="countdown"></div>-->
            <h3 style="color: white;"><?php echo t('As we reached our targeted expectation, we are now close our crowdsale.') ?></h3>
            <h3 style="color: white;"><?php echo t('The future announcements will be updated on Speed Mining Service website.') ?></h3>
            <h3 style="color: white;"><a href="http://speedmining.jp/<?php echo substr($language->language, 0, 2);?>" style="color:#f53c69" target='_blank'>http://speedmining.jp</a></h3><br />
            <h3 style="color: white;"><?php echo t('Thank you for your contribution to SMS.') ?></h3>

            <!--<h3 style="color: white;"><a href="http://v4.eir-parts.net/v4Contents/View.aspx?cat=tdnet&sid=1526925" style="color:#f53c69" target='_blank'><?php echo t('緊急告知！JASDAQ上場の㈱NEW ARTのグループ会社<br/>㈱ニューアート・コインとの業務提携が決定いたしました。') ?></a></h3>-->


            <br />

            <div class="hero-button">
            <?php if( $user->uid < 1):?>
                <!--<button data-toggle="modal" data-target="#registerModal" class='presale btn button-link'><?php //echo t("Join us"); ?></button>-->
            <?php endif; ?>
            <span class="dropdown"><a class='whitepapers btn button-link dropdown-toggle' type='button' data-toggle='dropdown' target='_blank'  download><?php echo t("Whitepaper"); ?></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $base_url ?>/sites/default/files/whitepaper.pdf" target="_blank" download><img src="/sites/all/modules/contrib/languageicons/flags-ico/en.png" /><?php echo t("English") ?></a></li>
                    <li><a href="<?php echo $base_url ?>/sites/default/files/whitepaper_ja.pdf" target="_blank" download><img src="/sites/all/modules/contrib/languageicons/flags-ico/ja.png" /><?php echo t("Japanese") ?></a></li>
                    <li><a href="<?php echo $base_url ?>/sites/default/files/whitepaper_tw.pdf" target="_blank" download><img src="/sites/all/modules/contrib/languageicons/flags-ico/tw.png" /><?php echo t("Chinese traditional") ?></a></li>
                    <li><a href="<?php echo $base_url ?>/sites/default/files/whitepaper_cn.pdf" target="_blank" download><img src="/sites/all/modules/contrib/languageicons/flags-ico/cn.png" /><?php echo t("Chinese simplified") ?></a></li>
                    <li><a href="<?php echo $base_url ?>/sites/default/files/whitepaper_kr.pdf" target="_blank" download><img src="/sites/all/modules/contrib/languageicons/flags-ico/kr.png" /><?php echo t("Korean") ?></a></li>
                    <li><a href="<?php echo $base_url ?>/sites/default/files/whitepaper_es.pdf" target="_blank" download><img src="/sites/all/modules/contrib/languageicons/flags-ico/es.png" /><?php echo t("Spanish") ?></a></li>
                    <li><a href="<?php echo $base_url ?>/sites/default/files/whitepaper_ru.pdf" target="_blank" download><img src="/sites/all/modules/contrib/languageicons/flags-ico/ru.png" /><?php echo t("Russian") ?></a></li>
                    <li><a href="<?php echo $base_url ?>/sites/default/files/whitepaper_th.pdf" target="_blank" download><img src="/sites/all/modules/contrib/languageicons/flags-ico/th.png" /><?php echo t("Thai") ?></a></li>
                    <li><a href="<?php echo $base_url ?>/sites/default/files/whitepaper_ar.pdf" target="_blank" download><img src="/sites/all/modules/contrib/languageicons/flags-ico/ar.png" /><?php echo t("Arabic") ?></a></li>
                </ul>
            </div>
</span>
        </div>
        <div id="anchor"></div>
        <div class="canvas-wrap">
            <div id="canvas" class="gradient"></div>
        </div>
    </div>
</section>

<style type="text/css">
    #notice-accept{
        color: white;
        font-weight: bold;
    }
</style>