<div class="container flex flex-col">



    <div class="pt-16 pb-0 mt-20 text-3xl text-white md:text-4xl nav-row sm:pb-16 md:pb-0">
        {{-- <ul class="text-3xl text-white aw-main md:text-4xl">
            <li><a class="" href=""><span class="aw-link">test</span></a></li>
            <li><a class="" href=""><span class="aw-link">test</span></a></li>
            <li><a class="" href=""><span class="aw-link">test</span></a></li>
            <li><a class="" href=""><span class="aw-link">test</span></a></li>
        </ul> --}}
        <x-lit-nav-list :list="$nav->main" />
    </div>

    

    <div class="relative pb-24 mt-auto nav-row md:pb-16">

        <div class="flex flex-col pb-0 text-white md:pb-20 lg:pb-0">
            <span class="block mb-8">
                <a class="text-2xl aw-link md:text-3xl" href="mailto:hallo@aw-studio.de">hallo@aw-studio.de</a>
            </span>
            <span class="flex items-center block text-xl text-white md:text-2xl">
                <span class="mr-8">
                    {{-- @include('partials.svg.icon-phone') --}}
                </span>
                <span>
                    +49 (0) 431 53 03 86 32
                </span>
            </span>
            
            <span class="flex items-center block text-xl text-white md:text-2xl">
                <span class="mr-8">
                    {{-- @include('partials.svg.icon-cell') --}}
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
        font-size: 54px;
        font-weight: 600;
        line-height: 60px;
        padding-bottom: .005rem;
        transition: all 0.2s;
        position: relative;
        transform: translateZ(0);
        border-bottom: 2px solid rgba(255, 255, 255, 0.25);
    }
    .lit-nav-list a.lit--active {
        margin-left: 60px;
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
