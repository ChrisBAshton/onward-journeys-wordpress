<?php

/**
 * Plugin Name: Onward Journeys
 * Description: Allows editors to define onward journeys within their articles.
 * Version: 1.0.0
 * Author: ChrisBAshton
 * Author URI: https://ashton.codes
 */

require('src/onward-journeys.php');

function create_onward_journeys($the_content) {
    $oj = new OnwardJourneys();
    return $oj->process($the_content);
}

add_filter('the_content', 'create_onward_journeys', 1);

// stop WordPress adding <br /> and <p> tags inside my shortcode (credit: http://sww.co.nz/solution-to-wordpress-adding-br-and-p-tags-around-shortcodes/)
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'wpautop' , 12);
