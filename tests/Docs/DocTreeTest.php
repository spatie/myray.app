<?php

use App\Domain\Docs\Models\DocTree;
use App\Domain\Docs\Sheets\DocsPage;

beforeEach(function () {
   $this->docTree = DocTree::build();
});

it('can build a new DocTree', function () {
    expect(count($this->docTree->categories))->toBeGreaterThanOrEqual(3);
    expect(count($this->docTree->flatPages))->toBeGreaterThanOrEqual(1);
});

it('can retrieve a default/first page', function () {
    expect($this->docTree->firstPage())->toBeInstanceOf(DocsPage::class);
});
