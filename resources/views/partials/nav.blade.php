<nav id="aw-nav" class="bg-black">

    <div class="container">



        <div class="nav-row pt-16 pb-0 sm:pb-16 md:pb-0">
            <ul class="aw-main text-white text-3xl md:text-4xl">
                <li><a class="{{ Request::url() == __route('home') ? 'aw--active' : '' }}" href="{{ __route('home') }}"><span class="aw-link">{{ __('nav.home') }}</span></a></li>
                <li><a class="{{ Request::url() == __route('services') ? 'aw--active' : '' }}" href="{{ __route('services') }}"><span class="aw-link">{{ __('nav.services') }}</span></a></li>
                <li><a class="{{ Request::url() == __route('references.index') ? 'aw--active' : '' }}" href="{{ __route('references.index') }}"><span class="aw-link">{{ __('nav.references') }}</span></a></li>
                <li><a class="{{ Request::url() == __route('studio') ? 'aw--active' : '' }}" href="{{ __route('studio') }}"><span class="aw-link">{{ __('nav.studio') }}</span></a></li>
            </ul>
        </div>

        <div class="nav-row pb-24 md:pb-16 relative">

            <div class="pb-0 md:pb-20 lg:pb-0">
                @include('partials.contactdata.mail')
                @include('partials.contactdata.phone')
            </div>

            <div class="absolute bottom-0 right-0 pb-0 md:pb-20 lg:pb-0">
                <ul class="flex md:pb-4 pt-8">
                    @foreach (__routes($routeParameters ?? null) as $route)
                    <li><a href="{{ $route->link }}" class="
                      ml-2 text-white hover:opacity-100 transition-all duration-300 uppercase text-sm
                      @if(app()->getLocale() != $route->locale) opacity-25 @endif
                      ">{{ $route->locale }}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>


    </div>

</nav>