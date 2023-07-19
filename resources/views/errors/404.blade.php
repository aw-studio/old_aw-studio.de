@extends('app')

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('content')
<section class="py-20 bg-white lg:pt-40 aw-first-section">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-10 col-start-1 lg:col-span-6">
                <h1 class="mb-4 text-xl text-black">
                   
                </h1>
                <h2 class="h1">
                    {{__('app.page-not-found')}}
                </h2>
            
                <a href="{{ __route('home') }}" class="aw-link">{{__('app.to-homepage')}}</a>              
            </div>
        </div>
    </div>
</section>
@endsection