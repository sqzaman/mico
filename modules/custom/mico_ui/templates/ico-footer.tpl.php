<?php
global $base_url;

?>
<footer class="footer">
    <div class="container">
        <div class="row">
            <ul class="sns">
            <li>
                    <a href="https://github.com/Speed-Mining/SMSCoin" target="_blank">
                        <i aria-hidden="true" class="mdi mdi-github-circle"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/Speed_Mining" target="_blank">
                        <i aria-hidden="true" class="mdi mdi-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/Speed-MiningCoLtd-802432413251366/" target="_blank">
                        <i aria-hidden="true" class="mdi mdi-facebook"></i>
                    </a>
                </li>
            </ul>
            <img src="<?php print $base_url . "/" . path_to_theme() . '/images/logo-footer.png'; ?>" />
            <div class="copyright">Copyright - Speed Mining Service <br />
                <span style="font-size: 11px; margin-top: 0px;">By <a href="http://speedmining.jp/" target="_blank" > Speed Mining Co., Ltd. </a></span>&nbsp;&nbsp;
                <span style="font-size: 11px; margin-top: 0px;"><?php print t('Contact us'); ?>: <a href="mailto:support@smscoin.jp?Subject=[SMS Coin]%20Contact%20support" target="_top">support@smscoin.jp</a></span>
            </div>
        </div>
    </div>
</footer>