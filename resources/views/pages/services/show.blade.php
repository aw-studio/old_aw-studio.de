@extends('app')

@section('meta')
<x-lit-meta :for="$service" />
@endsection

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('content')

<section class="bg-white aw-first-section">
    <div class="container pt-20 pb-10">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 lg:col-span-7">
                <h1 class="h1 aw--animate">
                    {{ $service->title }}
                </h1>
                <div class="text-lg md:text-xl">
                {!! $service->text !!}
            </div>
            </div>
                <div class="col-span-12 pt-4 pb-12 text-xl lg:col-span-5 lg:col-start-8">
                    <div class="flex lg:justify-end">
                        <a class="text-base aw-link" href="{{ __route('services') }}">{{ __('app.back-to-services-overview') }}</a>
                    </div>
                </div>
        </div> 
    </div>
</section>

@if($service->list != '' && $service->list != '<p></p>')
<section class="bg-beige">
    <div class="container pt-20 pb-20">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 md:col-start-1 md:col-span-10 lg:col-start-1 lg:col-span-6 mb-0 md:mb-8 lg:mb-16">
                <h2 class="h3">{{ $service->list_title }}</h2>
                <div class="aw-list md:columns-2">
                    {!! $service->list !!}
                </div>
            </div>
            @if($service->team_member)
            <div class="col-span-full col-start-1 lg:col-span-5 lg:col-start-8">
                <h2 class="h3">{{ __('app.service-cta-title') }}</h2>
                <p>{{ __('app.service-cta-contact') }} {{ $service->title }}:
                </p>
                <div class="bg-white rounded-md p-4 flex items-stretch max-w-[450px] lg:max-w-none">
                    <div class="h-full w-24">
                        <x-lit-image :image="$service->team_member->image" container="w-full h-full" class="rounded-md w-full h-full" />
                    </div>
                    <div class="pl-6 flex flex-wrap items-between">
                        <div class="w-full">
                            <span class="block font-semibold text-lg">
                                {{ $service->team_member->name }}
                            </span>
                            <span class="block">
                                {{ $service->team_member->position }}
                            </span>
                        </div>
                        <div class="w-full h-auto mt-auto mb-2 text-base">
                            <span class="block">
                                <a class="aw-link" href="mailto:hallo@aw-studio.de?subject={{ str_replace('&amp;','%26',rawurlencode($service->title)) }}">{{ __('app.service-cta-send-email') }}</a>
                            </span>
                            <span class="block">
                                +49 431 53 03 86 32
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

</section>
@endif

@if($service->references->count() > 0)
<section class="py-20 pb-40 bg-white border-t border-white">
    <div class="container">
        
        <h2 class="h3">
            {{ __('app.related-references') }}
        </h2>
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 grid-auto-cols">
            @foreach ($service->references as $reference)
            <div class="mb-4 hover:scale-[1.025] active:scale-100 transition-all duration-300">
                <div class="mb-4">
                    <a href="{{ __route('references.show',$reference->slug) }}">
                        <x-lit-image :image="$reference->image" :alt="$reference->title" container="w-full rounded-md" class="w-full" />
                    </a>
                </div>
                <div class="text-base">
                    <a class="text-xl aw-link" href="{{ __route('references.show',$reference->slug) }}">
                        {{ $reference->title }}
                    </a>
                    <br>
                    {{ $reference->subtitle }}<br>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</section>
@endif

@endsection
