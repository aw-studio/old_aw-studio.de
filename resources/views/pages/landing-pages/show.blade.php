@extends('app')

@section('meta')
{{-- @if ($landingPage->title)
<title>{{ strip_tags($landingPage->title) }}</title>
@endif --}}
{{-- <x-lit-meta :for="$landingPage" /> --}}
@endsection

@section('content')
    <section class="bg-white">
        <div class="container pb-20">
            <div class="grid grid-cols-12 gap-5 mt-20 lg:mt-40">
                <div class="col-span-12 col-start-1 lg:col-start-6 lg:col-span-6">
                    <h1 class="h1">
                        {!!Str::of($landingPage->h1)->replace('<p>', '')->replace('</p>', '')!!}
                    </h1>
                </div>
                <div class="col-span-12 mb-20 text-xl lg:col-span-6 lg:col-start-6">
                    {!!$landingPage->text!!}
                </div>
            </div>
        </div>
    </section>
@endsection