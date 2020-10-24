<?php

namespace dvikan\SimpleWiki;

class Page
{
    private $uri;

    public function __construct($uri)
    {
        $uri = trim($uri, '/');

        // \w includes [a-z A-Z 0-9 _ ]
        if(preg_match('/^[\w-]+$/', $uri) !== 1) {
            throw new \DomainException;
        }

        $this->uri = $uri;
    }

    public function __invoke()
    {
        $filepath = MARKDOWN_DIR . $this->uri . '.md';

        if ( ! file_exists($filepath)) {
            return render('404.tpl', ['message' => 'Nonexisting!']);
        }

        // Prevents arbitrary command execution
        $escapedFilepath = escapeshellarg($filepath);
        $result = shell_exec("markdown $escapedFilepath");

        return render('page.tpl', ['body' => $result]);
    }
}
