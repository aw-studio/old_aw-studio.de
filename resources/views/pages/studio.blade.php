@extends('app')

@section('meta')
{{-- @if ($studio->meta->title)
<title>{{ $studio->meta->title }}</title>
@endif --}}
<x-lit-meta :for="$studio" />
@endsection

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('content')

<section class="bg-white aw-first-section">
    <div class="container py-12 md:py-20">
        <div class="grid grid-cols-12 mb-20">
            <div class="col-start-1 col-span-12 lg:col-span-5 uppercase text-sm mb-4 tracking-widest">
                Studio           
            </div>
            <div class="lg:col-start-6 col-span-full lg:col-span-7 text-xl">
                <h2 class="h1">
                    @isset($studio->h2)
                    {{ $studio->h2 }}
                    @endisset
                 </h2>
                <div class="text-xl">
                    @isset($studio->text_intro)
                    {!! $studio->text_intro !!}
                    @endisset                
                </div>

                <div class="grid grid-flow-row grid-cols-12 gap-4">
                    <div class="col-span-full">
                        @isset($studio->images[2])
                        <x-lit-image :image="$studio->images[2]" class="w-full" />
                        @endisset
                    </div>
                    <div class="col-span-6">
                        @isset($studio->images[0])
                        <x-lit-image :image="$studio->images[0]" class="w-full" />
                        @endisset
                    </div>
                    <div class="col-span-6">
                        @isset($studio->images[1])
                        <x-lit-image :image="$studio->images[1]" class="w-full" />
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bg-white border-t border-black">
    <div class="container py-12 md:py-20">
        <div class="grid grid-cols-12">
            <div class="col-start-1 col-span-12 lg:col-span-5 uppercase text-sm mb-4 tracking-widest">
                Team 
            </div>
            <div class="lg:col-start-6 col-span-full lg:col-span-7 text-xl">
                <h2 class="mb-0 h1">
                    @isset($studio->h2_team_members)
                    {{ $studio->h2_team_members }}
                    @endisset
                </h2>
                <div class="my-12 text-xl">
                    @isset($studio->text_team_members)
                    {!! $studio->text_team_members !!}
                    @endisset
                </div>
                <div class="grid grid-flow-row grid-cols-12 gap-4">
                    @isset($studio->team_members)
                    @foreach ($studio->team_members as $team_member)            
                    <div class="col-span-6 md:col-span-4">
                        <x-lit-image :image="$team_member->image" :alt="$team_member->name" class="w-full mb-4"/>
                        <span class="inline-block mb-4 text-base">
                            <span class="block font-semibold leading-5">{{ $team_member->name }}</span>
                            @if($team_member->position)
                                {{ $team_member->position }}<br>
                                @endif
                                {{ $team_member->profession }}
                        </span>
                    </div>
                    @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="bg-white border-t border-black">
        <div class="container py-12 md:py-20">
            <div class="grid grid-cols-12">
                <div class="col-start-1 col-span-full lg:col-span-5 uppercase text-sm mb-4 tracking-widest">
                    Jobs
                </div>
                <div class="lg:col-start-6 col-span-full lg:col-span-7 text-xl">
                    <div class="mb-12">
                        <x-lit-image :image="$studio->images_jobs" class="w-full" />
                    </div>
                    <x-jobs />
                </div>
            </div>
        </div>
    </section>


<section class="py-20 lg:py-40 bg-white border-t border-black">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('blog.index') }}">{{ __('app.next-blog') }}</a>
    </div>
</section>

@endsection