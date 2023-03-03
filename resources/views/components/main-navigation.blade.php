<div class="container flex flex-col items-center md:h-full md:justify-between">

    <div class="pt-12 mx-auto text-3xl text-white md:text-4xl nav-row sm:pb-16 md:pb-0">
        <x-lit-nav-list :list="$nav->main" />
    </div>

    <div class="relative pb-24 mt-auto nav-row md:pb-16">

        <div class="flex flex-col pb-0 text-white md:pb-20 lg:pb-0">
            <span class="block mb-8">
                <a class="text-2xl aw-link md:text-3xl" href="mailto:hallo@aw-studio.de">hallo@aw-studio.de</a>
            </span>
            <span class="flex items-center text-xl text-white md:text-2xl">
                <span class="mr-8">
                    @include('partials.svg.icon-phone')
                </span>
                <span>
                    +49 (0) 431 53 03 86 32
                </span>
            </span>
            
            <span class="flex items-center text-xl text-white md:text-2xl">
                <span class="mr-8">
                    @include('partials.svg.icon-cell')
                </span>
                <span>
                    +49 (0) 176 55 94 30 25
                </span>
            </span>
        </div>

        <div class="absolute bottom-0 right-0 pb-0 md:pb-20 lg:pb-0">
            <ul class="flex pt-8 md:pb-4">
                <x-lit-localize />
            </ul>
        </div>

    </div>


</div>

<x-style>
    .lit-nav-list li {
        margin-bottom: 5px;
    }
    .lit-nav-list a {
        font-size: 42px;
        line-height: 48px;
        font-weight: 400;
        padding-bottom: .005rem;
        transition: all 0.2s;
        position: relative;
        transform: translateZ(0);
        border-bottom: 2px solid rgba(255, 255, 255, 0.25);
    }
    @media (min-width: 768px) {
       .lit-nav-list a {
            font-size: 54px;
            line-height: 60px;
       }
    }
    .lit-nav-list a.lit--active {
        margin-left: 60px;
        font-weight: 400;
    }
    .lit-nav-list a:hover {
        border-bottom: 2px solid rgba(255, 255, 255, 1);
        padding-bottom: 0.125rem;
    }
    

    .locale {
        color: white;
        font-size: 16px;
        line-height: 22px;
        margin-left: 0.5rem;
        font-weight: 400;
        opacity: 0.25;
    }
    .locale.locale-active {
        font-weight: 400;
        opacity: 1;
    }
</x-style>
