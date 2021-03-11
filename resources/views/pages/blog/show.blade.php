@extends('app')

@section('content')
<section class="bg-white">
    <div class="container pt-20 pb-20 lg:pb-40">
        {{-- <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 lg:col-span-3">
                <h1 class="mb-4 text-xl text-black">
                    Blog
                </h1>
            </div>
        </div> --}}

        <div class="grid grid-cols-12 gap-5 mt-20 lg:mt-40">
            <div class="col-span-12 col-start-1 lg:col-start-6 lg:col-span-6">
                <h1 class="h1">
                    {!!Str::of($post->title)->replace('<p>', '')->replace('</p>', '')!!}
                </h1>
            </div>

            <div class="lg:col-span-2 lg:col-start-3">
                <ul>
                    @foreach($post->tags as $tag)
                        <li>{{$tag->title}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="lg:col-span-6 lg:col-start-6">
                {!!$post->excerpt!!}
            </div>
        </div>
    </div>
</section>
    
    @if ($post)
        @block($post->sections)
    @endif
@endsection