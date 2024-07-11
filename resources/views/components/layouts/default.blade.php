@props(['title', 'description'])

<!DOCTYPE html>
<html lang="en" class="bg-midnight text-white antialiased">

<head>
    <x-layouts.head :title="$title" :description="$description" />
</head>

<body class="overflow-x-hidden">

    <header class="sticky p-8 top-0 z-10">
        <div class="max-w-[64rem] mx-auto bg-bleak-purple bg-opacity-50 backdrop-blur-xl text-lg rounded-full shadow-large-drop">
            <div class="p-6 shadow-top-white rounded-full">
                <nav class="flex gap-4 w-full justify-between">
                    <a class="flex align-middle flex-1 basis-1 pl-4" href="#">
                        <img class="w-32" src="/images/ray-logo.svg" alt="Logo">
                    </a>
                    <ul class="flex gap-2">
                        <li><a class="inline-flex px-6 py-4 leading-none border border-transparent rounded-full hover:border-white hover:border-opacity-50"
                                href="#">Docs</a></li>
                        <li><a class="inline-flex px-6 py-4 leading-none border border-transparent rounded-full hover:border-white hover:border-opacity-50"
                                href="#">What's new</a></li>
                        <li><a class="inline-flex px-6 py-4 leading-none border border-transparent rounded-full hover:border-white hover:border-opacity-50"
                                href="#">Blog</a></li>
                    </ul>
                    <ul class="flex-1 text-right">
                        <li><a class="inline-flex px-6 py-4 leading-none rounded-full bg-gradient-to-b from-bright-purple-light to-bright-purple font-bold shadow-top-white hover:to-bright-purple-light"
                                href="#">Buy license</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main x-data="{ download: true }">
        {{ $slot }}
        <x-download.template />
    </main>


    {{-- Force Alpine to initialize on every page --}}
    @livewire('dummy-component')
</body>

</html>
