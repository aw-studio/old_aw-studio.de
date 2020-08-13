@extends('app')

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('appclass')
aw-home
@endsection

@section('meta')
@if ($home->metaImage)
<meta property="og:image" content="{{ $home->metaImage->getFullUrl('xl') }}">
@endif

@if ($home->metaTitle)
<meta property="og:title" content="{{ $home->metaTitle }}">
@endif

@if ($home->metaDescription)
<meta property="og:description" content="{{ $home->metaDescription }}">
@endif

<x-meta :metaTitle="$home->metaTitle" :metaDescription="$home->metaDescription" :metaKeywords="$home->metaKeywords" />
@endsection

@section('content')

<section class="bg-white aw-first-section">

    <div class="container py-20 lg:py-24 aw-jumbo">
        <h1 class="text-2xl sm:text-3xl lg:text-5xl font-semibold">{!! nl2br(e($home->h1)) !!}</h1>
    </div>

</section>

@php
$playground_no = rand(1,3);
// $playground_no = 2;
@endphp

<playground-{{ $playground_no }}></playground-{{ $playground_no }}>

<section class="bg-white">
    <div class="container pt-20">

        <div class="grid grid-cols-12 gap-5">
            <div class="
            col-start-1 col-span-12
            lg:col-span-8
            ">

                <div class="mb-20 lg:mb-40">
                    <h2 class="h1">
                        {!! nl2br(e($home->h2)) !!}
                    </h2>
                </div>

                <div class="grid
                grid-cols-12
                lg:grid-cols-8
                gap-5
                lg:mb-40
                ">
                    <div class="
                    col-start-1 col-span-12
                    md:col-start-1 md:col-span-5
                    lg:col-start-2 lg:col-span-3
                    mb-8">
                        <h3 class="h3">
                            {{ $home->h3_design }}
                        </h3>
                        <div class="mb-8">
                            @include('partials.svg.icon-design')
                        </div>
                        <div class="aw-list">
                            {!! $home->list_design !!}
                        </div>
                        {!! $home->text_design !!}
                    </div>
                    <div class="
                    col-start-1 col-span-12
                    md:col-start-7 md:col-span-5
                    lg:col-start-6 lg:col-span-3
                    mb-8">
                        <h3 class="h3">
                            {{ $home->h3_development }}
                        </h3>
                        <div class="mb-8">
                            @include('partials.svg.icon-design')
                        </div>
                        <div class="aw-list">
                            {!! $home->list_development !!}
                        </div>
                        {!! $home->text_development !!}
                        </ul>
                    </div>
                </div>


            </div>
            <div class="
            col-start-1 col-span-12
            lg:col-start-9 lg:col-span-4
            pb-20">
                <div class="md:sticky top-sticky lg:float-right ">
                    <x-button type="dark" text="{{ $home->button_services }}" link="{{ __route('services') }}" />
                </div>
            </div>
        </div>

    </div>
</section>


<section class="bg-black py-8 md:py-20 lg:py-40">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="
            col-start-1 col-span-12
            md:col-start-2 md:col-span-9
            lg:col-start-1 lg:col-span-5
            mb-8 lg:mb-20
            ">
                <div class="lg:sticky top-sticky">
                    <h2 class="h1 mb-0 lg:pr-8">
                        {{ $home->h2_solutions }}
                    </h2>
                    <div class="aw-list mt-8">
                        {!! $home->list_solutions !!}
                    </div>
                </div>
            </div>
            <div class="
            col-start-1 col-span-12
            lg:col-start-6 lg:col-span-7
            mb-12 lg:mb-0
            ">
                <x-references-teaser />
                <x-button type="light" text="{{ __('app.all-references') }}" link="{{ __route('references.index') }}" />
            </div>
        </div>
    </div>
</section>


<section class="bg-white py-8 md:py-20 lg:py-40">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="
            col-start-1 col-span-12
            lg:col-start-1 lg:col-span-4
            ">
                <div class="lg:sticky top-sticky">
                    <h2 class="h1 mb-0">
                        {{ $home->h2_customers }}
                    </h2>
                </div>
            </div>
            <div class="
            mt-8 lg:mt-0
            col-start-1 col-span-12
            lg:col-start-6 lg:col-span-7
            ">
                <x-customers />
            </div>
        </div>

    </div>

</section>


<section class="bg-white pb-20 md:pb-40 lg:pb-40 border-t border-black pt-20">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="
            col-start-1 col-span-12
            md:col-start-1 md:col-span-6
            lg:col-start-1 lg:col-span-6
            mb-20
            ">
                <h2 class="h3">{{ $home->h3_management }}</h2>
                <div class="text-xl">
                    {!! $home->text_management !!}
                </div>
                <div class="grid grid-flow-row
                grid-cols-3
                gap-5 mb-8">
                    @foreach ($home->team_members as $team_member)
                    <div>
                        <x-image :image="$team_member->image" :alt="$team_member->name" />
                        <p class="text-sm mt-2">
                            {{ $team_member->name }}
                        </p>
                    </div>
                    @endforeach
                </div>
                <x-button type="dark" text="{!! $home->button_studio !!}" link="{{ __route('studio') }}" />
            </div>
            <div class="
            col-start-1 col-span-12
            md:col-start-8 md:col-span-5
            lg:col-start-9 lg:col-span-4
            md:mt-64">
                <x-jobs />
            </div>
        </div>

    </div>

</section>


<section class="bg-white border-t border-white pt-40 pb-40">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('services') }}">{{ __('app.next-services') }}</a>
    </div>
</section>

@endsection