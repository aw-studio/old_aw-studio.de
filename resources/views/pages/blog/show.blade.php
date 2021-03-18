@extends('app')

@section('meta')
{{-- TODO: meta package fix??? --}}
{{-- <x-lit-meta :for="$post" /> --}}
@endsection

@section('content')
    <section class="bg-white">
        <div class="container pb-20">
            <div class="grid grid-cols-12 gap-5 mt-20 lg:mt-40">
                <div class="col-span-12 col-start-1 lg:col-start-6 lg:col-span-6">
                    <h1 class="h1">
                        {!!Str::of($post->title)->replace('<p>', '')->replace('</p>', '')!!}
                    </h1>
                </div>

                <div class="col-span-12 lg:col-span-2 lg:col-start-3">
                    <ul>
                        @foreach($post->tags as $tag)
                            <li>{{$tag->title}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-span-12 lg:col-span-6 lg:col-start-6">
                    {!!$post->excerpt!!}
                </div>

                <div class="col-span-12 mb-10 lg:col-span-10 lg:col-start-2">
                    <x-lit-image :image="$post->image" class="w-full" />
                </div>
            </div>
        </div>
    </section>

    @if ($post)
        @block($post->sections)
    @endif
@endsection