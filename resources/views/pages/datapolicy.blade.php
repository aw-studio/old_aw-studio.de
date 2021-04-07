@extends('app')

@section('meta')
@if ($datapolicy->meta_title)
<meta property="og:title" content="{{ $datapolicy->meta_title }}">
@endif

@if ($datapolicy->meta_description)
<meta property="og:description" content="{{ $datapolicy->meta_description }}">
@endif
@isset($datapolicy)
    <x-lit-meta-tags
    :title="$datapolicy->meta_title"
    :description="$datapolicy->meta_description"
    :keywords="$datapolicy->meta_keywords"
    />
@endisset
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