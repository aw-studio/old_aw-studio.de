@extends('app')

@section('meta')
{{-- @if ($reference->title && $reference->subtitle)
<title>{{ $reference->title }}: {{ $reference->subtitle }}</title>
@endif --}}
<x-lit-meta :for="$reference" />
@endsection

    
@section('content')
<section class="bg-black">
    <div class="container py-8 md:py-20">
        <div class="grid grid-cols-12 gap-5 mb-0 md:mb-20">
            <div class="col-span-12 col-start-1 row-start-1 lg:col-span-9">
                <h1 class="mb-0 h1">
                    {{ $reference->title }}
                </h1>
                <div class="mt-4 text-xl text-white">
                    {{ $reference->subtitle }}
                </div>
            </div>
            <div class="hidden col-span-3 col-start-10 row-start-1 mt-4 text-right sm:block">
                <a class="aw-link" href="{{ __route('references.index') }}">{{ __('app.all-references') }}</a>
            </div>
        </div>

        <div class="mt-12 md:mt-20">
            @foreach ($reference->details as $detail)

            @if($loop->iteration == 2)
            <div class="grid grid-cols-12 py-0 md:py-20">
                <div class="flex flex-row-reverse justify-between col-span-12 col-start-1 text-white md:col-start-1 md:col-span-4 lg:col-start-2 lg:col-span-3 md:block">
                    <div class="mb-8 text-xl text-right md:text-left">
                        <b>{!! $reference->date !!}</b>
                    </div>
                    <div class="">
                        {!! $reference->buzzwords !!}
                    </div>
                </div>
                <div class="prose col-span-12 col-start-1 text-xl md:col-start-6 md:col-span-7 lg:col-start-6 lg:col-span-6">
                    {!! $reference->text !!}
                </div>
            </div>  
                @endif

                <div class="text-white">

                    @if ($detail->type == 'image_1xfull')                    
                        <x-lit-image :image="$detail->image" :alt="$reference->title" class="w-full" />
                    @endif

                    @if ($detail->type == 'image_2xhalf')
                    <div class="flex flex-wrap">
                        <div class="w-full sm:w-1/2">
                            <x-lit-image :image="$detail->image1" :alt="$reference->title" class="w-full" />
                        </div>
                        <div class="w-full sm:w-1/2">
                            <x-lit-image :image="$detail->image2" :alt="$reference->title" class="w-full" />
                        </div>
                    </div>
                    @endif

                    @if ($detail->type == 'text')
                    {!! $detail->text !!}
                    @endif

                    <br><br>
                </div>

                @endforeach

                @if($reference->link_href)
                    <div class="mb-20 text-center">
                        <x-button type="light" text="{{ $reference->link_text }}" link="{{ $reference->link_href }}" target="_blank" />
                    </div>
                @endif
        </div>
    </div>
</section>


{{-- TODO: --}}
<section class="pt-12 pb-40 bg-black md:pt-0">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('references.show',$next_reference_slug) }}">{{ __('app.next-reference') }}</a>
    </div>
</section>

@endsection