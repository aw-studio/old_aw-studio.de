<a href="{{ __route('blog.show',$post->slug)}}" class="relative block mb-6">
    <div class="relative">
        <div class="absolute">
            @if(count($post->tags) > 0)
                <div class="absolute z-20 px-4 py-2 text-xs tracking-widest text-white uppercase bg-black rounded left-5 top-5">
                    {{$post->tags[0]->title}}
                </div>
            @endif
        </div>
        @isset($post->image)
        <x-lit-image :image="$post->image" class="z-10 w-full mb-8" />
        @endisset
    </div>
    <div class="text-2xl">
        {!!Str::of($post->title)->replace('<p>', '')->replace('</p>', '')!!}
    </div>
</a>
<a href="{{ __route('blog.show',$post->slug)}}">{{__('app.read-post')}}</a>
