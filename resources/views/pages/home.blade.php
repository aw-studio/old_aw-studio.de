@extends('app')

@section('meta')
@if ($form->meta->title)
<title>{{ $form->meta->title }}</title>
@endif
<x-lit-meta :for="$form" />
@endsection

@section('appclass')
aw-home
@endsection

@section('content')

<section class="bg-white aw-first-section">

    <div class="container py-20 lg:py-24 aw-jumbo">
        <h1 class="text-2xl font-semibold sm:text-3xl lg:text-5xl">{!! nl2br(e($form->h1)) !!}</h1>
    </div>

</section>

@php
$playground_no = rand(1,4);
@endphp
<playground-{{ $playground_no }}></playground-{{ $playground_no }}>

<section class="bg-white">
    <div class="container pt-20">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 lg:col-span-8">
                <div class="mb-20 lg:mb-40">
                    <h2 class="h1">
                        {!! nl2br(e($form->h2)) !!}
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-5 lg:grid-cols-8 lg:mb-40 ">
                    <div class="col-span-12 col-start-1 mb-8 md:col-start-1 md:col-span-5 lg:col-start-2 lg:col-span-3">
                        <h3 class="h3">
                            {{ $form->h3_design }}
                        </h3>
                        <div class="mb-8">
                            @include('partials.svg.icon-design')
                        </div>
                        <div class="aw-list">
                            {!! $form->list_design !!}
                        </div>
                        {!! $form->text_design !!}
                    </div>
                    <div class="col-span-12 col-start-1 mb-8 md:col-start-7 md:col-span-5 lg:col-start-6 lg:col-span-3">
                        <h3 class="h3">
                            {{ $form->h3_development }}
                        </h3>
                        <div class="mb-8">
                            @include('partials.svg.icon-development')
                        </div>
                        <div class="aw-list">
                            {!! $form->list_development !!}
                        </div>
                        {!! $form->text_development !!}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-12 col-start-1 pb-20 lg:col-start-9 lg:col-span-4">
                <div class="md:sticky top-sticky lg:float-right ">
                    <x-button type="dark" text="{{ $form->button_services }}" link="{{ __route('services') }}" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-8 bg-black md:py-20 lg:py-40">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 mb-8 md:col-start-2 md:col-span-9 lg:col-start-1 lg:col-span-5 lg:mb-20">
                <div class="lg:sticky top-sticky">
                    <h2 class="mb-0 h1 lg:pr-8">
                        {{ $form->h2_solutions }}
                    </h2>
                    <div class="mt-8 aw-list">
                        {!! $form->list_solutions !!}
                    </div>
                </div>
            </div>
            <div class="col-span-12 col-start-1 mb-12 lg:col-start-6 lg:col-span-7 lg:mb-0">
                <x-references-teaser />
                <x-button type="light" text="{{ __('app.all-references') }}" link="{{ __route('references.index') }}" />
            </div>
        </div>
    </div>
</section>

<section class="py-8 bg-white md:py-20 lg:py-40">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 lg:col-start-1 lg:col-span-4">
                <div class="lg:sticky top-sticky">
                    <h2 class="mb-0 h1">
                        {{ $form->h2_customers }}
                    </h2>
                </div>
            </div>
            <div class="col-span-12 col-start-1 mt-8 lg:mt-0 lg:col-start-6 lg:col-span-7">
                <x-customers />
            </div>
        </div>
    </div>
</section>



{{-- <section class="py-8 bg-white md:py-20 lg:py-40">
    <div class="container">
        <div class="grid grid-cols-12 gap-5 mb-12">
            <div class="col-span-12 col-start-1 lg:col-span-6">
                <h2 class="mb-0 h1">
                    {{ $form->h2_blog}}
                </h2>
            </div>
            <div class="order-last col-span-12 col-start-1 lg:flex lg:mt-0 lg:col-start-7 lg:col-span-6 lg:justify-end lg:items-end lg:order-none">
                <x-button type="dark" text="{{ $form->button_blog }}" link="{{ __route('blog.index') }}" />
            </div>
            @foreach($posts as $post)
            <div class="col-span-12 mt-6 lg:col-span-6 lg:mt-12">
                <x-post :post="$post" />
            </div>
            @endforeach
        </div>
    </div>
</section> --}}


<section class="pt-20 pb-20 bg-white border-t border-black md:pb-40 lg:pb-40">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 mb-20 md:col-start-1 md:col-span-6 lg:col-start-1 lg:col-span-6">
                <h2 class="h3">{{ $form->h3_management }}</h2>
                <div class="text-xl">
                    {!! $form->text_management !!}
                </div>
                <div class="grid grid-flow-row grid-cols-3 gap-5 mb-8">
                    @isset($form->team_members)
                    @foreach ($form->team_members as $team_member)
                    <div>
                        <x-lit-image :image="$team_member->image" :alt="$team_member->name" class="w-full" />
                        <p class="mt-2 text-sm">
                            {{ $team_member->name }}
                        </p>
                    </div>
                    @endforeach
                    @endisset
                </div>
                <x-button :type="'dark'" text="{!! $form->button_studio !!}" link="{{ __route('studio') }}" />
            </div>
            <div class="col-span-12 col-start-1 md:col-start-8 md:col-span-5 lg:col-start-9 lg:col-span-4 md:mt-64">
                <x-jobs />
            </div>
        </div>
    </div>
</section>


<section class="pt-40 pb-40 bg-white border-t border-white">
    <div class="container text-center">
        <a class="aw-link" href="{{ __route('services') }}">{{ __('app.next-services') }}</a>
    </div>
</section>

@endsection

@section('scripts')

@if($playground_no == 4)
    <libs/>
    <script type="text/javascript" src="/js/pg4-patch.js?v=2" async></script>
    <corelibs/>

    <script>

        function patchInitialized(patch) {
            // You can now access the patch object (patch), register variable watchers and so on
        }

        function patchFinishedLoading(patch) {
            // The patch is ready now, all assets have been loaded
        }

        document.addEventListener('CABLES.jsLoaded', function (event) {
            CABLES.patch = new CABLES.Patch({
                patch: CABLES.exportedPatch,
                prefixAssetPath: '',
                glCanvasId: 'glcanvas',
                glCanvasResizeToWindow: true,
                onPatchLoaded: patchInitialized,
                onFinishedLoading: patchFinishedLoading,
            });
        });
    </script>

@endif

@endsection
