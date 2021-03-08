<div>
    <h3 class="h3">
        {{ $jobs->h3_jobs }}
    </h3>

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