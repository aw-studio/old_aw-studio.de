@extends('app')

@section('meta')
<x-lit-meta :for="$reference" />
@endsection

    
@section('content')
<section class="bg-black">
    <div class="container py-8 md:py-20">
        <div class="grid grid-cols-12 gap-5 mb-0 md:mb-20">
            <div class="col-span-12 col-start-1 row-start-1 lg:col-span-9">
                <h1 class="mb-0 h1 pr-32">
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
                @include('pages.references.partials.show_introtext')
            @endif

                <div class="text-white">

                    @if ($detail->type == 'image_1xfull')                    
                        <x-lit-image :image="$detail->image" :alt="$reference->title" class="w-full rounded-md" />
                    @endif

                    @if ($detail->type == 'image_2xhalf')
                    <div class="flex flex-wrap">
                        <div class="w-full sm:w-1/2">
                            <x-lit-image :image="$detail->image1" :alt="$reference->title" class="w-full rounded-md rounded-b-none sm:rounded-r-none sm:rounded-b-md" />
                        </div>
                        <div class="w-full sm:w-1/2">
                            <x-lit-image :image="$detail->image2" :alt="$reference->title" class="w-full rounded-md rounded-t-none sm:rounded-l-none sm:rounded-t-md" />
                        </div>
                    </div>
                    @endif

                    @if ($detail->type == 'text')
                    {!! $detail->text !!}
                    @endif

                    @if ($detail->type == 'video')
                    <div style="padding:55.87% 0 0 0;position:relative;"><iframe class="rounded-md" src="https://player.vimeo.com/video/{{ $detail->video_id }}?h=2a61351d45&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;background=1" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="netz-der-verfolgung"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
                    @endif

                    <br><br>
                </div>

            @if($reference->details->count() == 1)
                @include('pages.references.partials.show_introtext')
            @endif

                @endforeach

                @if($reference->link_href)
                    <div class="mb-20 text-right">
                        <x-button type="light" text="{{ $reference->link_text }}" link="{{ $reference->link_href }}" target="_blank" />
                    </div>
                @endif
        </div>

        <div class="grid grid-cols-12 py-0 md:py-20">
            <div class="col-span-12 col-start-1 text-white md:col-start-1 md:col-span-4 lg:col-start-2 lg:col-span-3 order-2 md:order-none">
                <div class="flex justify-between md:block">
                <div class="pb-20">
                    @if($reference->services->count() > 0)
                    <div class="text-xl mb-4">{{ __('app.services')}}</div>
                    <div class="flex flex-wrap aw-list">
                        <ul>
                            @foreach($reference->services as $service)
                            <li class="text-sm">{{ $service->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($reference->technologies->count() > 0)
                    <div class="text-xl mb-4">{{ __('app.technologies')}}</div>
                    <div class="flex flex-wrap aw-list">
                        <ul>
                            @foreach($reference->technologies as $technology)
                            <li class="text-sm">{{ $technology->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div>
                </div>
            </div>
            <div class="col-span-12 col-start-1 prose md:col-start-6 md:col-span-7 lg:col-start-6 lg:col-span-6 order-1 md:order-none mb-12">
        {!! $reference->buzzwords !!}
            </div>
        </div>  

    </div>
</section>

<section class="py-20 lg:py-40 bg-black ">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('references.show',$next_reference_slug) }}">{{ __('app.next-reference') }}</a>
    </div>
</section>

@endsection