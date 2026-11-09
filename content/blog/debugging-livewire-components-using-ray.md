---
title: 'Debugging Livewire components using Ray'
date: '2023-10-06T00:00:00.000000Z'
updated_at: '2023-10-13T12:59:14.000000Z'
published: true
summary: "Ray has a few tricks up its sleeve to make debugging Livewire components very easy. Let's take a look!"
authors:
  -
    name: Freek
    avatar: /media/blog/authors/a1b4b398630bbd32b77a82cbc37fae9a.png
header_image: null
og_image: null
tags: {}
---
[Livewire](https://livewire.laravel.com) is a fantastic package for creating interactive interfaces in a Laravel app. Using Livewire, you can write component classes that define interactive behavior.

Ray has a few tricks up its sleeve to make debugging Livewire components very easy. Let's take a look!

## Our example component

We will work with a straightforward Livewire component to search for quotes in the database.

Here's what that component could look like:

```
namespace App\Http\Livewire;

use App\Models\Quote;
use Illuminate\Support\Collection;
use Livewire\Component;

class SearchComponent extends Component
{
    public string $searchingFor = '';

    public function render()
    {
        return view('livewire.search', [
            'quotes' => $this->getQuotes()
        ]);
    }

    public function getQuotes(): Collection
    {
        if (empty($this->searchingFor)) {
            return collect();
        }

        return Quote::search($this->searchingFor);
    }
}
```

And this is the content of that `livewire.search` Blade view:

```
<div>
    <div class="mt-1 mb-4">
        <div>
            <input type="text" wire:model.debounce.200ms="searchingFor" />
        </div>
    </div>

    @if (! empty($searchingFor))
        @if(count($quotes))
            <ul>
                @foreach($quotes as $quote)
                    <li>
                        {{ $quote->text }}
                    </li>
                @endforeach
            </ul>
        @else
            <div>
                No quotes were found
            </div>
        @endif
    @endif
</div>
```

And here's how it looks like rendered in the browser.

![](/media/blog/ray/debugging-livewire-components-using-ray/7qa8xp3xk7eafb8kxyblnhvqy0arybae5o6c1uum.jpg)



## Inspecting the Livewire component using Ray

The simplest thing you can do to debug is to send the entire component state to Ray so that you can inspect all of its properties. Let's add a line `ray($this)` in the `render` method.

```
public function render()
{
		ray($this);

    return view('livewire.search', [
        'quotes' => $this->getQuotes()
    ]);
}
```

In Ray, you can now see all of the properties and configuration of the component.

![](/media/blog/ray/debugging-livewire-components-using-ray/cxbtgywgqzkozpdhqhcxkby6pnlkyht99v3qkioj.jpg)



Granted, this is a straightforward example. But trust me when I say that when debugging more complex real-world components, seeing the entire state of a component is very handy.

## Let's do it live

Ray can also shine when interacting with Livewire components. It can display state changes live.

Let's demonstrate this by sending `searchingFor` property to Ray and start typing in the component.

```
public function render()
{
    ray($this->searchingFor);

    return view('livewire.search', [
        'quotes' => $this->getQuotes()
    ]);
}
```

In Ray, you can now see the values change in real time.

![](/media/blog/ray/debugging-livewire-components-using-ray/dxeafb5t2liczhqv4bqtjt5lpvjiruvhe2mkrtuq.gif)



Again, a straightforward example, but I can promise you that if your Livewire component is more complex and offers more ways of interacting, live inspecting parts of the state is magical.

If you only want to see the final state after having interacted with your component, you can add a `ray()->clearScreen()` line in the render method of your component. This clears Ray's screen when the component gets (re)rendered.

```
public function render()
{
		ray()->clearScreen();
    ray($this->searchingFor);

    return view('livewire.search', [
        'quotes' => $this->getQuotes()
    ]);
}
```

In this recording, you can see that in action.

![](/media/blog/ray/debugging-livewire-components-using-ray/yqvq7wr1jeuqoxxzxvyiftxkebtyrovlau6fyuur.gif)



## Bonus tip: using the Ray Blade directive

If you're working with a Blade view (either a regular one or one used by a Livewire component), you can use the `@ray` directive to send stuff to Ray.

So instead of adding that `ray($this->searchingFor);` line to the `render()` method, you can also do that in the view.

```
{{-- start of view omitted for brevity --}}
</div>
    
@ray($searchingFor)

@if (! empty($searchingFor))
 
{{-- end of view omitted for brevity --}}
```
