
{{-- Desktop --}}
<div class="hidden md:grid grid-cols-12 grid-flow-row gap-8 pt-12 pb-24">
    @foreach ($customers as $customer)
    <div class="col-span-6 sm:col-span-6 md:col-span-4 lg:col-span-3">
        <div class="bg-beige rounded-md aspect-video w-full p-6 flex justify-center items-center">
            <div class="origin-center w-[80%] h-full" style="transform:scale({{$customer->logo_scale/100}})">
            <x-lit-image :image="$customer->image" container="w-full h-full" class="w-full h-full object-contain " />
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Mobile --}}
<div class="md:hidden overflow-y-auto -mx-6 px-6 sm:-mx-20 sm:px-20 scrollbar-hide">
    <div class="flex pb-12 pt-8 gap-6 justify-start" style="width:{{ $customers->count()*40 }}vw">
        @foreach ($customers as $customer)
        <div class="w-[40vw]">
            <div class="bg-beige rounded-md aspect-video w-full p-6 flex justify-center items-center">
                <div class="origin-center w-[80%] h-full" style="transform:scale({{$customer->logo_scale/100}})">
                <x-lit-image :image="$customer->image" container="w-full h-full" class="w-full h-full object-contain " />
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>