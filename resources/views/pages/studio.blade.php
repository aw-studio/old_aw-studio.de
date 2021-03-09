@extends('app')

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('content')

<section class="bg-white aw-first-section">
    <div class="container pt-20 pb-40">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 md:col-start-1 md:col-span-10 lg:col-start-1 lg:col-span-7">
                <h1 class="mb-8 text-xl text-black">
                    {{ $studio->h1 }}
                </h1>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 lg:col-start-1 lg:col-span-8">
                @isset($studio->images[0])
                <x-lit-image :image="$studio->images[0]" class="w-full" />
                @endisset
            </div>
            <div class="col-span-12 col-start-1 lg:col-start-9 lg:col-span-4">
                <div class="mt-20 mb-4 lg:mt-64">
                    @include('partials.svg.icon-arrow-ttb')
                </div>
                @isset($studio->images[1])
                <x-lit-image :image="$studio->images[1]" class="w-full" />
                @endisset
            </div>
        </div>

        <div class="grid grid-cols-12 gap-5 mt-8 lg:mt-40">
            <div class="col-span-12 col-start-1 lg:col-start-1 lg:col-span-7">
                <h2 class="h1">
                    {{ $studio->h2 }}
                </h2>
            </div>
            <div class="col-span-12 col-start-1 text-xl lg:col-start-1 lg:col-span-5">
                {!! $studio->text_intro !!}

            </div>
            <div class="col-span-12 col-start-1 mt-8 lg:col-start-7 lg:col-span-6 lg:mt-20">
                @isset($studio->images[1])
                <x-lit-image :image="$studio->images[2]" class="w-full" />
                @endisset
                <div class="mt-4">
                    @include('partials.svg.icon-arrow-ttb')
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pt-20 bg-white border-t border-black lg:pt-40">
    <div class="container pb-4">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 md:col-start-1 md:col-span-6">
                <h2 class="mb-0 h1">
                    {{ $studio->h2_team_members }}
                </h2>
                <div class="my-12 text-xl">
                    {!! $studio->text_team_members !!}
                </div>
            </div>
        </div>
        <div class="grid grid-flow-row grid-cols-2 gap-5 mb-8 md:grid-cols-4">
            @foreach ($studio->team_members as $team_member)            
            <div>
                <x-lit-image :image="$team_member->image" :alt="$team_member->name" class="w-full mb-4"/>
                <p class="mt-2">
                    <b>{{ $team_member->name }}</b><br>
                    @if($team_member->position)
                        {{ $team_member->position }}<br>
                        @endif
                        {{ $team_member->profession }}
                </p>
            </div>
            @if($loop->iteration == 3)
                <div></div>
                <div></div>
                @endif
                @endforeach
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container pt-20 pb-40">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 lg:col-start-1 lg:col-span-7">
                <x-lit-image :image="$studio->images_jobs" class="w-full" />
            </div>
            <div class="col-span-12 col-start-1 lg:col-start-8 lg:col-span-1">
                @include('partials.svg.icon-arrow-ttb')
            </div>
            <div class="col-span-12 col-start-1 lg:col-start-9 lg:col-span-4 lg:mt-40">
                <x-jobs />
            </div>
        </div>
    </div>
</section>


<section class="pt-40 pb-40 bg-white border-t border-white">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('home') }}">{{ __('app.back-home') }}</a>
    </div>
</section>

@endsection