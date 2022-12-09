@extends('app')

@section('meta')
{{-- @if ($reference->title && $reference->subtitle)
<title>{{ $reference->title }}: {{ $reference->subtitle }}</title>
@endif --}}
{{-- <x-lit-meta :for="$reference" /> --}}
@endsection

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('content')

@section('content')

<section class="bg-white aw-first-section">
    <div class="container pt-20 pb-10">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 md:col-start-1 md:col-span-10 lg:col-start-1 lg:col-span-7">
                <h1 class="h1 aw--animate">
                    {{ $service->title }}
                </h1>
                {!! $service->text !!}    
            </div>
        </div> 
    </div>
</section>

@if($service->list != '' && $service->list != '<p></p>')
<section class="bg-white aw-first-section border-t border-black">
    <div class="container pt-20 pb-10">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 md:col-start-1 md:col-span-10 lg:col-start-1 lg:col-span-7">
                <div class="aw-list">
                    {!! $service->list !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="py-20 pb-40 bg-white border-t border-black">
    <div class="container">
        @if($service->references->count() > 0)
        <h2 class="h2">
            {{ __('app.related-references') }}
        </h2>
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 grid-auto-cols">
            @foreach ($service->references as $reference)
            <div class="mb-4">
                <div class="mb-4">
                    <a href="{{ __route('references.show',$reference->slug) }}">
                        <x-lit-image :image="$reference->image" :alt="$reference->title" container="w-full" class="w-full" />
                    </a>
                </div>
                <div class="text-base">
                    <a class="text-xl aw-link" href="{{ __route('references.show',$reference->slug) }}">
                        <b>{{ $reference->title }}</b>
                    </a>
                    <br>
                    {{ $reference->subtitle }}<br>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<section class="bg-white">
    <div class="container pb-20">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 mb-20 text-xl lg:col-span-6 lg:col-start-6">
                <a class="text-base aw-link" href="{{ __route('services') }}">{{ __('app.back-to-services-overview') }}</a>
            </div>
        </div>
    </div>
</section>




@endsection

{{-- TODO: --}}
{{-- <section class="pt-12 pb-40 bg-black md:pt-0">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('references.show',$next_reference_slug) }}">{{ __('app.next-reference') }}</a>
    </div>
</section> --}}

@endsection