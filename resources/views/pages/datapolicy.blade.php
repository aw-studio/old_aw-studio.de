@extends('app')

@section('meta')
@if ($datapolicy->meta->title)
<title>{{ strip_tags($datapolicy->meta->title) }}</title>
@endif
<x-lit-meta :for="$datapolicy" />
@endsection

@section('content')
<section class="py-20 bg-white lg:py-40">
    <div class="container lg:w-2/3">
        <h1 class="h1">
            {{ $datapolicy->h1 }}
        </h1>
        {!! $datapolicy->text !!}
    </div>
</section>
@endsection