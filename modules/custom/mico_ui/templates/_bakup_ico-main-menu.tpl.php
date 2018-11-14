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
        $items = array();
        foreach($menus as $menu){
            $target = '';

            if(isset($menu["link"]["options"]["attributes"]["target"])){
                $target = $menu["link"]["options"]["attributes"]["target"];
            }

            if($menu["link"]["hidden"] != 1) {
                $items[$menu["link"]["weight"]] = array("title" => $menu["link"]["title"], "link_path" => $menu["link"]["link_path"], "target" => $target);
            }

        }
        ksort($items);
        $type = 'language';
        $path = drupal_is_front_page() ? '<front>' : $_GET['q'];
        $languages = language_negotiation_get_switch_links($type, $path);
        $form = drupal_get_form('lang_dropdown_form', $languages, $type);

        $lang_name = "";
        if($language->language == "ja") {
            $lang_name = "?q=ja";
        } else if ($language->language == "en") {
            $lang_name = "?q=en";
        }
        ?>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php foreach($items as $item) : ?>
                    <?php
                    $results = array();
                    $regex = "/<void(\d)>/";
                    preg_match($regex, $item["link_path"], $results);

                    if(count($results) > 0 && is_numeric($results[1])){
                        $href = variable_get('void_menu_link_value' . $results[1], $results[1] == 1 ? '#' : '');
                    } else if($item["link_path"] == "<front>") {
                        $href = "/".$lang_name;
                    } else {
                        $href = "/".$lang_name."/".$item["link_path"];
                    }

                    ?>
                    <li><a target="<?php print $item["target"] ?>" href="<?php print $href; ?>"><?php print t($item['title'])?></a></li>
                <?php endforeach; ?>
            </ul>

            <?php print drupal_render($form); ?>
        </div>
    </div>
</nav>
