<?php

/**
 * @file
 *   drush check data migration.
 */

/**
 * Implements hook_drush_command().
 *
 */
function mico_user_drush_command() {
  $items = array();

  $items['mico-user-import-membership'] = array(
    'callback' => '_mico_user_import_membership',
    'description' => t('import users to smscoin membership those who reserved token'),
    'examples' => array(
      'mico-user-import-membership' => 'import users to smscoin membership those who reserved token',
    ),
  );

  $items['mico-user-send-purchase-notification'] = array(
        'callback' => '_mico_user_send_purchase_notification',
        'description' => t('send purchase notification email'),
        'examples' => array(
            'mico-user-send-purchase-notification' => 'send purchase notification email',
        ),
    );

    $items['mico-test-command'] = array(
        'callback' => '_mico_test_command',
        'description' => t('this is a test command'),
        'examples' => array(
            'mico-test-command' => 'test command',
        ),
    );

    $items['mico-membership-synchronize'] = array(
        'callback' => '_mico_membership_synchronise',
        'description' => t('mico membership synchronise'),
        'examples' => array(
            'mico-test-command' => 'mico membership synchronise',
        ),
    );

    $items['mico-notify-user-changes'] = array(
        'callback' => '_mico_notify_user_changes',
        'description' => t('change notification to all user'),
        'examples' => array(
            'mico-notify-user-changes' => 'change notification to all user',
        ),
    );

    $items['mico-user-send-profit-distribution-notification'] = array(
        'callback' => '_mico_user_profit_distribution_notification',
        'description' => t('send profit distribution notification email'),
        'examples' => array(
            'mico-user-send-profit-distribution-notification' => 'send profit distribution notification email',
        ),
    );

  return $items;
}

function _mico_user_profit_distribution_notification() {
    global $language;
$sql = "SELECT u.uid, u.mail, fn.field_first_name_value, ln.field_last_name_value, uw.field_user_wallet_value FROM users u LEFT JOIN `profile` pr ON (u.uid=pr.uid) LEFT JOIN field_data_field_user_wallet uw ON (pr.pid=uw.entity_id)
LEFT JOIN field_data_field_first_name fn ON (pr.pid=fn.entity_id) LEFT JOIN field_data_field_last_name `ln` ON (pr.pid=ln.entity_id)
WHERE uw.field_user_wallet_value IS NOT NULL GROUP BY u.mail ORDER BY uid";

    $rows =  db_query($sql)->fetchAll();
    //print_r($rows); exit;
    $counter = 1;
    $emailSent = 0;
    foreach ($rows as $row) {

       // if(!isAddress($row->field_user_wallet_value)) {
         if(substr( $row->field_user_wallet_value, 0, 2 ) != "0x") {
            echo "$counter. user $row->mail has registered invalid address $row->field_user_wallet_value \r\n";;
            $counter++;
            continue;
        }

        $allowedList = array(
            strtolower("0x2eafad7c7edfdf9fc85ae5af291c629740e2eca1"),
            strtolower("0xf07232bc85d995c32c1edf1c985c84a8b7b0ded7"),
            strtolower("0x4b01721f0244e7c5b5f63c20942850e447f5a5ee"),
            strtolower("0xbd06b76376d27d6d74ce130c490fc52d66b4603d"),
            strtolower("0x8e842f91e93e2f36950ce00aa03144e6e9a32e2b"),
            strtolower("0x89dcf3c488148656369e8c667ba7a10fb29bb96f"),
            strtolower("0x1b23373ce78437abea9faa4a7aa0b24af725b6d6"),
            strtolower("0x324cc2c9fb379ea7a0d1c0862c3b48ca28d174a4"),
            strtolower("0x4b525ae3a20021639d6e00bf752e6d2b7f65196e"),
            strtolower("0x0020ab0a8194405c496337e440ef4b4badaf44b5"),
            strtolower("0x90f0260ea84e9758b628f3941fe7e3d189836881"),
            strtolower("0x8cb44c73ca2a6fae0615f2a0a170da78a8340bce"),
            strtolower("0xa2355e9c4a3f96f8c9e31f0abffe67e30fbc6d34"),
            strtolower("0x5a58c7259644d8b85b9299332e01c8b07a2247a6"),
            strtolower("0xd57a6685dfd6e3413f232b31258375c4f1185a2a"),
            strtolower("0xca296ca3432bf5fe5f420ab2abe8b0607a25de89"),
            strtolower("0x4f4ab3789a5be29fe779ac97d9938a3443c5e74f"),
            strtolower("0x8e7bd3dc5a41971455a7e5af99c3ab77766b964e"),
            strtolower("0x1d3fe071f67c7cb78fcbc1304040c9b9d700c58a"),
            strtolower("0x389f67b39ace752493a1856c8179b21f78225b4a"),
            strtolower("0x7059ede7d5058ad343b92a38d3d21936f393436e"),
            strtolower("0x43d4c3f5a651e18f1c61065e6db81445603c9b9d"),
            strtolower("0x788b8858d3e2fd4b536e28fdaa402938b11ce15f"),
            strtolower("0xcc177d7b2549bfcbef809c236e51e8fd15ba3c0e"),
            strtolower("0x0c9cfeb8aa3bb750f2da92947d651374a8b8531d"),
            strtolower("0xe69206060a32af15bd7f307bb0ce7dc7c94cd7f3"),
            strtolower("0xfe5ca2566aab4c8ac40c90be8616f4a92f4f3e6a"),
            strtolower("0xf292277639c62dc34def16a519cc9dbfa921f966"),
            strtolower("0xf2145e751ac61d53f7f2aa4ef02bb083029d0e5e"),
            strtolower("0x9621b86e38c8f297feff1518ba6c7161dd0a8b78"),
            strtolower("0xcf452ec0d1b191fa174ddacfe2e91d584c365001"),
            strtolower("0xf18c93a432b6c7297606f4884e3606b844a4668c"),
            strtolower("0xf8ce1bfde31995f256f055af6271c7ab5b8b7461"),
            strtolower("0xd29fb1d3724764405fdea290aaba4637eb2a6d72"),
            strtolower("0x4a8d20fdcd185e2454ab848eaf9b0eea70ed0e53"),
            strtolower("0x19beda2453748eaa41eb2300f3d116d4aa4f1efa"),
            strtolower("0xf7b36965cbad1eb58d40ec735d3ddaceeb707d9c"),
            strtolower("0x8d12a197cb00d4747a1fe03395095ce2a5cc6819"),
            strtolower("0x719c883e4eee4a1207699640c31b13aa055418ff"),
            strtolower("0x5d0847ed9ea41af739e07ff5f5ab858bb4883d0a"),
            strtolower("0xd5c0d45012a99ed297efea5da0ee9244fe44c067"),
            strtolower("0xe41090acbe9418d3a49701bcc1cb5da18e0c4283"),
            strtolower("0x841022ad9e41358aa7e5b55ba8297bd3509f5207"),
            strtolower("0x4d41b1f702c031d45fa5f144a7f4209f4bf33f14"),
            strtolower("0x886a3f51dbc4e46b9479512c020e04dcbb5561d2"),
            strtolower("0xd0299db81fbe086aff1b591fa6f937901ef4181f"),
            strtolower("0xd53dd1a53e5318d5a1ef683b786e565ef010104a"),
            strtolower("0x88313b0679e2ff775c435c896b23566d7bd60154"),
            strtolower("0x781b13d9b69315480c07b4de4fa4c47ea0235942"),
            strtolower("0xb44c4ccfed15d35b6235a1147563979a3d776da2"),
            strtolower("0x27cb5001f11e2f563c7c43c22a9d2694050aee2d"),
            strtolower("0x12192d986bc92308e15242f5c4440c8d83777d46"),
            strtolower("0x11b1eec366d1e79923c15514f1b8c014cd780c8d"),
            strtolower("0x8ef997fd655855c610cc9f36152985c3453fabf0"),
            strtolower("0x4ff73182ef00eeb0f0c927156e59fc07c1eabe3b"),
            strtolower("0x05345799c0ec6392560e60b15e4a8edd32d6cb57"),
            strtolower("0x3cb718d047fb9ffee39d7bf893a505e5f107bfc3"),
            strtolower("0xec88fadc77e60639e73d5c47c972621ccd88ba00"),
            strtolower("0xcf68614ef6896efdf5f21adfc0cb695caf6350f6"),
            strtolower("0x51be6fb6371fce0c3c9b329d290f63088765ce82"),
            strtolower("0x6d9db2295c9e4c61d0364b79d2b160728f1bdb1d"),
            strtolower("0x209f573f0ebd2d2161af6f26f9bc85a58b871b65"),
            strtolower("0x749bc1ab4a022a3ffbdc0cfe581b1f51eae00f51"),
            strtolower("0x64b13ead6811576e2b6936812dc63f4e9d9e7c98"),
            strtolower("0x325d85e5ec890051d021cd9ba589939f89cc8c78"),
            strtolower("0xaf22c763a4560bb4e5efddfe0fc276e5edd39beb"),
            strtolower("0x6c3a0182943588379ddbc35b257b9e269cffce89"),
            strtolower("0xa2e7a796c09680d1a6ffa5ab7e0e687fbf21a8eb"),
            strtolower("0x1a69f735883c4678f925d804c99ad0ca41f08d24"),
            strtolower("0xd4247674fa4f4b2108f7d6c0a2da58d9123531f5"),
            strtolower("0xeb8803f1901d363d6e7829eedd63031872a040f1"),
            strtolower("0x5de44b8dcdffb134f1094a50ffe8e77abe63abc1"),
            strtolower("0x87e070ff3e85a885b653b565a78fb077b8f65933"),
        );

        if(!in_array(strtolower($row->field_user_wallet_value), $allowedList)){
            echo "$counter. user $row->mail is not in the list- address:". strtolower($row->field_user_wallet_value)." \r\n";;
            $counter++;
            continue;
        }



        $user = new stdClass();
        if(isset($row->field_first_name_value) && isset($row->field_last_name_value)){
            $user->user_name = $row->field_first_name_value . " " . $row->field_last_name_value;
        } else {
            $user->user_name = $row->mail;
        }

        //$row->mail = "sqzaman@gmail.com";
        $message = drupal_mail('mico_user', 'profit_distribution_notice_email', trim($row->mail), $language, array('info' => $user), 'mailer@smscoin.jp', TRUE);
        echo "$counter. email notification sent to $row->mail\r\n";
        $counter++;
        $emailSent++;
    }

    echo "Total $emailSent email has been sent.\r\n";



}
/**
 * Checks if the given string is an address
 *
 * @method isAddress
 * @param {String} $address the given HEX adress
 * @return {Boolean}
 */
function isAddress($address) {
    if (!preg_match('/^(0x)?[0-9a-f]{40}$/i',$address)) {
        // check if it has the basic requirements of an address
        return false;
    } elseif (!preg_match('/^(0x)?[0-9a-f]{40}$/',$address) || preg_match('/^(0x)?[0-9A-F]{40}$/',$address)) {
        // If it's all small caps or all all caps, return true
        return true;
    } else {
        // Otherwise check each case
        return isChecksumAddress($address);
    }
}

/**
 * Checks if the given string is a checksummed address
 *
 * @method isChecksumAddress
 * @param {String} $address the given HEX adress
 * @return {Boolean}
 */
function isChecksumAddress($address) {
    // Check each case
    $address = str_replace('0x','',$address);
    $addressHash = hash('sha256',strtolower($address));
    $addressArray=str_split($address);
    $addressHashArray=str_split($addressHash);

    for($i = 0; $i < 40; $i++ ) {
        // the nth letter should be uppercase if the nth digit of casemap is 1
        if ((intval($addressHashArray[$i], 16) > 7 && strtoupper($addressArray[$i]) !== $addressArray[$i]) || (intval($addressHashArray[$i], 16) <= 7 && strtolower($addressArray[$i]) !== $addressArray[$i])) {
            return false;
        }
    }
    return true;
}


function _mico_notify_user_changes() {
    global $language;
    $sql = "SELECT u.uid, u.mail, fn.field_first_name_value, ln.field_last_name_value FROM users u 
LEFT JOIN `profile` p ON (u.uid=p.uid)
 LEFT JOIN field_data_field_first_name fn ON(fn.entity_id=p.pid)
LEFT JOIN field_data_field_last_name ln ON(ln.entity_id=p.pid)
 WHERE u.uid > 0 GROUP BY mail";

    $rows =  db_query($sql)->fetchAll();
    $counter = 1;
    foreach ($rows as $row) {

        $user = new stdClass();
        if(isset($row->field_first_name_value) && isset($row->field_last_name_value)){
            $user->user_name = $row->field_first_name_value . " " . $row->field_last_name_value;
        } else {
            $user->user_name = $row->mail;
        }


        //$message = drupal_mail('mico_user', 'free_membership_notice_email', 'siriwat@bluewall.jpn.com', $language, array('info' => $user), 'mailer@smscoin.jp', TRUE);
        $message = drupal_mail('mico_user', 'free_membership_notice_email', trim($row->mail), $language, array('info' => $user), 'mailer@smscoin.jp', TRUE);
        echo "$counter. email notification sent to $row->mail\r\n";
        $counter++;

    }


}

function _mico_membership_synchronise(){
    $sql = "SELECT uid, mail FROM users WHERE uid NOT IN (SELECT uid FROM smscoin_membership) AND uid>1";

    $rows =  db_query($sql)->fetchAll();
    $counter = 1;
    foreach ($rows as $row) {
        $data = array(
            'email' => $row->mail,
            'uid' => $row->uid,
            'status' => 111,
            'membership_id' => get_membership_id(),
            'registration_time' => date("Y-m-d H:i:s")
        );
        $last_insert_id = db_insert('smscoin_membership')
            ->fields($data)->execute();

        echo "$counter. User $row->mail imported\r\n";
        $counter++;
    }

    $sql = "SELECT * FROM smscoin_membership WHERE `status` < 100;";

    $rows =  db_query($sql)->fetchAll();
    $counter = 1;

    foreach ($rows as $row) {
        $put_data = array(
            'status' => 112
        );
        return db_update('smscoin_membership')
            ->fields($put_data)
            ->condition('email',$row->mail)
            ->execute();

        echo "$counter. User $row->mail updated\r\n";
        $counter++;
    }


}

function _mico_test_command(){
    echo "Successfully imported\r\n";
}
function _mico_user_import_membership(){
    echo "importing started.....\r\n";

    /*
    $sql = "
    SELECT * 
FROM (
    SELECT * FROM token_reservation WHERE uid IS NOT NULL
    ORDER BY reservation_time DESC
) AS sub
GROUP BY sub.user_email
    
    ";
    */
    $sql = "SELECT * FROM token_reservation WHERE uid IN(
SELECT uid FROM users WHERE `status`=0 AND uid IN (SELECT uid
FROM (
    SELECT * FROM token_reservation WHERE uid IS NOT NULL
    ORDER BY reservation_time DESC
) AS sub
GROUP BY sub.user_email
)
)";

    $rows =  db_query($sql)->fetchAll();
    $counter = 1;
    foreach ($rows as $row) {
        $data = array(
            'email' => $row->user_email,
            'uid' => $row->uid,
            'status' => 111,
            'membership_id' => get_membership_id(),
            'registration_time' => date("Y-m-d H:i:s")
        );

        $split = explode(' ', trim($row->user_name),2);
        //print_r($split);
        //echo "First name: ".$split[0] . " Last name: ".$split[1]. "\r\n"; //output yellow-red

        //echo "uid[$row->uid]";
        $last_insert_id = db_insert('smscoin_membership')
            ->fields($data)->execute();

        // Where 'main' is your profile2 type machine name.
        $profile = profile2_create(array('type' => 'main', 'uid' => $row->uid));

        // Add in the necessary custom fields and values.
        $profile->field_first_name[LANGUAGE_NONE][0]['value'] = $split[0];
        $profile->field_last_name[LANGUAGE_NONE][0]['value'] = $split[1];

        // Save the profile2 to the user account.
        profile2_save($profile);

        //$user = user_load($row->uid);
        //$user->status = 1;
        //user_save($user);
        echo "$counter. User $row->user_email imported";
        $counter++;

    }
    $num_updated = db_update('users')
        ->fields(array('status' => 1))
        ->condition('uid', 1, '>')
        ->execute();

    echo "Successfully imported\r\n";

}

