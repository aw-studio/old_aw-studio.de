<div>
    @foreach ($highlights->references as $reference)
    <div class="mb-20">
        <div class="mb-4">
            <a href="{{ __route('references.show',$reference->slug) }}">
                <x-image :image="$reference->image" :alt="$reference->title" />
            </a>
        </div>
        <div class="md:flex justify-between">
            <div>
                <h3 class="h3 mb-0">
                    {{ $reference->title }}
                </h3>
                <p class="mt-2 md:mt-0">
                    {{ $reference->subtitle }}
                </p>
            </div>
            <div>
                <a href="{{ __route('references.show',$reference->slug) }}" class="aw-link">{{ __('app.view-reference') }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>