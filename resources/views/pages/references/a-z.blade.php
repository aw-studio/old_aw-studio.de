@extends('app')

@section('meta')
{{-- @if ($references->meta->title)
<title>{{ $references->meta->title }}</title>
@endif --}}
<x-lit-meta :for="$references" />
@endsection

@section('content')


<section class="bg-white">
    <div class="container pt-20">
        <h2 class="h2">
            {{ $references->h3_az }}
        </h2>
        @include('pages.references.partials.index_az')
    </div>
</section>

{{-- <section class="pt-40 pb-40 bg-white border-t border-white">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('studio') }}">{{ __('app.next-studio') }}</a>
    </div>
</section> --}}

@endsection