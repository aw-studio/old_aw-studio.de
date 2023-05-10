@extends('app')

@section('meta')
{{-- @if ($post->title)
<title>{{ strip_tags($post->title) }}</title>
@endif --}}
<x-lit-meta :for="$post" />
@endsection

@section('content')

    <section class="bg-white">
        <div class="container py-8 md:py-20">

                <div class="grid grid-cols-12 gap-5 mb-0 md:mb-0">
                    <div class="col-span-12 col-start-1 row-start-1 lg:col-span-7">
                        <h1 class="h1">
                            {!!Str::of($post->h1)->replace('<p>', '')->replace('</p>', '')!!}
                        </h1>
                        <ul class="flex flex-wrap">
                        @foreach($post->tags as $tag)
                            <li>
                                <div class="z-20 inline-block px-4 py-2 mb-2 mr-2 text-xs tracking-widest text-white uppercase bg-black rounded-full left-5 top-5 whitespace-nowrap">
                                    {{$tag->title}}
                                </div>
                            </li>
                        @endforeach
                        </ul>
                        <div class="text-lg md:text-xl">
                            {!!$post->excerpt!!}
                        </div>
                    </div>
                    <div class="col-span-full lg:col-span-3 col-start-1 lg:col-start-10 lg:row-start-1 mt-4 mb-4 text-right sm:block">
                        <a class="text-base aw-link" href="{{ __route('blog.index') }}">{{ __('app.back-to-blog-overview') }}</a>
                    </div>
                </div>
        </div>
    </section>

    <div class="pb-20 lg:container">
        <x-lit-image :image="$post->image" class="w-full object-cover object-top lg:rounded-md" />
    </div>

    <section>
        <div class="container">

            <div class="grid grid-cols-12 mb-20">
                <div class="order-2 lg:order-none col-start-1 col-span-12 lg:col-span-5 text-sm mb-8">
                    <div class="mb-20 text-base h-full">
                        <div class="flex items-end h-full">
                        {{__('app.published')}} {{Carbon\Carbon::parse($post->created_at)->format('d.m.Y')}}<br>
                        {{__('app.last-updated')}} {{Carbon\Carbon::parse($post->updated_at)->format('d.m.Y')}}
                    </div>
                    </div>
                </div>
                <div class="order-1 lg:order-none lg:col-start-6 col-span-12 lg:col-span-7">
                    @if($post->text)
                    {!!$post->text!!}
            @endif
        
            @if ($post)
                @block($post->sections)
            @endif
                </div>
            </div>
        </div>
    </section>

    @if($post->references->count() > 0)
    <section class="py-20 pb-40 bg-white border-t border-black">
        <div class="container">
            <h2 class="h3">
                {{ __('app.related-references') }}
            </h2>
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 grid-auto-cols">
                @foreach ($post->references as $reference)
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
