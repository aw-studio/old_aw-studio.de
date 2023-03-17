<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 grid-auto-cols">
    @foreach ($featured->references as $reference)
    <div class="mb-4 hover:scale-[1.025] transition-all duration-300">
        <div class="mb-4">
            <a href="{{ __route('references.show',$reference->slug) }}">
                <x-lit-image :image="$reference->image" :alt="$reference->title" container="w-full" class="w-full rounded-md" />
            </a>
        </div>
        <div class="text-base">
            <a class="text-xl aw-link" href="{{ __route('references.show',$reference->slug) }}">
                {{ $reference->title }}
            </a>
            <br>
            <span class="text-sm">
                {{ $reference->subtitle }}<br>
            </span>
        </div>
    </div>

    @endforeach
</div>