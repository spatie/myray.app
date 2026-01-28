<?php

namespace App\Support\Search;


use Carbon\CarbonInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Spatie\SiteSearch\Indexers\Indexer;
use Symfony\Component\DomCrawler\Crawler;

class DocsSearchIndexer implements Indexer
{
    protected Crawler $domCrawler;

    public function __construct(
        protected UriInterface $url,
        protected ResponseInterface $response
    ) {
        $html = (string)$this->response->getBody();

        $this->domCrawler = new Crawler($html);
    }

    public function pageTitle(): ?string
    {
        return attempt(fn () => $this->domCrawler->filter('title')->first()->text());
    }

    public function h1(): ?string
    {
        return attempt(fn () => strip_tags($this->domCrawler->filter('h1')->first()->text()));
    }

    public function description(): ?string
    {
        $description = attempt(fn () => $this->domCrawler->filterXPath("//meta[@name='description']")->attr('content'));

        return preg_replace('/\s+/', ' ', $description);
    }

    public function entries(): array
    {
        return attempt(function () {
            $this->removeIgnoredContent($this->domCrawler);

            return $this->domCrawler->filter('#site-search-docs-content')->html();
        });
    }

    public function extra(): array
    {
        return [];
    }

    protected function getHtmlToIndex(): ?string
    {
        return attempt(function () {
            $this->removeIgnoredContent($this->domCrawler);

            return $this->domCrawler->filter("body")->html();
        });
    }

    protected function removeIgnoredContent(Crawler $crawler): Crawler
    {
        foreach (config('site-search.ignore_content_by_css_selector') as $selector) {
            $this->domCrawler
                ->filter($selector)
                ->each(function (Crawler $crawler) {
                    foreach ($crawler as $node) {
                        $node->parentNode->removeChild($node);
                    }
                });
        }

        return $crawler;
    }

    public function dateModified(): ?CarbonInterface
    {
        return now();
    }

    public function url(): UriInterface
    {
        return $this->url;
    }
}
