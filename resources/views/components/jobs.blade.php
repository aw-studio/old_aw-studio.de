<div>
    <h3 class="h3">
        {{ $jobs->h3_jobs }}
    </h3>

    @if($jobs->job_offers->where('active',1)->count() > 0 )

        <div class="mb-10 text-xl">
            {!! $jobs->text_job_offers !!}
        </div>
    
        <div class="mb-12">
            <div class="aw-list">
                <ul>
                    @foreach ($jobs->job_offers->where('active',1) as $job_offer_item)
                        <li>
                            <a class="aw-link" href="{{ __route('job-offer.show',$job_offer_item->slug) }}">
                                <span class="font-semibold">{{ $job_offer_item->title }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    @endif

    <div class="mb-10 text-xl">
        {!! $jobs->text_jobs !!}
    </div>

    <div class="mb-12">
        <div class="aw-list">
            {!! $jobs->list_jobs !!}
        </div>
    </div>

    <x-button type="dark" text="{!! $jobs->button_jobs !!}" link="{{ __route('application') }}" />

</div>