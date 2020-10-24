<?php

namespace dvikan\SimpleWiki;

const TEMPLATES_DIR = __DIR__.'/../templates/';

function render($template, $vars = [])
{
    extract($vars);

    ob_start();

    require TEMPLATES_DIR . 'header.tpl';
    require TEMPLATES_DIR . $template;
    require TEMPLATES_DIR . 'footer.tpl';

    $html = ob_get_clean();

    return $html;
}
