<div class="flex justify-center flex-wrap items-center gap-16 pt-16 pb-32">

    @foreach ($customers as $customer)

    @php
        $imagefactor = $customer->image->custom_properties['original_dimensions']['width'] / $customer->image->custom_properties['original_dimensions']['height'];
        $widthfactor = 1;
        if($imagefactor > 2) {
            $widthfactor = 2;
        }
        if($imagefactor > 5) {
            $widthfactor = 2.5;
        }
    @endphp
    
    <div>
        <div class="relative w-auto h-32
        "
        style="max-width:{{ (100*$widthfactor)*$customer->logo_scale/100 }}px;"
        >

             <x-lit-image :image="$customer->image" container="w-full h-full" class="w-full h-full object-contain" />
                
        </div>
        {{-- <div class="text-center">{{ $customer->name }}</div> --}}
    </div>
    @endforeach
</div>