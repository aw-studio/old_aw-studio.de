<div>
    @foreach ($references as $reference)
    <div class="mb-20">
        <div class="mb-4">
            <a href="{{ __route('references.show',$reference->slug) }}">
                <x-lit-image :image="$reference->image" :alt="$reference->title" class="w-full rounded-md" />
            </a>
        </div>
        <div class="justify-between md:flex">
            <div>
                <h3 class="mb-0 h3">
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