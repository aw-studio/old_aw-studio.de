@extends('app')

@section('meta')
@if ($references->meta_title)
<meta property="og:title" content="{{ $references->meta_title }}">
@endif

@if ($references->meta_description)
<meta property="og:description" content="{{ $references->meta_description }}">
@endif
@isset($references)
    <x-lit-meta-tags
    :title="$references->meta_title"
    :description="$references->meta_description"
    :keywords="$references->meta_keywords"
    />
@endisset
@endsection

@section('content')
<section class="bg-black">
    <div class="container pt-20 pb-1">
        <div class="grid grid-cols-12 gap-5 mb-20">
            <div class="col-span-12 col-start-1 lg:col-span-9">
                <h1 class="mb-4 text-xl text-white">
                    {{ $references->h1 }}
                </h1>
                <h2 class="h1">
                    {{ $references->h2_highlights }}
                </h2>
            </div>
        </div>
        @include('pages.references.partials.index_highlights')
    </div>
</section>

<section class="py-20 pb-40 bg-white">
    <div class="container">
        <h2 class="h2">
            {{ $references->h3_featured }}
        </h2>
        @include('pages.references.partials.index_featured')
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <h2 class="h2">
            {{ $references->h3_az }}
        </h2>
        @include('pages.references.partials.index_az')
    </div>
</section>

<section class="pt-40 pb-40 bg-white border-t border-white">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('blog.index') }}">{{ __('app.next-blog') }}</a>
    </div>
</section>

@endsection