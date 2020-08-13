@extends('app')

@section('meta')
@if ($reference->image)
<meta property="og:image" content="{{ $reference->image->getFullUrl('xl') }}">
@endif
<meta property="og:title" content="{{ $reference->title }}" />
@if ($reference->excerpt)
<meta property="og:description" content="{{ strip_tags($reference->excerpt) }}">
@else
<meta property="og:description" content="{{ $reference->text }}">
@endif

<x-meta :metaTitle="$reference->title . ': ' . $reference->subtitle" :metaDescription="strip_tags($reference->text)" :metaKeywords="strip_tags(str_replace('</li>', '</li>, ', $reference->buzzwords))" />
@endsection

@section('content')
<section class="bg-black">
    <div class="container py-8 md:py-20">

        <div class="grid grid-cols-12 gap-5 mb-0 md:mb-20">
            <div class="
            row-start-1
            col-start-1 col-span-12
            lg:col-span-9">
                <h1 class="h1 mb-0">
                    {{ $reference->title }}
                </h1>
                <div class="text-xl text-white mt-4">
                    {{ $reference->subtitle }}
                </div>
            </div>
            <div class="hidden sm:block
            row-start-1
            col-start-10 col-span-3
            text-right mt-4">
                <a class="aw-link" href="{{ __route('references.index') }}">{{ __('app.all-references') }}</a>
            </div>
        </div>

        <div class="mt-12 md:mt-20">

            @foreach ($reference->details as $detail)

            @if($loop->iteration == 2)

                <div class="grid grid-cols-12 py-0 md:py-20">
                    <div class="
                    col-start-1 col-span-12
                    md:col-start-1 md:col-span-4
                    lg:col-start-2 lg:col-span-3
                    text-white
                    flex md:block flex-row-reverse justify-between
                    ">
                        <div class="text-xl mb-8 text-right md:text-left">
                            <b>{!! $reference->date !!}</b>
                        </div>
                        <div class="">
                            {!! $reference->buzzwords !!}
                        </div>
                    </div>
                    <div class="
                    col-start-1 col-span-12
                    md:col-start-6 md:col-span-7
                    lg:col-start-6 lg:col-span-6
                    text-xl
                    ">
                        {!! $reference->text !!}
                    </div>
                </div>

                @endif

                <div class="text-white">

                    @if ($detail->type == 'image_1xfull')                    
                        <x-image :image="$detail->image" :alt="$reference->title" />
                    @endif

                    @if ($detail->type == 'image_2xhalf')
                    <div class="flex flex-wrap">
                        <div class="w-full sm:w-1/2">
                            <x-image :image="$detail->image1" :alt="$reference->title" />
                        </div>
                        <div class="w-full sm:w-1/2">
                            <x-image :image="$detail->image2" :alt="$reference->title" />
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



<section class="bg-black pt-12 md:pt-0 pb-40">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('references.show',$next_reference_slug) }}">{{ __('app.next-reference') }}</a>
    </div>
</section>

@endsection