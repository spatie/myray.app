@persist('footer')
<footer class="flex flex-col gap-12 items-center">
    <nav>
        <ul class="flex gap-6">
            <li>
                <a wire:navigate class="text-lg font-bold hover:underline" href="{{ route('termsOfUse') }}">Terms of use</a>
            </li>
            <li>
                <a wire:navigate class="text-lg font-bold hover:underline" href="{{ route('privacy') }}">Privacy policy</a>

            </li>
            <li>
                <button class="text-lg js-confetti" href="#">🎉</button>
            </li>
        </ul>
    </nav>
    <a class="hover:opacity-90" href="https://spatie.be/?ref=myray.app" target="_blank">
        <img class="h-12" src="/images/spatie.svg" alt="Spatie">
    </a>
</footer>
@endpersist()
