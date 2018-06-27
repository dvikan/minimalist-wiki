<?php

namespace vikan\wiki;

class Frontpage
{
    public function __invoke()
    {
        $pages = $this->getPages();

        ob_start();
        require TEMPLATES_DIR . '/index.tpl';
        $html = ob_get_clean();

        return $html;
    }

    private function getPages()
    {
        $pages = [];
        $iterator = new \DirectoryIterator(MARKDOWN_DIR);

        foreach($iterator as $file) {
            if ($file->isDot()) {
                continue;
            }

            $pages[] = basename($file->getFilename(), '.md');
        }

        return $pages;
    }
}
