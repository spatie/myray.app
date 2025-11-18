@props(['button' => 'Download trial'])

<button data-role="download-link"
    class="btn-orange-h inline-flex gap-2 text-xl px-6 py-4 font-bold rounded-md  shadow-top-white align-middle"
    @click="download = true">
    {{ $button }}
    <img class="inline w-20" src="/images/os-logos.svg" alt="For MacOS, Windows and Linux">
</button>
