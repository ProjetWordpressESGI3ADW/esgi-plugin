<?php

    // add_action("init", "esgi_plugin_init");

    // function esgi_plugin_init () {
    //     register_post_type("projet", array(
    //         "label" => _("Projets"),
    //         "singular_label" => _("Projet"),
    //         "public" => true,
    //         "shwo_ui" => true,
    //         "capability_type" => "post",
    //         "hierachical" => false,
    //         "supports" => array("title", "excerpt", "thumbnail")
    //     ));
    // }

class EsgiPlugin {

    public function __construct() {
        include_once plugin_dir_path(__FILE__) . "/marvel-api.php";
        new MarvelApi();
    }

}

new EsgiPlugin();

?>