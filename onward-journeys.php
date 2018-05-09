<?php

/**
 * Plugin Name: Onward Journeys
 * Description: Allows editors to define onward journeys within their articles.
 * Version: 1.0.1
 * Author: ChrisBAshton
 * Author URI: https://ashton.codes
 */

require('src/onward-journeys.php');

function create_onward_journeys($the_content) {
    $oj = new OnwardJourneys();
    return $oj->process($the_content);
}

function apply_onward_journey_styling() {
    wp_register_style('onward_journeys', plugin_dir_url(__FILE__) . 'onward-journeys.css');
    wp_enqueue_style('onward_journeys' );
}

add_filter('the_content', 'create_onward_journeys', 1);
add_action('wp_enqueue_scripts', 'apply_onward_journey_styling', 99);

// stop WordPress adding <br /> and <p> tags inside my shortcode (credit: http://sww.co.nz/solution-to-wordpress-adding-br-and-p-tags-around-shortcodes/)
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'wpautop' , 12);
