<div class="pb-40">

    <hr class="text-black opacity-25">

    @foreach ($references_az as $reference)
    <div class="grid grid-cols-12 gap-5 row-gap-0 py-4">
        <div class="
        col-start-1 col-span-12
        lg:col-start-1 lg:col-span-4
        font-semibold text-base py-0
        ">
            @if($reference->image)
                <a class="aw-link" href="{{ __route('references.show',$reference->slug) }}">
                    <b>{{ $reference->title }}</b>
                </a>
                @else
                <a class="aw-link" href="{{ $reference->link_href }}" target="_blank">
                    <b>{{ $reference->title }}</b>
                </a>
                @endif
        </div>
        <div class="
        col-start-1 col-span-12
        lg:col-start-5 lg:col-span-4
        text-base py-0
        ">
            {{ $reference->subtitle }}
        </div>
        <div class="
        col-start-1 col-span-6
        lg:col-start-9 lg:col-span-2
        text-base py-0
        ">
            {{ $reference->date }}
        </div>
        <div class="hidden sm:block
        col-start-7 col-span-6
        lg:col-start-11 lg:col-span-2
        text-base text-right
        ">
            @if($reference->image)
                <a class="aw-link" href="{{ __route('references.show',$reference->slug) }}">
                    {{ __('app.view-reference') }}
                </a>
                @else
                <a class="aw-link" href="{{ $reference->link_href }}" target="_blank" rel="noreferrer">
                    {{ $reference->link_text }}
                </a>
                @endif
        </div>
    </div>

    <hr class="text-black opacity-25">

    @endforeach
</div>