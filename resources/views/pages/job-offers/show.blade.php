@extends('app')

@section('meta')
<x-lit-meta :for="$job_offer" />
@endsection

@section('content')
        <section class="bg-white">
            <div class="container py-8 md:py-20">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 lg:col-span-8">

                        <h1 class="h1">
                            Job-Angebot: <br> {!! $job_offer->title !!}
                        </h1>

                        <div class="aw-list normal">
                            {!!$job_offer->description!!}
                        </div>

                        <div class="pb-8"> 
                            <x-button type="dark" text="Jetzt bewerben" link="mailto:bewerbung@aw-studio.de" />
                        </div>
                    </div>

                </div>
            </div>

        </section>
@endsection
