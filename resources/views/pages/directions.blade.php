@extends('app')

@section('meta')
{{-- @if ($directions->meta->title)
<title>{{ $directions->meta->title }}</title>
@endif --}}
<x-lit-meta :for="$directions" />
@endsection

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('content')

<section class="bg-white aw-first-section">
    <div class="container pt-20 pb-40">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 md:col-start-1 md:col-span-10 lg:col-start-1 lg:col-span-7">
                <h1 class="h1 aw--animate">
                    @isset($directions->h1)
                    {{ $directions->h1 }}
                    @endisset
                </h1>
                {!! $directions->text !!}
            </div>
        </div> 
        @include('partials.google_map')
    </div>
</section>

@endsection