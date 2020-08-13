@extends('app')

@section('meta')
<x-meta
    :metaTitle="$references->metaTitle"
    :metaDescription="$references->metaDescription"
    :metaKeywords="$references->metaKeywords"/>    
@endsection

@section('content')

<section class="bg-black">

    <div class="container pt-20">
        <div class="grid grid-cols-12 gap-5 mb-20">
            <div class="col-start-1 col-span-12 lg:col-span-9">
                <h1 class="text-xl mb-4 text-white">
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

<section class="bg-white py-20 pb-40">

    <div class="container">
        {{-- <h2 class="h2">
            {{ $references->h3_featured }}
        </h2> --}}
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



<section class="bg-white border-t border-white pt-40 pb-40">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('studio') }}">{{ __('app.next-studio') }}</a>
    </div>
</section>

@endsection
