@extends('app')

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