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
                <div class="col-span-12 col-start-1 text-white md:col-start-1 md:col-span-4 lg:col-start-2 lg:col-span-3 ">
                    <div class="flex flex-row-reverse justify-between md:block">
                        <div class="mb-8 text-xl text-right md:text-left">
                            <b class="mb-4 inline-block">{{ __('app.realization')}}</b><br>
                            {!! $reference->date !!}
                        </div>
                        @if($reference->customers->count() > 0)
                    <div class="pb-20">
                        <b class="text-xl">{{ __('app.customer')}}</b><br>
                        <div class="flex flex-wrap">
                            @foreach($reference->customers as $customer)
                            <div class="bg-white mr-6 w-[200px] lg:w-[75%] aspect-video p-6 mt-6">
                                <x-lit-image :image="$customer->image" container="w-full h-full" class="w-full h-full object-contain" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    </div>
                </div>
                <div class="col-span-12 col-start-1 prose md:col-start-6 md:col-span-7 lg:col-start-6 lg:col-span-6">
                    {!! $reference->text !!}
                </div>
            </div>  


            {{-- <div class="grid grid-cols-12 py-0 md:py-20">

                <div class="col-span-12 col-start-1 text-white md:col-start-1 md:col-span-4 lg:col-start-2 lg:col-span-3 ">

                    <div class="flex flex-row-reverse justify-between md:block">
                    <div class="mb-8 text-xl text-right md:text-left">
                        <b class="mb-4 inline-block">{{ __('app.realization')}}</b><br>
                        {!! $reference->date !!}
                    </div>
                    <div class="aw-list">
                        <b class="text-xl mb-4 inline-block">{{ __('app.services')}}</b><br>
                        {!! $reference->buzzwords !!}
                    </div>

                    <div class="aw-list">
                        <b class="text-xl mb-4 inline-block">Technologien</b><br>
                        {!! $reference->technologies !!}

                    </div>

                    </div>
                    
                </div>


                <div class="col-span-12 col-start-1 prose md:col-start-6 md:col-span-7 lg:col-start-6 lg:col-span-6">
                    {!! $reference->text !!}
                </div>

            </div>   --}}


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
                    <div class="mb-20 text-right">
                        <x-button type="light" text="{{ $reference->link_text }}" link="{{ $reference->link_href }}" target="_blank" />
                    </div>
                @endif
        </div>


<section>
    <div class="grid grid-cols-12 py-0 md:py-20">
        <div class="col-span-12 md:col-span-7 lg:col-span-6 col-start-1 lg:col-start-2 prose">
            <h2> Mekmale / Features</h2>
            {!! $reference->buzzwords !!}
        </div>
        <div class="col-span-12 md:col-span-3 lg:col-span-4 col-start-1 md:col-start-10 lg:col-start-9 text-white">
            <div class="flex justify-between md:block mt-4">
                
                <div class="mb-12">
                    <h3 class="h4 mb-4 text-base">Erbrachte Leistungen</h3>       
                    <div class="aw-list ">     
                    <ul>
                            @foreach($reference->services as $service)
                            <li>{{ $service->title }}</li>
                            @endforeach
                    </ul>
                </div>
                </div>

                <div class="mb-12">
                    <h3 class="h4 mb-4 text-base">Eingesetze Technologien</h3>       
                    <div class="aw-list ">     
                    <ul>
                        @foreach($reference->technologies as $technology)
                        <li>{{ $technology->name }}</li>
                        @endforeach
                    </ul>
                </div>
                </div>


            </div>
        </div>

    </div> 

</section>

    </div>
</section>


{{-- TODO: --}}
<section class="pt-12 pb-40 bg-black md:pt-0">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('references.show',$next_reference_slug) }}">{{ __('app.next-reference') }}</a>
    </div>
</section>

@endsection