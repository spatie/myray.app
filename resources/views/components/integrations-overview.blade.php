<div class="grid grid-cols-3 gap-4">
    @foreach($docs as $doc)
        <a href="{{$doc->url}}" class="text-center">
            <div class="border rounded p-5 flex align-items-center justify-center">
                <img class="w-3/5" src="{{Vite::asset('resources/images/logos/'.$doc->parts[1].'.png')}}" alt="{{$doc->title}}">
            </div>

            <strong class="font-semibold text-sm mt-1 inline-block">{{$doc->title}}</strong>
        </a>
    @endforeach
</div>
