@extends('app')

@section('meta')
{{-- @if ($post->title)
<title>{{ strip_tags($post->title) }}</title>
@endif --}}
<x-lit-meta :for="$post" />
@endsection

@section('content')
    <section class="bg-white">
        <div class="container pb-20">
            <div class="grid grid-cols-12 gap-5 mt-20 lg:mt-40">
                <div class="col-span-12 col-start-1 lg:col-start-6 lg:col-span-6">
                    <h1 class="h1">
                        {!!Str::of($post->h1)->replace('<p>', '')->replace('</p>', '')!!}
                    </h1>
                </div>

                <div class="col-span-12 lg:col-span-2 lg:col-start-3">
                    <ul class="flex flex-wrap mt-2">
                        @foreach($post->tags as $tag)
                            <li>
                                <div class="z-20 inline-block px-4 py-2 mb-2 mr-2 text-xs tracking-widest text-white uppercase bg-black rounded-full left-5 top-5 whitespace-nowrap">
                                    {{$tag->title}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-span-12 mb-20 text-xl lg:col-span-6 lg:col-start-6">
                    {!!$post->excerpt!!}
                </div>

                <div class="col-span-12 mb-10 lg:col-span-10 lg:col-start-2">
                    <x-lit-image :image="$post->image" class="w-full" />
                </div>
            </div>
        </div>
    </section>

    @if($post->text)
    <div class="container pb-20">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 mb-20 text-xl lg:col-span-6 lg:col-start-6">
                {!!$post->text!!}
            </div>
        </div>
    </div>
    @endif

    @if ($post)
        @block($post->sections)
    @endif

    @if($post->references->count() > 0)
    <section class="bg-white">
        <div class="container pb-20">
            <h3>{{__('app.related-references')}}</h3>
            <div class="grid grid-cols-12 gap-5">
                @foreach($post->references as $reference)
                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                    <x-lit-image :image="$reference->image" class="w-full" />
                    {{$reference->title}}
                    {!!$reference->excerpt!!}
                    <a class="aw-link" href="{{ __route('references.show',$reference->slug)}}">{{__('app.view-reference')}}</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="bg-white">
        <div class="container pb-20">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 mb-20 text-xl lg:col-span-6 lg:col-start-6">
                    <a class="text-base aw-link" href="{{ __route('blog.index') }}">{{ __('app.back-to-blog-overview') }}</a>
                </div>
            </div>
        </div>
    </section>


@endsection
