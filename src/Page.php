<?php

namespace vikan\wiki;

class Page
{
    private $uri;

    public function __construct($uri)
    {
        if( ! preg_match('/^[a-z-]$/', $uri) === 1) {
            throw new \DomainException('Illegal filename. Only letters and dash is allowed');
        }

        $this->uri = $uri;
    }

    public function __invoke()
    {
        $filepath = MARKDOWN_DIR.'/'.$this->uri.'.md';

        $compiledMarkdown = $this->compileMarkdown($filepath);

        ob_start();
        require TEMPLATES_DIR.'/page.tpl';
        $html = ob_get_clean();

        return $html;
    }

    private function compileMarkdown($filepath)
    {
        if ( ! file_exists($filepath)) {
            return '<br>404';
        }

        $escapedFilepath = escapeshellarg($filepath); // Prevents arbitrary command execution

        $result = shell_exec("markdown $escapedFilepath");

        if($result === null) {
            return 'Compilation of markdown failed. Run apt-get install markdown';
        }

        return $result;
    }
}
