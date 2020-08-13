<div class="grid grid-cols-7 gab-5">
    @foreach ($customer_groups as $customer_group)

    <div class="
      col-start-1 col-span-7
      @if ($loop->iteration == 2) md:col-start-1 md:col-span-4 @endif
      @if ($loop->iteration == 3) md:col-start-5 md:col-span-3 @endif
      ">

        <h2 class="h2 lg:pr-8">
            {{ __('app.customer_category_'.$loop->iteration) }}
        </h2>
        <ul class="mb-20">
            @foreach ($customer_group as $customer)
            <li class="mb-1">
                <a class="aw-link text-base md:text-xl mr-2" href="{{ $customer->url }}" target="_blank" rel="noreferrer" aria-label="{{ $customer->name }} – {{ $customer->suffix }}">{{ $customer->name }}</a>
                <span class="text-base opacity-25" aria-hidden="true">{{ $customer->suffix }}</span>
            </li>
            @endforeach
        </ul>
    </div>
    @endforeach
</div>