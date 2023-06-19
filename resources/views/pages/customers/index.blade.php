@extends('app')

@section('meta')
{{-- <x-lit-meta :for="$service" /> --}}
@endsection

@section('content')

<section class="bg-white pb-20 lg:pb-40">
    <div class="container pt-12 md:pt-20">
        <div class="col-start-1 col-span-5 uppercase text-sm tracking-widest">
            <h1 class="h1 mb-6 lg:mb-12">
                {{ __('app.customers-overview')}}
            </h1>
        </div>
        <div>
            <div class="grid grid-cols-12 grid-flow-row gap-8 pt-12 pb-24">
                @foreach ($customers as $customer)
                <a class="col-span-6 sm:col-span-6 md:col-span-4 lg:col-span-3 hover:scale-105 transition-all duration-300" href="@if($customer->slug){{ __route('customers.show',$customer->slug)}}@endif">
                    <div class="bg-beige rounded-md aspect-video w-full p-6 flex justify-center items-center">
                        <div class="origin-center w-[80%] h-full" style="transform:scale({{$customer->logo_scale/100}})">
                        <x-lit-image :image="$customer->image" container="w-full h-full" class="w-full h-full object-contain " />
                        </div>
                    </div>
                </a>
                @endforeach
            </div>        
        </div>
    </div>
</section>

@endsection
