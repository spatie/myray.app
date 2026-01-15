<?php

namespace App\Domain\Docs;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Event\DocumentRenderedEvent;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Block\HtmlBlock;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use League\CommonMark\Extension\ExtensionInterface;
use \League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Node\Inline\Text;
use League\CommonMark\Output\RenderedContent;
use League\CommonMark\Renderer\HtmlRenderer;

class BladeParsingExtension implements ExtensionInterface
{
    protected array $rendered = [];

    protected array $components = [
        '<x-docs.integrations-overview />',
        '<x-docs.integrations-featured />',
    ];

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(
            DocumentParsedEvent::class, [$this, 'onDocumentParsed'], -10
        );

        $environment->addEventListener(
            DocumentRenderedEvent::class, [$this, 'onDocumentRendered'], 10000
        );
    }

    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
        foreach ($event->getDocument()->iterator() as $node) {
            if (!$this->isKnownComponent($node)) {
                continue;
            }

            $id = Str::uuid()->toString();

            $replacement = new HtmlBlock(HtmlBlock::TYPE_6_BLOCK_ELEMENT);

            $replacement->setLiteral("[[replace:$id]]");

            $node->replaceWith($replacement);

            $this->rendered[$id] = Blade::render($node->getLiteral());
        }
    }

    public function onDocumentRendered(DocumentRenderedEvent $event): void
    {
        $search = [];
        $replace = [];

        foreach ($this->rendered as $id => $content) {
            $search[] = "[[replace:$id]]";
            $replace[] = $content;
        }

        $content = $event->getOutput()->getContent();

        $content = Str::replace($search, $replace, $content);

        $event->replaceOutput(
            new RenderedContent($event->getOutput()->getDocument(), $content)
        );
    }

    protected function isKnownComponent($node): bool
    {
        if (!$node instanceof Text) {
            return false;
        }

        return in_array($node->getLiteral(), $this->components);
    }
}
