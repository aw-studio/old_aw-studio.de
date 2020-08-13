<div class="image-container">
    <img
        alt="{{ $image->custom_properties['alt'] ?? $alt }}"
        src="{{ b64($image) }}"
        data-srcset="
        {{ $image->getFullUrl('sm') }} 300w,
        {{ $image->getFullUrl('md') }} 500w,
        {{ $image->getFullUrl('lg') }} 900w,
        {{ $image->getFullUrl('xl') }} 1400w,
        {{ $image->getFullUrl('xxl') }} 1800w,
        "
        data-sizes="auto"
        class="lazyload w-full {{ $class }}" />
</div>