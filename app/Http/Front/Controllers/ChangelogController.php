<?php

namespace App\Http\Front\Controllers;

use App\Actions\GetChangelogAction;
use Illuminate\Contracts\View\View;

class ChangelogController
{
    public function __invoke(GetChangelogAction $getChangelog): View
    {
        return view('changelog.show', [
            'versions' => $getChangelog->execute(),
        ]);
    }
}
