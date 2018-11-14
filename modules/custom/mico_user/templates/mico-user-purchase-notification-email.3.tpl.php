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
<div>予約特典最大<strong>30%ボーナス</strong>トークン付与期間も、明日29日23:59までとなりました。</div>
<div>ご購入期間：２０１７年１０月２７日 １４：００（JST）～２０１７年１０月２９日 ２３：５９（JST）</div>
<br />
<div>SMSトークンを購入いただくためには、マイページからウォレット情報を入力していただく必要がございます。</div>
<div>ご購入期間にマイページに表示されるSMSコントラクトアドレスに、お客様のwalletから１トークン当たり０.８ETHをご送付下さい。</div>
<div>勿論、ご予約数以上のトークンご購入も受け付け可能となっております。</div>
<br />
<div>下記のURLからマイページにログインしていただきしていただき、必要な情報をご入力下さい。</div>
<div><a href="<?php echo $base_url;?>"><?php echo $base_url; ?></a></div>
<div>※ ご購入までの流れは、ホームページのトップメニュー「購入方法」にてご確認いただけます。</div>
<div>「 購入方法のURL -> https://smscoin.jp/sites/default/files/howto_jp.pdf 」</div>
<br />
<div>ログイン情報は下記の通りです。</div>
<div>Eメール: <?php echo $info->user_email; ?></div>
<div>パスワード: <?php echo $info->reservation_code; ?></div>
<div><strong>※ パスワードはログイン後の変更を推奨いたします。</strong></div>
<div><strong>※ 既にパスワードをご変更いただいている場合は、上記のパスワードは無効となります。</strong></div>
<div><strong>※ 万一、変更されたパスワードをお忘れの場合は、ログイン画面の「パスワードを忘れた方はこちら」にアクセスし、リセットを行って下さい。</strong></div>
<br />

<div>マイページにも詳細を記載しておりますが、ご不明な点ございましたらサポートセンターまでご連絡下さい。</div>
<div>当メールはトークンセールにご予約いただいた方全員にお送りしております。既にご購入済みの方はご容赦ください。</div>
<div>※ <strong>マイウォレットアドレス</strong>として登録いただいたものが、間違えている方がいらっしゃいます。今一度ご確認ください。</div>
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
<div>We are resending the reminder for the bonus period <strong>up to 30%</strong> is ending tomorrow!!</div>
<div>Hurry up, and take this chance until 29 Oct 2017 23:59 (JST)</div>
<br />
<div>In order to purchase SMS token, you need to update Ethereum wallet address for your account then transferrring your ETH to SMS contract address shown inside your profile page.</div>
<br />
<div>To gain more bonus, to gain more profit,</div>
<div>you can also purchase SMS more than what you reserved!!</div>
<br />
<div>Token price:</div>
<div>※ 1 Token = 0.8 ETH</div>
<br />
<div>Please login to your account using the following URL, then click "Login":</div>
<div><a href="<?php echo $base_url;?>"><?php echo $base_url; ?></a></div>
<br />
<div>※ You can also see the guide to purchase SMS at the menu "How to buy" on our website.</div>
<div>   Or using this link: https://smscoin.jp/sites/default/files/howto_jp.pdf</div>
<br />
<div>Your credential is as follows:</div>
<div>Email: <?php echo $info->user_email; ?></div>
<div>Password: <?php echo $info->reservation_code; ?></div>
<div><strong>※ We recommended you to change your password after the first login.</strong></div>
<div><strong>※ If you have already changed your password, the above password is invalid.</strong></div>
<div><strong>※ If you forget your new password, please click "Lost your password?" on a log in screen to reset your password.</strong></div>
<br />
<div>※ Also, please confirm that you already registered your correct <strong>"Ethereum Wallet Address"</strong>.</div>
<br />
<div>Please contact the customer support if you need any further information or any guideline.</div>
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