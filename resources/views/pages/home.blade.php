@extends('app')

@section('meta')
<x-lit-meta :for="$form" />
@endsection

@section('appclass')
aw-home
@endsection

@section('content')


<section class="aw-first-section">
    @if($form->header_images->count() > 0)
        <div class="relative pt-80 bg-[#feb350]" style="background-image:url({{ $form->header_images->first()->url }});background-size:cover;background-position:center;">
    @endif
    <div class="relative container py-20 lg:py-24 aw-jumbo">
        @if ($form->buzzwords)
            <h1 class="text-2xl sm:text-4xl lg:text-5xl" data-buzzwords="@foreach ($form->buzzwords->shuffle() as $buzzword){{ $buzzword->buzzword }},@endforeach">
                @bot
                    {!! nl2br(e($form->h1)) !!}
                    @foreach ($form->buzzwords as $buzzword){{ $buzzword->buzzword }}, @endforeach
                @else
                    <span class="bg-white px-4 inline-block rounded-md">
                        {{ $form->h1 }}
                    </span>
                    <br>
                    <span class="bg-white px-4 mt-2 inline-block rounded-md"><span id="typed-buzzwords"></span></span>
                @endbot 
            </h1>
        @endif
    </div>
</div>
</section>

<section class="bg-white">
    <div class="container pt-20">

        <div class="grid grid-cols-12 mb-20">
            <div class="col-start-1 col-span-5 uppercase text-sm">
                Design & Development
            </div>
            <div class="col-start-6 col-span-7 text-xl">
                <h2 class="h1">
                    {!! nl2br(e($form->h2)) !!}
                </h2>
                <div class="text-xl">
                    {!! $form->text_intro !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-beige">
    <div class="container pt-20">

<div class="grid grid-cols-12 gap-5">

    <div class="col-span-12">

        <h2 class="text-sm uppercase tracking-wider">
            {{ $form->h2_services }}
        </h2>

        @if($form->services)
        <div class="grid grid-cols-12 grid-flow-row gap-1 mb-20">
            @foreach($form->services as $service)
            <div class="col-span-6 md:col-span-4 lg:col-span-3 xl:col-span-2">
                <a href="{{ __route('services.show', $service->slug)}}" class="group/service-item block translate duration-300 relative">
                    <div class="z-10 relative pb-4 rounded-md">
                        <div class="-ml-2 mb-4 h-32 transform translate duration-150 scale-90 group-hover/service-item:scale-100 flex justify-center items-end">
                            {!! $service->svg !!}
                        </div>
                        <div class="text-sm font-normal translate mb-4 flex justify-center">
                            <span class="translate duration-300 border-b border-beige group-hover/service-item:border-black">
                                {{ $service->title }}
                            </span>
                        </div>
                    </div>
                    {{-- <div class="absolute top-0 left-0 h-full w-full drop-shadow-2xl group-hover/service-item:drop-shadow-3xl bg-white rounded-md" class="z-index:-1;"></div> --}}
                </a>
            </div>
            @endforeach
        </div>
        @endif

        @if($form->solutions)
        <div class="grid grid-cols-12 gap-5 lg:grid-cols-8 lg:mb-40 ">
            @foreach($form->solutions as $solution)
            <div class="col-span-12 col-start-1 mb-8 md:col-span-6 lg:col-span-3">
                <h3 class="h3">
                    {{ $solution->title }}
                </h3>
                <div class="mb-8">
                    {!! $solution->svg !!}
                </div>
                <div class="aw-list">
                    {!! $solution->list !!}
                </div>
                {!! $solution->text !!}
            </div>
            @endforeach
        </div>
        @endif
    </div>
    <div class="col-span-12 col-start-1 pb-20 lg:col-start-9 lg:col-span-4">
        <div class="md:sticky top-sticky lg:float-right ">
            <x-button type="dark" text="{{ $form->button_services }}" link="{{ __route('services') }}" />
        </div>
    </div>
</div>
</div>
</section>


<section class="bg-white">
    <div class="container pt-20">

        <div class="grid grid-cols-12 mb-20">
            <div class="col-start-1 col-span-5 uppercase text-sm">
                        {{ $form->h2_solutions }}
            </div>
            <div class="col-start-6 col-span-7 text-xl">
                    <div class="aw-list lg:columns-2">
                        {!! $form->list_solutions !!}
                    </div>
            </div>
        </div>
    </div>
</section>



<section class="py-8 bg-black md:py-20 lg:py-40">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 mb-8 md:col-start-2 md:col-span-9 lg:col-start-1 lg:col-span-5 lg:mb-20">
                <div class="text-white uppercase">
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
    <div class="container pt-20">
        <div class="col-start-1 col-span-5 uppercase text-sm">
            {{ $form->h2_customers }}
        </div>
        <div>
            <x-logowall />
        </div>
    </div>
</section>

@if($posts->isNotEmpty())

<section class="bg-white border-t border-black">
    <div class="container pt-20">

        <div class="grid grid-cols-12 mb-20">
            <div class="col-start-1 col-span-5 uppercase text-sm">
                {{ __('app.posts') }}
            </div>
            <div class="col-start-6 col-span-7 text-xl">
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
    <div class="container pt-20">

        <div class="grid grid-cols-12 mb-20">
            <div class="col-start-1 col-span-5 uppercase text-sm">
                {{ $form->h3_management }}
            </div>
            <div class="col-start-6 col-span-7 text-xl">
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
    <div class="container pt-20">

        <div class="grid grid-cols-12 mb-20">
            <div class="col-start-1 col-span-5 uppercase text-sm">
                Jobs
            </div>
            <div class="col-start-6 col-span-7 text-xl">
                <x-jobs />
            </div>
        </div>
    </div>
</section>


<section class="pt-40 pb-40 bg-white border-t border-white">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('services') }}">{{ __('app.next-services') }}</a>
    </div>
</section>


@endsection


