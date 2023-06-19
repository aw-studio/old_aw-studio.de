@extends('app')

@section('meta')
{{-- <x-lit-meta :for="$service" /> --}}
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
                    {{ $customer->name }}@if($customer->suffix) {{ $customer->suffix }}@endif
                </h1>
                <div class="text-lg md:text-xl">
                {!! $customer->description !!}
                </div>
                <div>
                    <x-button type="dark" text="{{ str_replace('https://www.','',$customer->url) }}" link="{{ $customer->url }}" target="_blank" />
                </div>
            </div>
                <div class="col-span-12 pt-4 pb-12 text-xl lg:col-span-5 lg:col-start-8">
                    <div class="flex lg:justify-end">
                        <a class="text-base aw-link" href="{{ __route('customers.index') }}">{{ __('app.back-to-customers-overview')}}</a>
                    </div>
                </div>
        </div> 
    </div>
</section>

@if($customer->references->count() > 0)
<section class="py-20 pb-40 bg-white border-t border-white">
    <div class="container">
        
        <h2 class="h3">
            {{ __('app.customers-projects') }}
        </h2>
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 grid-auto-cols">
            @foreach ($customer->references as $reference)
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
