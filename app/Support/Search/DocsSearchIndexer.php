<?php

namespace App\Support\Search;

use Spatie\SiteSearch\Indexers\DefaultIndexer;

class DocsSearchIndexer extends DefaultIndexer
{
    protected function getHtmlToIndex(): ?string
    {
        return attempt(function () {
            $this->removeIgnoredContent($this->domCrawler);

            return $this->domCrawler->filter('#site-search-docs-content')->html();
        });
    }
}
