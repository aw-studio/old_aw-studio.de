<div class="flex justify-center flex-wrap items-center py-20">
    @foreach ($customers as $customer)
    <div>
        <div class="relative w-32 aspect-video my-6 mx-12
        ">
             <x-lit-image :image="$customer->image" container="w-full h-full " class="w-full h-full object-contain" />
        </div>
        {{-- <div class="text-center">{{ $customer->name }}</div> --}}
    </div>
    @endforeach
</div>