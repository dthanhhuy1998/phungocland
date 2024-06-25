<?php

namespace App\Http\Controllers;

use SEOMeta;
use OpenGraph;
use Twitter;
use JsonLd;
abstract class Controller
{
    public function seotools($title, $desc, $keyword, $url, $image) {
        SEOMeta::setTitle($title)
        ->setDescription($desc)
        ->setKeywords($keyword)
        ->setCanonical($url);

        OpenGraph::setTitle($title)
        ->setDescription($desc)
        ->setUrl($url)
        ->addImage($image)
        ->setSiteName($url);

        Twitter::setTitle($title)
        ->setDescription($desc)
        ->setUrl($url)
        ->setType('website')
        ->setImage($image)
        ->setSite($url);

        JsonLd::setType('real estate')
        ->setImage($image)
        ->setTitle($title)
        ->setDescription($desc)
        ->setUrl($url)
        ->setSite($title);
    }
}
