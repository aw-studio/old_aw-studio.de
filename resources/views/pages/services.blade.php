@extends('app')

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('meta')
<x-meta :metaTitle="$services->metaTitle" :metaDescription="$services->metaDescription" :metaKeywords="$services->metaKeywords" />
@endsection


@section('content')

<section class="bg-white aw-first-section">
    <div class="container pt-20 pb-20 lg:pb-40">

        <div class="grid grid-cols-12 gap-5">
            <div class="
            col-start-1 col-span-12
            lg:col-span-3">
                <h1 class="text-xl mb-4 text-black">
                    {{ $services->h1 }}
                </h1>
            </div>
            <div class="
            col-start-1 col-span-12
            lg:col-start-4 lg:col-span-1
            ">
                @include('partials.svg.icon-arrow-ttb')
            </div>
            <div class="
            col-start-1 col-span-12
            lg:col-start-5 lg:col-span-8">
                <x-image :image="$services->image" />
            </div>
        </div>

        <div class="grid grid-cols-12 gap-5 mt-20 lg:mt-40">
            <div class="
            col-start-1 col-span-12
            lg:col-span-7">
                <h2 class="h1">
                    {{ $services->h2 }}
                </h2>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-5">
            <div class="col-start-1 col-span-12
            md:col-span-6
            lg:col-span-7
            text-xl">
                {!! $services->text_intro !!}
            </div>
            <div class="
            col-start-1 col-span-12
            md:col-start-8 md:col-span-5
            lg:col-start-9 lg:col-span-4
            md:mt-20
            text-xl">
                {!! $services->text_fjord !!}
            </div>
        </div>

    </div>
</section>


<section class="bg-white border-t border-black pt-20 lg:pt-40">
    <div class="container pb-8 md:pd-12 lg:pb-40">
        <div class="grid grid-flow-row grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($services->services as $service)
            <div class="mb-8 lg:mb-20">
                <h3 class="h3">
                    {{ $service->h3 }}
                </h3>
                <div class="flex h-40 items-center">
                    <img src="{{ $service->illustration->url }}" class="mb-8" alt="Illustration: {{ $service->h3 }}">
                </div>

                <div class="aw-list">
                    {!! $service->list_primary !!}
                </div>
                {!! $service->list_secondary !!}
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="bg-white border-t border-black pt-20 lg:pt-40">
    <div class="container pb-20 lg:pb-40">
        <div class="grid grid-cols-12 gap-5">

            <div class="
            col-start-1 col-span-12
            md:col-start-2 md:col-span-7
            lg:col-start-3 lg:col-span-5
            ">
                <h2 class="h1 mb-0">
                    {!! nl2br(e($services->h2_philosophy_quote)) !!}
                </h2>
                <div class="mt-4">
                    {!! $services->text_philosophy_credit !!}
                </div>
            </div>

            <div class="
            col-start-1 col-span-12
            md:col-start-4 md:col-span-7
            lg:col-start-6 lg:col-span-5
            text-xl
            ">
                {!! $services->text_philosophy !!}
            </div>

        </div>
    </div>
</section>

<section class="bg-white">

    <div class="container pb-40">

        <div class="grid grid-cols-12 gap-5">
            <div class="
            col-start-1 col-span-12
            lg:col-start-1 lg:col-span-7">
                <x-image :image="$services->images[0]"/>
            </div>
            <div class="
            col-start-1 col-span-12
            lg:col-start-8 lg:col-span-1
            ">
                @include('partials.svg.icon-arrow-ttb')
            </div>

            <div class="
            col-start-1 col-span-12
            sm:col-start-1 sm:col-span-8
            lg:col-start-9 lg:col-span-5
            mt-8 lg:mt-64 mb-8 lg:mb-20
            ">
                <x-image :image="$services->images[1]"/>
            </div>
            <div class="
            col-start-1 col-span-12
            lg:col-start-4 lg:col-span-6">
                <x-image :image="$services->images[2]"/>
            </div>

        </div>

    </div>

</section>


<section class="bg-white border-t border-black pt-20 lg:pt-40">
    <div class="container pb-8 md:pd-12 lg:pb-40">

        <div class="grid grid-cols-12 gap-5 mb-20">

            <div class="col-start-1 col-span-12 md:col-span-10 lg:col-span-6">
                <h2 class="h1">
                    {!! nl2br(e($services->h2_workflow)) !!}
                </h2>
                <div class="text-xl">
                    {!! $services->text_workflow !!}
                </div>
            </div>

        </div>

        <div class="grid grid-flow-row grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($services->methods as $method)
            <div class="mb-8 pr-12">

                <div class="flex h-16 items-end">
                    <img src="{{ $method->illustration->url }}" class="mb-8" alt="Illustration: {{ $method->h3 }}">
                </div>

                <h3 class="h3">
                    {{ $method->h3 }}
                </h3>

                {!! $method->text !!}
            </div>
            @endforeach
        </div>


    </div>
</section>



<section class="bg-white border-t border-white pt-40 pb-40">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('references.index') }}">{{ __('app.next-references') }}</a>
    </div>
</section>

@endsection