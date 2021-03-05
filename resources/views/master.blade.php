@extends('app')

@section('header')
    @include('partials.header')
@endsection
@section('nav')
    @include('partials.nav')
@endsection

@section('content')
    @if ($form)
        <h1>{{ $form->h1 }}</h1>
        @block($form->sections)
    @endif
@endsection