@extends('app')

@section('meta')
@if ($imprint->meta_title)
<meta property="og:title" content="{{ $imprint->meta_title }}">
@endif

@if ($imprint->meta_description)
<meta property="og:description" content="{{ $imprint->meta_description }}">
@endif
@isset($imprint)
    <x-lit-meta-tags
    :title="$imprint->meta_title"
    :description="$imprint->meta_description"
    :keywords="$imprint->meta_keywords"
    />
@endisset
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