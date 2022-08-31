<div class="container">
    <div class="gm-consent">
        <p>
            Ich stimme der Einbindung von Google Maps zu.
        </p>
        <div class="gm-consent__buttons">
            <button class="gm-consent__yes btn btn-primary">Karte anzeigen</button>
        </div>
    </div>
</div>


<div id="aw-map" class="aw-map aw-map__fullsize"></div>

<script type="text/javascript">
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
                // Strande
                lat: 54.441598,
                lng: 10.171611
            },
            {
                // Kiel
                lat: 54.323334,
                lng: 10.139444
            },
            {
                // Berlin
                lat: 52.520008,
                lng: 13.404954
            },
            {
                // London
                lat: 51.507351,
                lng: -0.127758
            },
            {
                // Brüssel
                lat: 50.850346,
                lng: 4.351721
            },
            {
                // Stalowa Wola
                lat: 50.570961,
                lng: 22.061590
            },
            {
                // Puna Indien
                lat: 28.772100,
                lng: 77.144280
            },
            {
                // Sao Paulo Brasilien
                lat: -23.548670,
                lng: -46.638248
            },
            {
                // Hartford Conneticut
                lat: 41.765770,
                lng: -72.673363
            },
            {
                // Kuwait
                lat: 29.311661,
                lng: 47.481766
            },
            {
                // Abu Dhabi Vereinigte Arabische Emirate
                lat: 24.453884,
                lng: 54.377342
            },
            {
                // Kairo
                lat: 30.044420,
                lng: 31.235712
            },
            {
                // Wien
                lat: 48.208176,
                lng: 16.373819
            },
            {
                // Breslau
                lat: 51.110550,
                lng: 17.025560
            },
            {
                // Frankfurt am Main
                lat: 50.110924,
                lng: 8.682127
            },
            {
                // Hamburg
                lat: 53.551086,
                lng: 9.993682
            },
            {
                // München
                lat: 48.135124,
                lng: 11.581981
            },
            {
                // Stuttgart
                lat: 48.775845,
                lng: 9.182932
            },
            {
                // Bielefeld
                lat: 52.023071,
                lng: 8.533210
            },
            {
                // Köln
                lat: 50.937531,
                lng: 6.960279
            },
            {
                // Timmendorf
                lat: 53.990429,
                lng: 11.391070
            },
            {
                // Hannover
                lat: 52.375893,
                lng: 9.732010
            },
            {
                // Magdeburg
                lat: 52.131672,
                lng: 11.640320
            },

            {
                // Lenningen
                lat: 48.549751,
                lng: 9.471350
            },
            {
                // Tübingen
                lat: 48.521637,
                lng: 9.057645
            },
            {
                // Lüneburg
                lat: 53.249950,
                lng: 10.408870
            },
            {
                // Unna
                lat: 51.534470,
                lng: 7.685880
            },
            {
                // Rahden Westfalen
                lat: 52.432840,
                lng: 8.613630
            },
            {
                // Düsseldorf
                lat: 51.227741,
                lng: 6.773456
            },
            {
                // Iserlohn
                lat: 51.372971,
                lng: 7.699510
            },
            {
                // Attendorn
                lat: 51.126148,
                lng: 7.903000
            },
            {
                // Eppstein
                lat: 50.140079,
                lng: 8.388320
            },
            {
                // Dortmund
                lat: 51.513588,
                lng: 7.465298
            },
            {
                // Sindelfingen
                lat: 48.707455,
                lng: 9.004405
            },
            {
                // Rastatt
                lat: 48.859116,
                lng: 8.205910
            },
            {
                // Erftstadt
                lat: 50.800209,
                lng: 6.764670
            },
            {
                // Bremen
                lat: 53.079296,
                lng: 8.801694
            },
            {
                // Dormagen
                lat: 51.093048,
                lng: 6.842120
            },
            {
                // Mannheim
                lat: 49.487457,
                lng: 8.466040
            },
            {
                // Fribourg
                lat: 46.806477,
                lng: 7.161972
            },
            {
                // Zürich
                lat: 47.376888,
                lng: 8.541694
            },
            {
                // Lübeck
                lat: 53.865467,
                lng: 10.686559
            },
            {
                // Flensburg
                lat: 54.793743,
                lng: 9.446996
            },
            {
                // Darmstadt
                lat: 49.872826,
                lng: 8.651193
            },

    ]
        var map = new google.maps.Map(
            document.getElementById('wxk-map'), {
                zoom: 3,
                center: {
                    lat: 23,
                    lng: 16
                },
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBtH2N_jvLG2PSoKKejYvqX8tNKNqwHQo&libraries=places&callback=initMap"></script>
