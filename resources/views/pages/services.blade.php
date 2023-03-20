@extends('app')

@section('meta')
<x-lit-meta :for="$services" />
@endsection

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('content')

<section class="bg-white">
    <div class="container pt-20">
        <div class="grid grid-cols-12">
            <div class="col-start-1 col-span-full lg:col-span-5">
                <h1 class="text-sm uppercase text-black mt-2 mb-2 tracking-widest">
                    {{ $services->h1 }}
                </h1>
            </div>
            <div class="lg:col-start-6 col-span-full lg:col-span-7">
                <h2 class="h1">
                    {{ $services->h2 }}
                </h2>
                <div class="text-xl">
                    {!! $services->text_intro !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-20 bg-white">
    <div class="bg-beige py-20">
    <div class="container pb-8 md:pd-12 lg:pb-16">
        <div class="grid grid-flow-row grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 items-stretch">
            @foreach ($services->services as $service)
            <div class="mb-0 group/service-item hover:scale-[1.025] transition-all duration-300  hover:drop-shadow-2xl">
                <a href="{{ __route('services.show', $service->slug)}}" class="block translate duration-300 relative h-full ">
                    <div class="bg-white rounded-md z-10 relative h-full">
                        <div class="flex flex-col h-full">
                            <div class="p-6">
                                <div class="mb-8 h-24 flex items-center transform group-hover/service-item:translate-x-2 transition duration-300 ease-in-out">
                                    {!! $service->svg !!}
                                </div>
                                <span class="block text-xl font-normal mb-2">
                                    {{ $service->title }}
                                </span>
                                <div class="pr-4 text-sm mb-0">
                                    {{ $service->excerpt }}
                                </div>
                            </div>
                            <div class="mt-auto w-full flex justify-end p-4">
                                <div class="bg-beige group-hover/service-item:bg-black rounded-md w-10 h-10 flex items-center justify-center transition-all duration-300">
                                    <svg 
                                class="
                                stroke-black transition-all duration-300
                                group-hover/service-item:stroke-white
                                group-hover/service-item:animate-point-fast
                                "
                                width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5 7H15M15 7L8.625 1M15 7L8.625 13" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
</section>

<section class="bg-white">
    <div class="container pt-12 md:pt-20 pb-20">
        <div class="grid grid-cols-12">
            <div class="col-start-1 col-span-12 lg:col-span-5 uppercase text-sm mb-4 tracking-widest">
                Unser Fokus 
            </div>
            <div class="lg:col-start-6 col-span-full lg:col-span-7">
                <h2 class="mb-0 h1">
                    {!! nl2br(e($services->h2_philosophy_quote)) !!}
                </h2>
                <div class="mt-4">
                    {!! $services->text_philosophy_credit !!}
                </div>
                <div class="text-xl">
                    {!! $services->text_philosophy !!}
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bg-white border-t border-black">
    <div class="container pt-12 md:pt-20 pb-20">
        <div class="grid grid-cols-12">
            <div class="col-start-1 col-span-12 lg:col-span-5 uppercase text-sm mb-4 tracking-widest">
                Unsere Methoden 
            </div>
            <div class="lg:col-start-6 col-span-full lg:col-span-7 text-xl">
                <h2 class="h1">
                    {!! nl2br(e($services->h2_workflow)) !!}
                </h2>
                <div class="text-xl">
                    {!! $services->text_workflow !!}
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pt-12 lg:pt-20 bg-beige">
    <div class="container pb-8 md:pd-12 lg:pb-20">
        <div class="grid grid-flow-row grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4 ">
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

<section class="py-20 lg:py-40 bg-white border-t border-white">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('references.index') }}">{{ __('app.next-references') }}</a>
    </div>
</section>

@endsection
