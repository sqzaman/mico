<?php
global $base_url, $language;

?>
<nav class="navbar navbar-default nav">
    <div class="container-fluid container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <?php
        $menus = menu_tree_all_data("menu-ico-menu");
        //print_r($menus);
        $items = array();
        foreach($menus as $menu){
            //print_r($menu);exit;
            if($menu["link"]["hidden"] != 1)
            $items[$menu["link"]["weight"]] = array("title" => $menu["link"]["title"], "link_path" => $menu["link"]["link_path"]);
        }
        ksort($items);
        //$languages = language_list('enabled');

        //print_r($languages);exit;
       // echo request_uri()."<br />";
       // echo current_path()."<br />";

       // $current_url = url("ja/".current_path(), array('absolute' => TRUE,
       //     'query' => drupal_get_query_parameters()));
       // echo $current_url
        $type = 'language';
        $path = drupal_is_front_page() ? '<front>' : $_GET['q'];
        $languages = language_negotiation_get_switch_links($type, $path);

   // if (!empty($languages->links)) {
  //      $block['content'] = drupal_get_form('lang_dropdown_form', $languages, $type);
   //     $block['subject'] = t('Languages');
  //      return $block;
  //  }

        $form = drupal_get_form('lang_dropdown_form', $languages, $type);

        $lang_name = "?q=$language->language";
        ?>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php foreach($items as $item) : ?>
                    <?php

                    if ($item["link_path"] != "<front>" && preg_match('/.*?(\\d+)/is', $item['link_path'], $i)) {
                        $href = variable_get('void_menu_link_value' . $i[1], $i[1] == 1 ? '#' : '');
                    }
                    $target = '';
                    if(($item['title'] == "How to buy")){
                        $href = $item["link_path"];
                        $target = 'target="_blank"';
                    }

                    ?>
                    <li><a <?php echo $target ?> href="<?php print $item["link_path"] == "<front>" ? "/".$lang_name : $href?>"><?php print t($item['title'])?></a></li>
                <?php endforeach; ?>
            </ul>

            <?php print drupal_render($form); ?>


        </div>
    </div>
</nav>
<!--<a href="#block-mico-ui-ico-token-presale-reservation" class="reservation-button"><button><?php echo t("Join now");?></button></a>-->