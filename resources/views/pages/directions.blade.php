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
                Ich stimme der Einbindung von Google Maps zu.
            </p>
            <div class="gm-consent__buttons">
                <button class="gm-consent__yes btn btn-primary">Karte anzeigen</button>
            </div>
        </div>
        
        <div id="aw-map" class="aw-map aw-map__fullsize"></div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    let body = document.querySelector('body');
    let button_yes = document.querySelector('button.gm-consent__yes');
    
    if (localStorage.getItem("gm-consent")) {
        body.classList.add('gm-consent-ok');
    }
    
    button_yes.onclick = function() {
        localStorage.setItem("gm-consent", '1');
        location.reload();
    }
    
    if (localStorage.getItem("gm-consent") == '1') {
        document.write('<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBtH2N_jvLG2PSoKKejYvqX8tNKNqwHQo&libraries=places&callback=initMap"><\/script>');
            
        function initMap() {
            var markers = [
                {
                    // Büro
                    lat: 54.324197994649225,
                    lng: 10.141904909662765
                },
                {
                    // Parkplatz
                    lat: 54.32402682083483,
                    lng: 10.14215016812231
                },
            ]
            var map = new google.maps.Map(
                document.getElementById('aw-map'), {
                    zoom: 19,
                    center: {
                        lat: 54.324197994649225,
                        lng: 10.141904909662765
                    },
                    styles: [
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
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
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