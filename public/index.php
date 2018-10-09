<?php

require __DIR__.'/../vendor/autoload.php';

ini_set('display_errors', true);

const MARKDOWN_DIR = __DIR__.'/../var/';

$uri = $_SERVER['REQUEST_URI'];

if($uri === '/') {
    $page = new vikan\wiki\Index;
} else {
    $page = new vikan\wiki\Page($uri);
}

print $page();
