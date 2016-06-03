<?php

class MarvelApiWidget extends WP_Widget {

    public function __construct () {
        parent::__construct("marvel_widget", "Marvel Widget", array("description" => "This widget makes queries on marvel's DB"));
    }

    public function widget($args, $instance) {
        echo "Widget Marvel";
    }

    public function form($instance) {
        $title = isset($instance["title"]) ? $instance["title"] : "";
        ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
        </p>
        <?php
    } 
}