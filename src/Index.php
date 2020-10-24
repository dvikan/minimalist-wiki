<?php

namespace dvikan\SimpleWiki;

class Index
{
    public function __invoke()
    {
        return render('index.tpl', ['pages' => $this->getPages()]);
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
