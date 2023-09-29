@extends('app')

@section('meta')
<x-lit-meta :for="$form" />
@endsection

@section('appclass')
aw-home
@endsection

@section('content')

<section class="aw-first-section">
    @if($form->header_images && $form->header_images->count() > 0)
        <div class="relative pt-32 md:pt-56 lg:pt-80 pb-8 md:pb-10 lg:pb-12 bg-[#feb350]" style="background-image:url({{ $form->header_images->first()->url }});background-size:cover;background-position:center;">
            <div class="container relative aw-jumbo">
                @if ($solutions->count() > 0)
                    <div id="buzzwords" data-buzzwords="@foreach ($solutions->shuffle() as $solution){{ $solution->title }},@endforeach">
                        @bot
                            {!! nl2br(e($form->h1)) !!}
                            @foreach ($solutions as $solution){{ $solution->title }}, @endforeach
                        @else
                            <span class="inline-block px-4 py-1 mb-2 text-lg bg-white rounded-md md:py-2 sm:text-2xl md:text-3xl lg:text-4xl md:mb-3">
                                {{ $form->h1 }}
                            </span>
                            <div></div>
                            <span class="inline-block px-4 py-1 text-lg bg-white rounded-md clear-left md:py-2 sm:text-2xl md:text-3xl lg:text-4xl"><span id="typed-buzzwords"></span></span>
                        @endbot 
                        </div>
                @endif
            </div>
        </div>
    @endif
</section>

<section class="bg-white">
    <div class="container pt-12 md:pt-20">
        <div class="grid grid-cols-12 mb-20">
            <div class="col-span-12 col-start-1 mb-4 text-sm tracking-widest uppercase lg:col-span-5">
                Design & Development 
            </div>
            <div class="text-xl lg:col-start-6 col-span-full lg:col-span-7">
                <h1 class="h1">
                    {!! nl2br(e($form->h2)) !!}
                </h1>
                <div class="text-xl">
                    {!! $form->text_intro !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-beige">
    <div class="container pt-12 md:pt-20">

<div class="grid grid-cols-12 gap-5">

    <div class="col-span-12">

        <h2 class="text-sm tracking-widest uppercase">
            {{ $form->h2_services }}
        </h2>

        @if($form->services)
        <div class="grid grid-flow-row grid-cols-10 gap-1 mb-20">
            @foreach($form->services as $service)
            <div class="col-span-6 md:col-span-4 lg:col-span-3 xl:col-span-2">
                <a href="{{ __route('services.show', $service->slug)}}" class="relative block duration-300 group/service-item translate">
                    <div class="relative z-10 pb-4 rounded-md">
                        <div class="flex items-end justify-center h-32 mb-4 -ml-2 duration-150 transform scale-90 translate group-hover/service-item:scale-100 group-active/service-item:scale-90">
                            {!! $service->svg !!}
                        </div>
                        <div class="flex justify-center mb-4 text-sm font-normal translate">
                            <span class="duration-300 border-b translate border-beige group-hover/service-item:border-black">
                                {{ $service->title }}
                            </span>
                        </div>
                    </div>
                    {{-- <div class="absolute top-0 left-0 w-full h-full bg-white rounded-md drop-shadow-2xl group-hover/service-item:drop-shadow-3xl" class="z-index:-1;"></div> --}}
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    <div class="col-span-12 col-start-1 pb-12 lg:pb-20 lg:col-start-9 lg:col-span-4">
        <div class="flex justify-end pb-6">
            <x-button type="dark" text="{{ $form->button_services }}" link="{{ __route('services') }}" />
        </div>
    </div>
</div>
</div>
</section>


<section class="bg-white">
    <div class="container pt-12 md:pt-20">
        <div class="grid grid-cols-12 mb-20">
            <div class="col-span-12 col-start-1 mb-6 text-sm tracking-widest uppercase lg:col-span-5">
                        {{ $form->h2_solutions }}
            </div>
            <div class="col-span-12 text-xl lg:col-start-6 lg:col-span-7">
                    <div class="aw-list md:columns-2">
                        <ul>
                        @foreach ($form->solutions as $solution)
                        <li>
                        {{ $solution->title }}
                        </li>
                        @endforeach
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</section>



<section class="py-12 bg-black md:py-20 lg:py-40">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 mb-8 lg:col-start-1 lg:col-span-5 lg:mb-20">
                <div class="tracking-widest text-white uppercase">
                    {{ __('app.highlight_references') }}
                </div>
            </div>
            <div class="col-span-12 col-start-1 mb-12 lg:col-start-6 lg:col-span-7 lg:mb-0">
                <x-references-teaser />
                <div class="flex justify-end">
                    <x-button type="light" text="{{ __('app.all-references') }}" link="{{ __route('references.index') }}" />
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bg-white">
    <div class="container pt-12 md:pt-20">
        <div class="col-span-5 col-start-1 text-sm tracking-widest uppercase">
            {{ $form->h2_customers }}
        </div>
        <div>
            <x-logowall />
        </div>
    </div>
</section>

@if($posts->isNotEmpty())

<section class="bg-white border-t border-black">
    <div class="container pt-12 md:pt-20">

        <div class="grid grid-cols-12 mb-20">
            <div class="col-start-1 mb-4 text-sm tracking-widest uppercase col-span-full lg:col-span-5">
                {{ __('app.posts') }}
            </div>
            <div class="text-xl lg:col-start-6 col-span-full lg:col-span-7">
                <h2 class="mb-0 h1">
                    {{ $form->h2_blog}}
                </h2>
                <div class="grid grid-cols-12 gap-6">
                    @foreach($posts as $post)
                    <div class="col-span-12 mt-6 lg:col-span-6 lg:mt-12">
                        @if ($post->active)
                            <x-post :post="$post" />
                        @endif
                    </div>
                    @endforeach
                </div>
                <div class="flex justify-end pt-12">
                    <x-button type="dark" text="{{ $form->button_blog }}" link="{{ __route('blog.index') }}" />
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="bg-white border-t border-black">
    <div class="container pt-12 md:pt-20">

        <div class="grid grid-cols-12 mb-20">
            <div class="col-start-1 mb-4 text-sm tracking-widest uppercase col-span-full lg:col-span-5">
                {{ $form->h3_management }}
            </div>
            <div class="text-xl lg:col-start-6 col-span-full lg:col-span-7">
                 <div class="text-xl">
                    {!! $form->text_management !!}
                </div>
                <x-lit-image :image="$form->image_studio" class="w-full rounded-md" />
                <div class="flex justify-end pt-12">
                    <x-button :type="'dark'" text="{!! $form->button_studio !!}" link="{{ __route('studio') }}" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white border-t border-black">
    <div class="container pt-12 md:pt-20">

        <div class="grid grid-cols-12 mb-20">
            <div class="col-start-1 mb-4 text-sm tracking-widest uppercase col-span-full lg:col-span-5">
                Jobs
            </div>
            <div class="text-xl lg:col-start-6 col-span-full lg:col-span-7">
                <x-jobs />
            </div>
        </div>
    </div>
</section>


<section class="py-20 bg-white border-t border-black lg:py-40">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('services') }}">{{ __('app.next-services') }}</a>
    </div>
</section>


@endsection


