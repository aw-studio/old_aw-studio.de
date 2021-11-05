@extends('app')

@section('meta')
{{-- @if ($services->meta->title)
<title>{{ $services->meta->title }}</title>
@endif --}}
<x-lit-meta :for="$services" />
@endsection

@section('bodyclass')
aw-first-section-is-white
@endsection

{{-- @section('meta')
<x-meta :metaTitle="$services->metaTitle" :metaDescription="$services->metaDescription" :metaKeywords="$services->metaKeywords" />
@endsection --}}


@section('content')

<section class="bg-white">
    <div class="container pt-20 pb-20 lg:pb-40">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 lg:col-span-3">
                <h1 class="mb-4 text-xl text-black">
                    {{ $services->h1 }}
                </h1>
            </div>
            <div class="col-span-12 col-start-1 lg:col-start-4 lg:col-span-1">
                @include('partials.svg.icon-arrow-ttb')
            </div>
            <div class="col-span-12 col-start-1 lg:col-start-5 lg:col-span-8">
                <x-lit-image :image="$services->image" class="w-full" />
            </div>
        </div>
        <div class="grid grid-cols-12 gap-5 mt-20 lg:mt-40">
            <div class="col-span-12 col-start-1 lg:col-span-7">
                <h2 class="h1">
                    {{ $services->h2 }}
                </h2>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 text-xl md:col-span-6 lg:col-span-7">
                {!! $services->text_intro !!}
            </div>
            <div class="col-span-12 col-start-1 text-xl md:col-start-8 md:col-span-5 lg:col-start-9 lg:col-span-4 md:mt-20">
                {!! $services->text_litstack !!}
            </div>
        </div>
    </div>
</section>

<section class="pt-20 bg-white border-t border-black lg:pt-40">
    <div class="container pb-8 md:pd-12 lg:pb-40">
        <div class="grid grid-flow-row grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($services->services as $service)
            <div class="mb-8 lg:mb-20">
                <h3 class="h3">
                    {{ $service->h3 }}
                </h3>
                <div class="flex object-contain h-32 mb-4">
                    @isset($service->illustration_svg)
                        {!! $service->illustration_svg !!}
                    @endisset
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


<section class="pt-20 bg-white border-t border-black lg:pt-40">
    <div class="container pb-20 lg:pb-40">
        <div class="grid grid-cols-12 gap-5">

            <div class="col-span-12 col-start-1 md:col-start-2 md:col-span-7 lg:col-start-3 lg:col-span-5">
                <h2 class="mb-0 h1">
                    {!! nl2br(e($services->h2_philosophy_quote)) !!}
                </h2>
                <div class="mt-4">
                    {!! $services->text_philosophy_credit !!}
                </div>
            </div>

            <div class="col-span-12 col-start-1 text-xl md:col-start-4 md:col-span-7 lg:col-start-6 lg:col-span-5">
                {!! $services->text_philosophy !!}
            </div>

        </div>
    </div>
</section>

<section class="bg-white">

    <div class="container pb-40">

        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 lg:col-start-1 lg:col-span-7">
                @isset($services->images[0])
                <x-lit-image :image="$services->images[0]" class="w-full" />
                @endisset
            </div>
            <div class="col-span-12 col-start-1 lg:col-start-8 lg:col-span-1">
                @include('partials.svg.icon-arrow-ttb')
            </div>

            <div class="col-span-12 col-start-1 mt-8 mb-8 sm:col-start-1 sm:col-span-8 lg:col-start-9 lg:col-span-5 lg:mt-64 lg:mb-20">
                @isset($services->images[1])
                <x-lit-image :image="$services->images[1]" class="w-full" />
                @endisset
            </div>
            <div class="col-span-12 col-start-1 lg:col-start-4 lg:col-span-6">
                @isset($services->images[2])
                <x-lit-image :image="$services->images[2]" class="w-full" />
                @endisset
            </div>

        </div>

    </div>

</section>


<section class="pt-20 bg-white border-t border-black lg:pt-40">
    <div class="container pb-8 md:pd-12 lg:pb-40">

        <div class="grid grid-cols-12 gap-5 mb-20">

            <div class="col-span-12 col-start-1 md:col-span-10 lg:col-span-6">
                <h2 class="h1">
                    {!! nl2br(e($services->h2_workflow)) !!}
                </h2>
                <div class="text-xl">
                    {!! $services->text_workflow !!}
                </div>
            </div>

        </div>

        <div class="grid grid-flow-row grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($services->methods as $method)
            <div class="pr-12 mb-8">

                <div class="flex items-end object-contain h-16 mb-6">
                    @isset($method->illustration_svg)
                        {!! $method->illustration_svg !!}
                    @endisset
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



<section class="pt-40 pb-40 bg-white border-t border-white">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('references.index') }}">{{ __('app.next-references') }}</a>
    </div>
</section>

@endsection