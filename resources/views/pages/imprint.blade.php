@extends('app')

@section('meta')
@if ($imprint->meta->title)
<title>{{ $imprint->meta->title }}</title>
@endif
<x-lit-meta :for="$imprint" />
@endsection

@section('content')
<section class="py-20 bg-white lg:py-40">
    <div class="container lg:w-2/3">
        <h1 class="h1">
            {{ $imprint->h1 }}
        </h1>
        {!! $imprint->text !!}
    </div>
</section>
@endsection