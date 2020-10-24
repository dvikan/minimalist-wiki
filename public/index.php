<?php

namespace dvikan\SimpleWiki;

require __DIR__.'/../vendor/autoload.php';

ini_set('display_errors', true);

const MARKDOWN_DIR = __DIR__.'/../var/';

$uri = $_SERVER['REQUEST_URI'];

if($uri === '/') {
    $page = new Index();
} else {
    $page = new Page($uri);
}

print $page();
