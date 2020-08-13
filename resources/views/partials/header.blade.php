<header class="bg-black fixed w-full top-0 left-0 z-50 text-white h-16 sm:h-24 flex items-center">
    <div class="container flex justify-between">
        <span class="flex items-center">
            <a href="{{ __route('home') }}">
                <b class="mr-2">//* Alle Wetter</b> <span class="hidden sm:inline-block">{{ __('app.claim') }}</span>
            </a>
        </span>
        <burger />
    </div>
</header>