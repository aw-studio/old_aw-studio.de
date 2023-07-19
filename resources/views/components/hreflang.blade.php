@if(Request::route() != null)
    @foreach ($locales as $locale)
        <link rel="alternate" href="{{ Request::route()->translate($locale) }}"
            hreflang="{{ $locale }}" />
    @endforeach
@endif