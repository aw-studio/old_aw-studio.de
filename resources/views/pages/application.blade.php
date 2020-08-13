@extends('app')

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('content')
<section class="bg-white py-20 lg:pt-40 aw-first-section">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">

            <div class="col-start-1 col-span-10 lg:col-span-6">
                <h1 class="text-xl mb-4 text-black">
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


<section class="bg-white pb-12">
    <div class="container pb-8 md:pd-12 lg:pb-40">
        <div class="grid grid-flow-row grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
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

@section('meta_title')
//* Alle Wetter – Studio für Design & Developemnt
@endsection

@section('meta_description')
Wir sind ein Studio für Kommunikations-Design und Web-Development. Wir gestalten und programmieren individuelle Lösungen, die unseren Kunden helfen digitaler zu agieren.
@endsection

@section('meta_keywords')
UI/UX-Design, Web-Design, Web-Development
@endsection