<?php
global $base_url, $user, $language;
$profile = profile2_load_by_user($user->uid, 'main');

?>

  <div class="container">
    <h4>
      <img src="<?php print $base_url . "/" . path_to_theme() . '/images/logo.png'; ?>" />
    </h4>

    <div class="header-right">
        <?php if ($user->uid < 1):?>
              <button class="btn header-login" data-toggle="modal" data-target="#loginModal"><?php echo t("Login"); ?></button>
              <!--<button class="btn header-signup" data-toggle="modal" data-target="#registerModal"><?php echo t("Register"); ?></button>-->
        <?php endif; ?>
        <?php if ($user->uid > 0):?>
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i aria-hidden="true" class="mdi mdi-account"></i> <?php echo isset($profile->field_first_name[LANGUAGE_NONE][0]['value']) ? $profile->field_first_name[LANGUAGE_NONE][0]['value'] : "" ?>
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <a href="/<?php echo $language->language; ?>/user/<?php echo $user->uid; ?>"><?php echo t("Profile"); ?></a>
                  </li>
                  <li>
                    <a href="/<?php echo $language->language; ?>/user/logout"><?php echo t("Logout"); ?></a>
                  </li>
                </ul>
              </div>
        <?php endif; ?>
    </div>

  </div>


  <?php if($user->uid < 1 ) {
        $login_form = drupal_get_form('user_login');
        $password_reset_form = drupal_get_form('user_pass');
         $register_form = drupal_get_form('user_register_form');
         //print_r($register_form);
    }
?>

  <div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <h3><?php echo t("Register an account"); ?></h3>
        <div id="ajax-user-register-form-wrapper">
          <?php print drupal_render($register_form); ?>
        </div>
      </div>
    </div>
  </div>
<div id="passwordReset" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php if ($user->uid < 1):?>
            <h3><?php echo t("Password Reset") ?></h3>
            <div class="modal-body">
                <?php print drupal_render($password_reset_form); ?>
                <?php endif; ?>
                <p class="message"><?php echo t("A password reset email will be sent"); ?></p>
            </div>
        </div>
    </div>
</div>

<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <?php if ($user->uid < 1):?>
        <h3>
          <?php echo t("Please sign in") ?>
        </h3>
        <?php print drupal_render($login_form); ?>
        <?php endif; ?>
        <p class="message"><?php echo t("Not registered?"); ?> <a style="cursor: pointer;" data-toggle="modal" data-target="#registerModal"><?php echo t("Create an account"); ?></a></p>
        <p class="message"><a style="cursor: pointer;" data-toggle="modal" data-target="#passwordReset"><?php echo t("Lost your password?"); ?></a></p>
      </div>
    </div>
  </div>




  <style type="text/css">
    .messages {
      display: block !important;
      height: 65px;
    }

    #user-register-form legend, #ajax-user-register-form-wrapper legend {
      display: none;
    }

      #terms-of-use-wrapper legend {
          display: none;
      }
      #terms-of-use-wrapper input {
          width: auto !important;
      }

    #terms-of-use-wrapper label {
        color: black;
    }
    #terms-of-use-wrapper .form-required{
        display: none;
    }
    #terms-of-use-wrapper a{
        text-decoration: underline;
    }

  </style>
