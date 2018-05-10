<?php

function get_posts() {
    return [
        (object) [
            'post_name' => 'portfolio',
            'post_title' => 'My Portfolio',
        ],
        (object) [
            'post_name' => 'diff',
            'post_title' => 'Something different',
        ]
    ];
}

function get_the_category() {
    return [
        (object) [
            'term_id' => 0,
        ]
    ];
}
