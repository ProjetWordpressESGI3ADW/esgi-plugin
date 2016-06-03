<?php

include_once plugin_dir_path( __FILE__ ) . "/marvel-api-widget.php";

class MarvelApi {

    public function __construct() {
        add_action("widgets_init", function () {
            register_widget("MarvelApiWidget");
        });
    }
}