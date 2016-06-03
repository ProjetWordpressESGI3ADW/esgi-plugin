<?php

class MarvelApiWidget extends WP_Widget {

    public function __construct () {
        parent::__construct("marvel_widget", "Marvel Widget", array("description" => "This widget makes queries on marvel's DB"));
    }

    public function widget($args, $instance) {
        echo $args["before_widget"];
        echo $args["before_title"];
        echo apply_filters("widget_title", $instance["title"]);
        echo $args["after_title"];
        ?>

        <form id="marvel-form" data-api-key="<?php echo $instance['api_key'] ?>">
            <p>
                <label for="character_name">Cherchez un personnage: </label>
                <input type="text" name="character_name" id="character_name">
            </p>
            <input type="submit" value="Chercher">
        </form>

        <div class="js-result">
            <h3 class="js-hero-title"></h3>
            <ul class="js-hero-data" style="display:none">
                <li class="js-hero-desc"></li>
                <li>
                    <img class="js-hero-img" alt="hero thumbnail" style="width:200px;">
                </li>
                <li>
                    <a class="js-hero-details" href="" target="_blank">details</a>
                </li>
            </ul>
        </div>

        <?php
        echo $args["after_widget"];
    }

    public function form($instance) {
        $title = isset($instance["title"]) ? $instance["title"] : "";
        $api_key = isset($instance["api_key"]) ? $instance["api_key"] : "";
        ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
            <label for="<?php echo $this->get_field_name('api_key'); ?>"><?php _e('API key:') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('api_key'); ?>" name="<?php echo $this->get_field_name('api_key'); ?>" type="text" value="<?php echo $api_key; ?>">
        </p>
        <?php
    } 
}