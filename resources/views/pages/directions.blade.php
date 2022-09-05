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
            // var markers = [
            //     {
            //         // Büro
            //         lat: 54.324214650024565,
            //         lng: 10.141962362253569
            //     },
            //     {
            //         // Parkplatz
            //         lat: 54.324112190947,
            //         lng: 10.142205772710751
            //     },
            // ]
            var map = new google.maps.Map(
                document.getElementById('aw-map'), {
                    zoom: 19,
                    center: {
                        lat: 54.32413995660005,
                        lng: 10.142058921773089
                    },
                    styles: [
                        {
                            "featureType": "administrative",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "hue": "#000000"
                                },
                                {
                                    "lightness": -100
                                },
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "hue": "#dddddd"
                                },
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": -3
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "hue": "#000000"
                                },
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": -100
                                },
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "hue": "#000000"
                                },
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": -100
                                },
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "hue": "#ff0000"
                                },
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": 26
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": 100
                                },
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#d9d9d9"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.text",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "hue": "#ffffff"
                                },
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": 100
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "labels.text",
                            "stylers": [
                                {
                                    "visibility": "simplified"
                                },
                                {
                                    "color": "#8d8b8b"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "hue": "#000000"
                                },
                                {
                                    "lightness": -100
                                },
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "hue": "#ffffff"
                                },
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": 100
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "hue": "#000000"
                                },
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": -100
                                },
                                {
                                    "visibility": "off"
                                }
                            ]
                        }
                    ]
                }
            );
    
            const officeImage = '/assets/office.svg';
            const parkingImage = '/assets/parking.svg';
           
            var officeMarker = new google.maps.Marker({
                position: { lat: 54.324214650024565, lng: 10.141962362253569 },
                map: map,
                icon: officeImage
            });

            var parkingMarker = new google.maps.Marker({
                position: { lat: 54.324112190947, lng: 10.142205772710751 },
                map: map,
                icon: parkingImage
            });
            
        }
    }
    </script>
    
@endsection