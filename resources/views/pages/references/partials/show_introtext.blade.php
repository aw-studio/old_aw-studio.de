<div class="grid grid-cols-12 py-0 md:py-20">
    <div class="col-span-12 col-start-1 text-white md:col-start-1 md:col-span-4 lg:col-start-2 lg:col-span-3 ">
        <div class="flex flex-row-reverse justify-between md:block">
            <div class="mb-8 text-right md:text-left">
                <div class="text-xl mb-4">{{ __('app.realization')}}</div>
                <span class="text-sm">
                    {!! $reference->date !!}
                </span>
            </div>
            @if($reference->customers->count() > 0)
        <div class="pb-20">
            <div class="text-xl mb-4">{{ __('app.customer')}}</div>
            <div class="flex flex-wrap aw-list">
                <ul>
                    @foreach($reference->customers as $customer)
                    <li class="text-sm">{{ $customer->name }} – {{ $customer->suffix }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        </div>
    </div>
    <div class="col-span-12 col-start-1 prose md:col-start-6 md:col-span-7 lg:col-start-6 lg:col-span-6">
        <div class="lg:text-xl">
        {!! $reference->text !!}
    </div>
    </div>
</div>  