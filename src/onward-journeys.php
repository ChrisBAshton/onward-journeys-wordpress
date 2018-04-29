<?php

class OnwardJourneys {
    function process($the_content) {
        foreach($this->onwardJourneyContainers($the_content) as $container) {
            $container_code = $container[0];
            $links_markdown = $container[1];
            $the_content = str_replace(
                $container_code,
                '<ul>' . $this->linksMarkdownToLi($links_markdown) . '</ul>',
                $the_content
            );
        }
        return $the_content;
    }

    function onwardJourneyContainers($the_content) {
        $pattern = "/\[onward\-journeys\]((?:\s|.)+?(?=\[\/onward\-journeys\]))\[\/onward\-journeys\]/";
        $containers = array();
        preg_match_all($pattern, $the_content, $containers, PREG_SET_ORDER);
        return $containers;
    }

    function linksMarkdownToLi($links_markdown) {
        $pattern = "/\[(.+)\|(.+)\]/";
        $links = array();
        preg_match_all($pattern, $links_markdown, $links, PREG_SET_ORDER);
        foreach($links as $link) {
            $link_markdown = $link[0];
            $link_text = $link[1];
            $link_url = $link[2];
            $links_markdown = str_replace(
                $link_markdown,
                '<li><a href="' . $link_url . '">' . $link_text . '</a></li>',
                $links_markdown
            );
        }
        return $links_markdown;
    }
}
