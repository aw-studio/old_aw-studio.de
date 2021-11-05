<a href="{{ __route('blog.show',$post->slug)}}" class="relative block mb-2 lg:mb-6">
    <div class="relative">
        <div class="absolute">
            @if(count($post->tags) > 0 && $post->image)
                <div class="absolute z-20 px-4 py-2 text-xs tracking-widest text-white uppercase bg-black rounded-full left-5 top-5 whitespace-nowrap">
                    {{$post->tags[0]->title}}
                </div>
            @endif
        </div>
        @isset($post->image)
        <x-lit-image :image="$post->image" class="z-10 w-full mb-4 lg:mb-8" />
        @endisset
    </div>
    <div class="mr-8 text-xl md:text-2xl">
        {!!Str::of($post->h1)->replace('<p>', '')->replace('</p>', '')!!}
    </div>
    <div class="mt-4 mr-8">
        {!! $post->excerpt !!}
    </div>
</a>
<a class="aw-link" href="{{ __route('blog.show',$post->slug)}}">{{__('app.read-post')}}</a>
