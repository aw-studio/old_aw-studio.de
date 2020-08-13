<footer class="border-t border-white pb-20 lg:pb-0">
    <section class="bg-black pt-20 pb-8">
        <div class="container text-white">
            <div class="grid grid-cols-12 gap-5">
                <div class="
                col-start-1 col-span-12
                md:col-start-1 md:col-span-9
                ">

                    @include('partials.contactdata.mail')

                    <div class="grid grid-cols-9">
                        <div class="
                        col-start-1 col-span-9
                        md:col-start-1 md:col-span-6
                        lg:col-start-1 lg:col-span-5
                        mb-8
                        ">
                            @include('partials.contactdata.phone')
                        </div>
                        <div class="
                        col-start-1 col-span-7
                        md:col-start-1 md:col-span-4
                        lg:col-start-7 lg:col-span-3
                        ">

                            <div class="grid grid-cols-2 mt-2">
                                @include('partials.contactdata.apps')
                            </div>

                        </div>
                    </div>

                </div>

                <div class="
                col-start-1 col-span-12
                md:col-start-10 md:col-span-3
                mt-4">
                    <ul class="w-full flex md:justify-end">
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
                <div class="
                col-start-1 col-span-12
                md:col-start-1 md:col-span-9
                ">
                    <span class="font-semibold mr-4">//* Alle Wetter</span>
                    <span class="block md:inline mr-4">{{ __('app.claim') }}</span>
                    <span class="block md:inline mr-4">Burgstr. 4, D-24103 Kiel</span>
                </div>
                <div class="
                col-start-1 col-span-12
                md:col-start-10 md:col-span-3
                ">
                    <ul class="w-full flex md:justify-end">
                        <li class="text-sm mr-4 md:mr-0 md:ml-4">
                            <a class="aw-link" href="{{ __route('datapolicy') }}">{{ __('nav.datapolicy') }}</a>
                        </li>
                        <li class="text-sm mr-4 md:mr-0 md:ml-4">
                            <a class="aw-link" href="{{ __route('imprint') }}">{{ __('nav.imprint') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</footer>