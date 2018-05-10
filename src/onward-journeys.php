<?php

class OnwardJourneys {
    private $displayedLinks;

    function __construct() {
        $this->displayedLinks = [];
    }

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
            'recent-in-category' => [
                'pattern' => '/\[recent-in-category]/',
                'replace' => function () {
                    $recentPosts = get_posts();
                    foreach($recentPosts as $thePost) :
                        if (!$this->hasDisplayed($thePost->post_name)) {
                            $recentPost = $thePost;
                            break;
                        }
                    endforeach;
                    return $this->linkAndTrack($recentPost->post_name, $recentPost->post_title);
                }
            ],
            'manual-link' => [
                'pattern' => '/\[(.+)\|(.+)\]/',
                'replace' => function ($link_text, $link_url) {
                    return $this->linkAndTrack($link_url, $link_text);
                }
            ],
        ];
        foreach($rules as $ruleName => $rule) :
            $pattern = $rule['pattern'];
            $replace = $rule['replace'];
            $links = array();
            preg_match_all($pattern, $links_markdown, $links, PREG_SET_ORDER);
            foreach($links as $link) :
                $link_markdown = $link[0];
                $links_markdown = substr_replace(
                    $links_markdown,
                    $replace(@$link[1], @$link[2]),
                    strpos($links_markdown, $link_markdown),
                    strlen($link_markdown)
                );
            endforeach;
        endforeach;
        return $links_markdown;
    }

    function hasDisplayed($wordPressSlug) {
        foreach($this->displayedLinks as $displayedLink) {
            if ($displayedLink->url === $wordPressSlug) {
                return true;
            }
        }
        return false;
    }

    function linkAndTrack($link_url, $link_text) {
        $this->displayedLinks[] = (object) [
            'url' => $link_url,
            'text' => $link_text,
        ];
        return '<li><a href="' . $link_url . '">' . $link_text . '</a></li>';
    }
}
