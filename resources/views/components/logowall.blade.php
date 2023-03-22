
{{-- Desktop --}}
<div class="hidden md:flex justify-start flex-wrap items-start gap-y-16 gap-x-24 pt-16 pb-32">

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
        <div class="relative w-full h-28
        "
        style="max-width:{{ (100*$widthfactor)*$customer->logo_scale/100 }}px;"
        >
             <x-lit-image :image="$customer->image" container="w-full h-full" class="w-full h-full object-contain" />
        </div>
        {{-- <div class="text-center">{{ $customer->name }}</div> --}}
    </div>
    @endforeach
</div>

{{-- Mobile --}}
<div class="md:hidden overflow-y-auto -mx-6 px-6 sm:-mx-20 sm:px-20 scrollbar-hide">

    <div class="flex pb-12 pt-8 gap-12 justify-start" style="width:{{ $customers->count()*80 }}vw">

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
        
        <div class="max-w-[80vw] w-auto pr-12">
            <div class="relative w-full h-20 md:h-32
            "
            style="max-width:{{ (100*$widthfactor)*$customer->logo_scale/100 }}px;"
            >
    
                 <x-lit-image :image="$customer->image" container="w-full h-full" class="w-full h-full object-contain" />
                    
            </div>
            {{-- <div class="text-center">{{ $customer->name }}</div> --}}
        </div>
        @endforeach
    </div>

</div>