@extends('app')

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('content')
<section class="py-20 bg-white lg:pt-40 aw-first-section">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-10 col-start-1 lg:col-span-6">
                <h1 class="mb-4 text-xl text-black">
                    {{ $application->h1 }}
                </h1>
                <h2 class="h1">
                    {{ $application->h2 }}
                </h2>
                {!! $application->text !!}
                <div class="aw-list">
                    {!! $application->list !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-12 bg-white">
    <div class="container pb-8 md:pd-12 lg:pb-40">
        <div class="grid grid-flow-row grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($application->positions as $position)
            <div class="mb-8 lg:mb-20 md:pr-12">
                <h3 class="h3">
                    {{ $position->h3 }}
                </h3>
                {!! $position->text !!}
                <div class="aw-list">
                    {!! $position->list !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection