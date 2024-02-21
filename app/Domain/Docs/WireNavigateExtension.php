<?php

namespace App\Domain\Docs;

use Exception;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\CommonMark\Renderer\Inline\LinkRenderer;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;
use Spatie\Url\Url;

class WireNavigateExtension implements ExtensionInterface, NodeRendererInterface, ConfigurationAwareInterface
{
    private ConfigurationInterface $configuration;

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addRenderer(Link::class, $this, 10);
    }

    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        if (! $node instanceof Link) {
            throw new Exception('Unsupported node');
        }

        $url = Url::fromString($node->getUrl());

        if ($url->getFirstSegment() === 'docs') {
            $node->data->set(
                'attributes',
                array_merge($node->data->get('attributes'), ['wire:navigate' => true]),
            );
        }


        $renderer = new LinkRenderer();
        $renderer->setConfiguration($this->configuration);

        return $renderer->render($node, $childRenderer);
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->configuration = $configuration;
    }
}
