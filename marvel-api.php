<?php

include_once plugin_dir_path( __FILE__ ) . "/marvel-api-widget.php";

class MarvelApi {

    public function __construct() {
        add_action("widgets_init", function () {
            register_widget("MarvelApiWidget");
        });
        add_action("wp_enqueue_scripts", $this->marvel_api_scripts($this));
    }

    public function marvel_api_scripts () {
        wp_enqueue_script("jquery");
        wp_enqueue_script("plugin-form", plugins_url("static/js/plugin-form.js", __FILE__));
    }
}