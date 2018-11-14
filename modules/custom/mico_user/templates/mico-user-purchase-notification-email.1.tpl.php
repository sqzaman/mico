<?php
//print_r($info);
global $base_url;
?>
<p>
<!-- ===== Japanese ==== -->
<div>(English contents below)</div>
<!-- ============ Header ============ -->
<div><?php echo sprintf("<strong>%s</strong> 様", $info->user_name); ?></div>
<br />
<!-- ============ Confirmation ============ -->
<div>SMSトークンをご予約いただき誠にありがとうございます。</div>
<br />
<div>ご予約いただいたトークンのご購入手続きは明日14時から開始いたします。</div>
<div>ご購入期間：２０１７年１０月２７日 １４：００（JST）～２０１７年１０月２９日 ２３：５９（JST）</div>
<br />
<div>SMSトークンを購入いただくためにはマイページからウォレット情報を入力していただく必要がございます。</div>
<div>ご購入期間にマイページに表示されるSMSコントラクトアドレスに１トークン当たり０.８ETHをご送付下さい。</div>
<br />
<div>下記のURLからログインしていただきしていただき、マイページより必要な情報をご入力下さい。</div>
<div><a href="<?php echo $base_url;?>"><?php echo $base_url; ?></a></div>
<br />
<div>ログイン情報は下記の通りです。</div>
<div>Eメール: <?php echo $info->user_email; ?></div>
<div>パスワード: <?php echo $info->reservation_code; ?></div>
<div><strong>※ パスワードはログイン後の変更を推奨いたします。</strong></div>
<br />

<div>マイページにも詳細を記載しておりますが、</div>
<div>ご不明な点ございましたらサポートセンターまでご連絡下さい。</div>
<br />

<!-- ============ Note ============ -->
<div>■ □ ■ □ 注意事項 ■ □ ■ □</div>
<div>· 利用規約を必ずお読みください。</div>
<div>· 会員登録の手続きおよびトークン購入方法については追ってお知らせいたします。</div>
<div>■ □ ■ □ ■ □ ■ □ ■ □ ■ □</div>

<div>今後ともSMSをご愛顧いただきますよう、</div>
<div>よろしくお願い申し上げます。</div>
<br />
<div>------------------------------</div>
<div>SMS コインチーム</div>
<br />
<div><strong>お問い合わせ先</strong></div>
<div>support@smscoin.jp</div>
<div>------------------------------</div>

<br />
<br />
<!-- ===== English ==== -->
<!-- ============ Header ============ -->
<div><?php echo sprintf("Dear <strong>%s</strong>", $info->user_name); ?></div>
<br />
<!-- ============ Confirmation ============ -->
<div>Thank you for participating in SMS project.</div>
<div>Now it's time for the next step.</div>
<br />
<div>We are introducing "My Page" where you will need to update your wallet information.</div>
<div>Our SMS contract address will also be shown inside "My Page" from 27th October, 14:00 (JST).</div>
<br />
<div>To purchase the token, please transfer ETH to this SMS contract address,</div>
<div>then you will immediately receive SMS token and the Bonus token back to your wallet.</div>
<br />
<div>Token price:</div>
<div>※※※  1 Token = 0.8 ETH  ※※※</div>
<br />
<div>Please login to your account using the following URL:</div>
<div><a href="<?php echo $base_url;?>"><?php echo $base_url; ?></a></div>
<br />
<div>Your credential is as follows:</div>
<div>Email: <?php echo $info->user_email; ?></div>
<div>Password: <?php echo $info->reservation_code; ?></div>
<div><strong>※ We recommended you to change your password after the first login.</strong></div>
<br />

<!-- ============ Note ============ -->
<div>■ □ ■ □ Notes ■ □ ■ □</div>
<div>· Please be sure to read the terms of service.</div>
<div>· We will guide you soon for the token purchasing procedure.</div>
<div>■ □ ■ □ ■ □ ■ □ ■ □ ■ □</div>

<div>Looking forward to give your first SMS.</div>
<br />
<div>------------------------------</div>
<div>Sincerely,<br />SMS Coin team</div>
<br />
<div><strong>Contact information</strong></div>
<div>support@smscoin.jp</div>
<div>------------------------------</div>
</p>
</p>