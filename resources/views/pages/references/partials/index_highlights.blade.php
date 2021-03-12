<div>
    @foreach ($highlights->references as $reference)

    <div class="grid grid-cols-12 mb-20 lg:mb-40">
        <div class="
        col-start-1
        col-span-12
            @if($loop->iteration%2 != 0)
                {{-- odd --}}
                lg:col-start-1
                @else
                {{-- even --}}
                lg:col-start-6
                @endif
          lg:col-span-7
          lg:row-start-1
          mb-4
        ">
            <a href="{{ __route('references.show',$reference->slug) }}">
                <x-lit-image :image="$reference->image" :alt="$reference->title" class="w-full" />
            </a>
        </div>
        <div class="
        col-start-1
        col-span-12
            @if($loop->iteration%2 != 0)
                {{-- odd --}}
                lg:col-start-9
                @else
                {{-- even --}}
                lg:col-start-1
                @endif
        lg:col-span-4
        lg:row-start-1
        ">
            <h2 class="mb-0 h2">{{ $reference->title }}</h2>
            <div class="mt-2 mb-12 text-base text-white">
                {{ $reference->subtitle }}
            </div>
            <div class="text-xl text-white md:w-2/3 lg:w-full">
                {!! $reference->excerpt !!}
            </div>
            <div class="mt-8">
                <x-button type="light" text="{{ __('app.view-reference') }}" link="{{ __route('references.show',$reference->slug) }}" />
            </div>
        </div>
    </div>


    @endforeach
</div>