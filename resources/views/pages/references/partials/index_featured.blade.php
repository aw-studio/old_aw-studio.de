<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 grid-auto-cols">
    @foreach ($featured->references as $reference)
    <div class="mb-4">
        <div class="mb-4">
            <a href="{{ __route('references.show',$reference->slug) }}">
                <x-lit-image :image="$reference->image" :alt="$reference->title" />
            </a>
        </div>
        <div class="text-base">
            <a class="text-xl aw-link" href="{{ __route('references.show',$reference->slug) }}">
                <b>{{ $reference->title }}</b>
            </a>
            <br>
            {{ $reference->subtitle }}<br>
        </div>
    </div>

    @endforeach
</div>

<x-style>
    .image-container img {
        width: 100%;
    }
</x-style>