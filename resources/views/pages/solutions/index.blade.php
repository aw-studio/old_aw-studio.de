@extends('app')

@section('meta')
{{-- <x-lit-meta :for="$solution" /> --}}
@endsection

@section('content')

<section class="bg-white">
    <div class="container pt-20">
        <div class="grid grid-cols-12">
            <div class="col-start-1 col-span-full lg:col-span-5">
                <h1 class="mt-2 mb-2 text-sm tracking-widest text-black uppercase">
                    {{ $page->h1 }}
                </h1>
            </div>
            <div class="lg:col-start-6 col-span-full lg:col-span-7">
                <h2 class="h1">
                    {{ $page->h2 }}
                </h2>
                <div class="text-xl">
                    {!! $page->text !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-20 bg-white">
    <div class="py-20 bg-beige">
    <div class="container pb-8 md:pd-12 lg:pb-16">
        <div class="grid items-stretch grid-flow-row grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($page->solutions as $solution)
            <div class="mb-0 group/service-item hover:scale-[1.025] active:scale-100 transition-all duration-300  hover:drop-shadow-2xl">
                <a href="{{ __route('solutions.show', $solution->slug)}}" class="relative block h-full duration-300 translate ">
                    <div class="relative z-10 h-full bg-white rounded-md">
                        <div class="flex flex-col h-full">
                            <div class="p-6 pb-0">
                                {{-- <div class="flex items-center h-24 mb-8 transition duration-300 ease-in-out transform group-hover/service-item:translate-x-2">
                                    {!! $solution->svg !!}
                                </div> --}}
                                <span class="block pt-2 mb-4 text-xl font-normal">
                                    {{ $solution->title }}
                                </span>
                                <div class="pr-4 mb-0 text-sm">
                                    {{ $solution->excerpt }}
                                </div>
                            </div>
                            <div class="flex justify-end w-full p-4 mt-auto">
                                <div class="flex items-center justify-center w-10 h-10 transition-all duration-300 rounded-md bg-beige group-hover/service-item:bg-black">
                                    <svg 
                                class="transition-all duration-300 stroke-black group-hover/service-item:stroke-white group-hover/service-item:animate-point-fast"
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


@endsection
