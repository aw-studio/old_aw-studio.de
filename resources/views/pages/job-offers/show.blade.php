@extends('app')

@section('meta')
<x-lit-meta :for="$job_offer" />
@endsection

@section('content')
        <section class="bg-white">
            <div class="container py-8 md:py-20">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 lg:col-span-8">

                        <div itemscope itemtype="https://schema.org/JobPosting" directApply="true">
                        <h1 class="h1" itemprop="title">
                            Job-Angebot: <br> {!! $job_offer->title !!}
                        </h1>

                        <div class="aw-list normal">
                            {!!$job_offer->description!!}
                        </div>

                        <div class="pb-8"> 
                            <x-button type="dark" text="Jetzt bewerben" link="mailto:bewerbung@aw-studio.de" />
                        </div>

                        <div class="mt-20">Veröffentlicht / aktualisiert am: <span itemprop="datePosted">{{ $job_offer->updated_at }}</span></div>

                    </div>

                    </div>

                </div>
            </div>

        </section>
@endsection
