<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\SiteSearch\Search;
use Spatie\SiteSearch\SearchResults\SearchResults;

class DocSearch extends Component
{
    public string $query = '';

    public function render()
    {
        return view('livewire.doc-search', [
            'results' => $this->getResults(),
        ]);
    }

    public function getResults(): ?SearchResults
    {
        if (strlen($this->query) <= 2) {
            return null;
        }

        return Search::onIndex('docs')
            ->query($this->query)
            ->get();
    }
}
