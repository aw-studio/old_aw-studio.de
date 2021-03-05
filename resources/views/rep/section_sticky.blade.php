
<x-lit-section cols="1" class="py-8 bg-black md:py-20 lg:py-40">
    <div class="col-span-12 col-start-1 mb-8 md:col-start-2 md:col-span-9 lg:col-start-1 lg:col-span-5 lg:mb-20">
        <div class="lg:sticky top-sticky">
            <h2 class="mb-0 h1 lg:pr-8">
                {{$rep->headline}}
            </h2>
            <div class="mt-8 aw-list">
                {!!$rep->text!!}
            </div>
        </div>
    </div>
    <div class="col-span-12 col-start-1 mb-12 lg:col-start-6 lg:col-span-7 lg:mb-0">
        @block($rep->content)
        {{-- <x-button type="light" text="{{ __('app.all-references') }}" link="{{ __route('references.index') }}" /> --}}
    </div>
</x-lit-section>