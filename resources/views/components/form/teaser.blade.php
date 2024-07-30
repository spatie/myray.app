<div class="flex flex-col gap-4 text-center">
    <div class="mb-4">
        <h2 class="font-display font-bold text-4xl mb-3 text-balance">
            A new Ray is coming soon
        </h2>
        <p class="text-lg leading-tight">Sign up for the waitlist and be one of the first to <br /> get access to <strong class="font-bold text-orange">the new Ray</strong>.
        </p>
    </div>
    <form class="flex text-lg" action="">
        <div
            class="flex p-1 gap-4 bg-neutrals-white-20 rounded-full w-full ring-neutrals-white-20 ring-inset focus-within:ring-2">
            <input class="px-6 py-3 w-full h-full bg-transparent rounded-full outline-none" type="email"
                placeholder="Email address" required>
            <button
                class="whitespace-nowrap font-bold px-5 py-3 bg-gradient-to-r from-orange to-bright-orange hover:to-orange rounded-full border-b border-r border-bright-orange"
                type="submit">Sign up</button>
        </div>
    </form>
    <div class="markup">
        <p class="text-sm text-bleak-purple-extra-light leading-tight">No spam, just occasional product updates. <br />
            By subscribing, you agree to our <a href="{{ route('privacy') }}">privacy policy</a>.</p>
    </div>
</div>
