<?php

class OnwardJourneys {
    function process($the_content) {
        foreach($this->onwardJourneyContainers($the_content) as $container) {
            $container_code = $container[0];
            $links_markdown = $container[1];
            $the_content = str_replace(
                $container_code,
                '<ul class="onward-journeys">' . $this->linksMarkdownToLi($links_markdown) . '</ul>',
                $the_content
            );
        }
        return $the_content;
    }

    function onwardJourneyContainers($the_content) {
        // matches [onward-journeys] shortcode, allowing any characters and spaces in the middle
        // until it reaches a closing [/onward-journeys] shortcode.
        $pattern = "/\[onward\-journeys\]((?:\s|.)+?(?=\[\/onward\-journeys\]))\[\/onward\-journeys\]/";
        $containers = array();
        preg_match_all($pattern, $the_content, $containers, PREG_SET_ORDER);
        return $containers;
    }

    function linksMarkdownToLi($links_markdown) {
        $rules = [
            'manual-link' => [
                'pattern' => '/\[(.+)\|(.+)\]/',
                'replace' => function ($link_text, $link_url) {
                    return '<li><a href="' . $link_url . '">' . $link_text . '</a></li>';
                }
            ],
            'recent-in-category' => [
                'pattern' => '/\[recent-in-category]/',
                'replace' => function ($link_text, $link_url) {
                    return '<li><a href="/portfolio">My Portfolio</a></li>';
                }
            ]
        ];
        foreach($rules as $ruleName => $rule) :
            $pattern = $rule['pattern'];
            $replace = $rule['replace'];
            $links = array();
            preg_match_all($pattern, $links_markdown, $links, PREG_SET_ORDER);
            foreach($links as $link) :
                $link_markdown = $link[0];
                $links_markdown = str_replace(
                    $link_markdown,
                    $replace(@$link[1], @$link[2]),
                    $links_markdown
                );
            endforeach;
        endforeach;
        return $links_markdown;
    }
}
