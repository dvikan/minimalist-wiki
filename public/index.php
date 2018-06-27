<?php

require __DIR__.'/../vendor/autoload.php';

ini_set('display_errors', true);

const TEMPLATES_DIR = __DIR__.'/../templates';
const MARKDOWN_DIR = __DIR__.'/../var';

$uri = $_SERVER['REQUEST_URI'];

if($uri === '/') {
    $page = new vikan\wiki\Frontpage;
} else {
    $page = new vikan\wiki\Page($uri);
}

print $page();
