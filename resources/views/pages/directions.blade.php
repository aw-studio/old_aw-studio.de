@extends('app')

@section('meta')
{{-- @if ($directions->meta->title)
<title>{{ $directions->meta->title }}</title>
@endif --}}
<x-lit-meta :for="$directions" />
@endsection

@section('bodyclass')
aw-first-section-is-white
@endsection

@section('content')

<section class="bg-white aw-first-section">
    <div class="container pt-20 pb-10">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 col-start-1 md:col-start-1 md:col-span-10 lg:col-start-1 lg:col-span-7">
                <h1 class="h1 aw--animate">
                    @isset($directions->h1)
                    {{ $directions->h1 }}
                    @endisset
                </h1>
                {!! $directions->text !!}
            </div>
        </div> 
    </div>

    <div class="container pb-40">
        <div class="gm-consent">
            <p>
                {{ __('app.map-consent') }}
            </p>
            <div class="gm-consent__buttons">
                <a class="inline-block px-8 py-2 text-lg font-normal text-black bg-white border-2 border-black rounded-sm cursor-pointer gm-consent__yes hover:bg-black hover:text-white">
                    {{ __('app.show-map') }}
                 </a>
            </div>
        </div>
        
        <div id="aw-map" class="aw-map aw-map__fullsize"></div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    let body = document.querySelector('body');
    let button_yes = document.querySelector('.gm-consent__yes');
    
    if (localStorage.getItem("gm-consent")) {
        body.classList.add('gm-consent-ok');
    }
    
    button_yes.onclick = function() {
        localStorage.setItem("gm-consent", '1');
        location.reload();
    }
    
    if (localStorage.getItem("gm-consent") == '1') {
        document.write('<script src="https://maps.googleapis.com/maps/api/js?key={{env('GM_KEY')}}&libraries=places&callback=initMap"><\/script>');
            
        function initMap() {
            var markers = [
                {
                    // Büro
                    lat: 54.324214650024565,
                    lng: 10.141962362253569
                },
                {
                    // Parkplatz
                    lat: 54.324112190947,
                    lng: 10.142205772710751
                },
            ]
            var map = new google.maps.Map(
                document.getElementById('aw-map'), {
                    zoom: 18,
                    center: {
                        lat: 54.32413995660005,
                        lng: 10.142058921773089
                    },
                    styles: [
                        {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#333333"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "hue": "#ff0000"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#dedede"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f2f2f2"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e9e9e9"
            },
            {
                "lightness": 17
            }
        ]
    }
                    ]
                }
            );
    
            for (var i = 0; i < markers.length; i++) {
                var marker = new google.maps.Marker({
                    position: markers[i],
                    map: map
                    
                });
            }
        }
    }
    </script>
    
@endsection