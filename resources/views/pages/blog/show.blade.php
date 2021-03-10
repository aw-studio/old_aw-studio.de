@extends('app')

@section('content')
    @if ($post)
        <h1>{{ $post->h1 }}</h1>
        @block($post->sections)
    @endif
@endsection