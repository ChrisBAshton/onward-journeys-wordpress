<?php

class OnwardJourneys {
    function __construct($the_content = '') {
        // $containers = array();
        // $pattern = "/\[onward\-journeys\](.+)\[/onward\-journeys\]/gm";
        // preg_match_all($pattern, $the_content, $links);
        // var_dump($links);
        return $the_content;
    }
    //
    // create_onward_journeys__backup($content) {
    //     $rawSlideshow = getRawSlideshow($content);
    //     if ($rawSlideshow) {
    //         try {
    //             $placeholder = "***PLACEHOLDER***"; // @todo make this rand() - any article with ***PLACEHOLDER*** as content will screw up
    //             $articleWithoutSlideshow = replaceSlideshowWith($content, $placeholder);
    //             $cookedSlideshow = cookSlideshow($rawSlideshow);
    //             $content = str_replace($placeholder, $cookedSlideshow, $articleWithoutSlideshow);
    //         } catch(Exception $e) {
    //             $content = "<!-- SLIDESHOW COULDN'T PARSE BBCODE: ".$e->getMessage()." --> " . $content;
    //         }
    //     }
    //     return $content;
    // }
    //
    // getRawSlideshow($content) {
    //     $slideshow = get_string_between($content, "[onward-journeys]", "[/onward-journeys]");
    //     if(strlen($slideshow) > 0) {
    //     	 return "[onward-journeys]" . $slideshow . "[/onward-journeys]";
    //     }
    //     return false;
    // }
    //
    // replaceSlideshowWith($content, $placeholder) {
    //     $slideshowStartsAt = strpos($content, "[onward-journeys]");
    //     $slideshowEndsAt = strpos($content, "[/onward-journeys]") + strlen("[/onward-journeys]");
    //     $beginningOfArticle = substr($content, 0, $slideshowStartsAt);
    //     $endOfArticle = substr($content, $slideshowEndsAt, strlen($content));
    //     return $beginningOfArticle . $placeholder . $endOfArticle;
    // }
    //
    // cookSlideshow($slideshow) {
    //     $links = array();
    //     $pattern = "/\[(.+)\|(.+)\]/";
    //     preg_match_all($pattern, $slideshow, $links);
    //     // $slideshow = processLinks($links[0], $links[1], $slideshow);
    //     return $slideshow;
    // }
    //
    // processLinks($text, $url, $html) {
    //     return $text + $url + $html;
    // }
    //
    // // credit http://stackoverflow.com/a/9826656
    // get_string_between($string, $start, $end){
    //     $string = " ".$string;
    //     $ini = strpos($string,$start);
    //     if ($ini == 0) return "";
    //     $ini += strlen($start);
    //     $len = strpos($string,$end,$ini) - $ini;
    //     return substr($string,$ini,$len);
    // }
}
