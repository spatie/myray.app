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

it('can find a page by slug', function () {
    $page = $this->docTree->find('getting-started/local-environments');
    expect($page->title)->toEqual('Local Environments');
});

it('can find a category by slug', function () {
   $category = $this->docTree->findCategory('getting-started');
   ray($category);
});
