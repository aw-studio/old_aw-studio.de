    <section class="pt-20 pb-24 bg-black lg:pb-8">
        <div class="container text-white">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 col-start-1 md:col-start-1 md:col-span-9">

                    @include('partials.contactdata.mail')

                    <div class="grid grid-cols-9">
                        <div class="col-span-9 col-start-1 mb-8 md:col-start-1 md:col-span-6 lg:col-start-1 lg:col-span-5">
                            @include('partials.contactdata.phone')
                        </div>
                        <div class="col-span-7 col-start-1 md:col-start-1 md:col-span-4 lg:col-start-7 lg:col-span-3">

                            <div class="grid grid-cols-2 mt-2">
                                @include('partials.contactdata.apps')
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-span-12 col-start-1 mt-4 md:col-start-10 md:col-span-3">
                    <ul class="flex w-full md:justify-end">
                        <li class="mr-4 md:mr-0 md:ml-4">
                            <a href="https://www.instagram.com/alle_wetter/" target="_blank" aria-label="Instagram" rel="noreferrer">
                                @include('partials.svg.icon-instagram')
                            </a>
                        </li>
                        <li class="mr-4 md:mr-0 md:ml-4">
                            <a href="https://www.linkedin.com/company/alle-wetter/" target="_blank" aria-label="LinkedIn" rel="noreferrer">
                                @include('partials.svg.icon-linkedin')
                            </a>
                        </li>
                        <li class="mr-4 md:mr-0 md:ml-4">
                            <a href="https://github.com/aw-studio" target="_blank" aria-label="GitHub" rel="noreferrer">
                                @include('partials.svg.icon-github')
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-5 mt-20">
                <div class="col-span-12 col-start-1 md:col-start-1 md:col-span-9">
                    <span class="mr-4 font-semibold">//* Alle Wetter</span>
                    <span class="block mr-4 md:inline">{{ __('app.claim') }}</span>
                    <span class="block mr-4 md:inline">Burgstr. 4, D-24103 Kiel</span>
                </div>
                <div class="col-span-12 col-start-1 md:col-start-10 md:col-span-3">
                    <ul class="flex w-full md:justify-end">
                        <li class="mr-4 text-sm md:mr-0 md:ml-4">
                            <a class="aw-link" href="{{__route('datapolicy')}}">{{ __('nav.datapolicy') }}</a>
                        </li>
                        <li class="mr-4 text-sm md:mr-0 md:ml-4">
                            <a class="aw-link" href="{{__route('imprint')}}">{{ __('nav.imprint') }}</a>
                        </li>
                        <li class="mr-4 text-sm md:mr-0 md:ml-4">
                            <a class="aw-link" href="{{__route('directions')}}">{{ __('nav.directions') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>