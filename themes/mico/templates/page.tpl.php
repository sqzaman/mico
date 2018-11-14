<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108069331-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108069331-1');
</script>

<!-- リマーケティング タグの Google コード -->
<!--------------------------------------------------
リマーケティング タグは、個人を特定できる情報と関連付けることも、デリケートなカテゴリに属するページに設置することも許可されません。タグの設定方法については、こちらのページをご覧ください。
http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 833441910;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/833441910/?guid=ON&amp;script=0"/>
    </div>
</noscript>

<!-- Yahoo Code for your Target List -->
<script type="text/javascript">
    /* <![CDATA[ */
    var yahoo_ss_retargeting_id = 1000405352;
    var yahoo_sstag_custom_params = window.yahoo_sstag_params;
    var yahoo_ss_retargeting = true;
    /* ]]> */
</script>
<script type="text/javascript" src="https://s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="https://b97.yahoo.co.jp/pagead/conversion/1000405352/?guid=ON&script=0&disvt=false"/>
    </div>
</noscript>

<!-- Yahoo Code for your Target List -->
<script type="text/javascript" language="javascript">
    /* <![CDATA[ */
    var yahoo_retargeting_id = 'YI6RNBR5JK';
    var yahoo_retargeting_label = '';
    var yahoo_retargeting_page_type = '';
    var yahoo_retargeting_items = [{item_id: '', category_id: '', price: '', quantity: ''}];
    /* ]]> */
</script>
<script type="text/javascript" language="javascript" src="https://b92.yahoo.co.jp/js/s_retargeting.js"></script>

<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '116066602420875');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=116066602420875&ev=PageView&noscript=1"
    /></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

<div id="page-wrapper">
    <div id="page">

<header class="header">
    <?php print render($page['header']); ?>
</header>
    <?php if ($main_menu): ?>
        <?php print render($page['main_menu']); ?>
    <?php endif; ?>

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">

    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php //print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>

    <div id="content" class="column"><div class="section">
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>


        <?php if ($title && !drupal_is_front_page()): ?>
            <h1 class="title" id="page-title">
                <?php print $title; ?>
            </h1>
        <?php endif; ?>

      <?php print render($title_suffix); ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>

    </div></div> <!-- /.section, /#content -->

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>

  </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
    <div id="triptych-wrapper"><div id="triptych" class="clearfix">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>

    <div id=""><footer class="section">

            <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
                <div id="footer-columns" class="clearfix">
                    <?php print render($page['footer_firstcolumn']); ?>
                    <?php print render($page['footer_secondcolumn']); ?>
                    <?php print render($page['footer_thirdcolumn']); ?>
                    <?php print render($page['footer_fourthcolumn']); ?>
                </div> <!-- /#footer-columns -->
            <?php endif; ?>

            <?php if ($page['footer']): ?>
                <footer class="footer">
                    <?php print render($page['footer']); ?>
                </footer> <!-- /#footer -->
            <?php endif; ?>

        </div>
    </div>

</div></div> <!-- /#page, /#page-wrapper -->
<script>
   // console.log(Drupal.settings.mico_core);
</script>
<button onclick="topFunction()" id="backToTop" title="Go to top"><span class="mdi mdi-arrow-up-thick"></span></button>
<div id="ajax-loader-general" class="ajax-loader-general" ></div>
<div class="modal fade" id="message-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><?php //echo t('Success');?></h4>
            </div>


            <div id="message-modal-container">
                <div class="alert alert-success" id="message-success">
                    <span id="message"></span>
                </div>
            </div>
            <div class="alert alert-warning" id="message-warning" style="display: none; clear:both;">
                <span id="message"></span>
            </div>
        </div>
    </div>
</div>
<style type="text/css" >
    #ajax-loader-general{
        display: none;
        position:fixed;
        top: 60%;
        left: 50%;
        width:30em;
        margin-top: -9em; /*set to a negative number 1/2 of your height*/
        margin-left: -15em; /*set to a negative number 1/2 of your width*/
        border: 1px solid #ccc;
        background-color: #f3f3f3;
        z-index: 100;
        background-image: url("/sites/all/themes/mico/img/ajax-loader.gif");
        background-repeat: no-repeat;
        background-position-x: center;
        background-position-y: center;
        height: 2em;

    }
    iframe {
        display:none;
    }

    .modal-dialog-center {
        margin-top: 25%;
    }

    #ajax-user-register-form-wrapper input {
        width: 100%;
        padding: 1em;
        margin: .5em 0;
        border-radius: 3px;
        border: 1px solid #CA3058;
        color: black;
    }
    #ajax-user-register-form-wrapper {
        margin: 8em auto;
        max-width: 500px;
        width: 100%;
    }

    #ajax-user-register-form-wrapper input[type=submit] {
        background: linear-gradient(to right, #CA3058, #FF9948);
        color: white;
        border: 1px solid #f5f5f5;
        padding: 1em;
        margin-top: 1.25em;
        width: 100%;
        border-radius: 3px;
    }

    #registerModal #ajax-user-register-form-wrapper{
        margin: 0 auto !important;
    }

</style>