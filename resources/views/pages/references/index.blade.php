@extends('app')

@section('meta')
{{-- @if ($references->meta->title)
<title>{{ $references->meta->title }}</title>
@endif --}}
<x-lit-meta :for="$references" />
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

<section class="py-20 pb-20 bg-white">
    <div class="container">
        <h2 class="h2">
            {{ $references->h3_featured }}
        </h2>
        @include('pages.references.partials.index_featured')
    </div>
</section>

<section class="bg-white pb-32">
    <div class="container">
        <div class="flex justify-between pt-12">
            <div>
                {{-- <a class="aw-link" href="{{ __route('studio') }}">{{ __('app.next-studio') }}</a> --}}
            </div>
            <div>
                <x-button :type="'dark'" text="{{ $references->h3_az }}" link="{{ __route('references.a-z') }}" />

            </div>
        </div>
    </div>
</section>


@endsection