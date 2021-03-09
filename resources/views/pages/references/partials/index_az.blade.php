<div class="pb-40">

    <hr class="text-black opacity-25">

    @foreach ($references_az as $reference)
    <div class="grid grid-cols-12 gap-5 row-gap-0 py-4">
        <div class="col-span-12 col-start-1 py-0 text-base font-semibold  lg:col-start-1 lg:col-span-4">
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
        <div class="col-span-12 col-start-1 py-0 text-base  lg:col-start-5 lg:col-span-4">
            {{ $reference->subtitle }}
        </div>
        <div class="col-span-6 col-start-1 py-0 text-base  lg:col-start-9 lg:col-span-2">
            {{ $reference->date }}
        </div>
        <div class="hidden col-span-6 col-start-7 text-base text-right sm:block lg:col-start-11 lg:col-span-2 ">
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