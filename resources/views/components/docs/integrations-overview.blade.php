<div class="grid grid-cols-3 gap-4">
    @foreach($docs as $doc)
        <a href="{{$doc->url}}" class="text-center mb-1">
            <div class="transition-border border hover:border-indigo-500 rounded custom-shadow p-4 flex align-items-center justify-center">
                <img class="w-3/5" src="https://myray.app/images/logos/{{$doc->parts[1]}}.png" alt="{{$doc->title}}">
            </div>

            <strong class="font-semibold text-xs text-black mt-2 inline-block">{{$doc->title}}</strong>
        </a>
    @endforeach
</div>
