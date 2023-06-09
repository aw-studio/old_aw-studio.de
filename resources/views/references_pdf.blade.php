<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of References</title>
    
    <style>

        @page { margin: 3cm 1cm 3cm 1cm; }

        @font-face {
            font-family: 'Calibre';
            font-weight: normal;
            src: url({{ storage_path('fonts/Calibre-Regular.ttf') }}) format("truetype");
        }
        @font-face {
            font-family: 'Calibre';
            font-weight: bold;
            src: url({{ storage_path('fonts/Calibre-Semibold.ttf') }}) format("truetype");
        }

        h2 {
            font-family:'Calibre';
            font-weight: normal;
        }

        .reference {
            font-family:'Calibre';
            padding:0cm;
            margin-bottom:0.4cm;
            font-size:9pt;
            /* page-break-inside: avoid; */
        }
        .reference h2 {
            margin:-0.5cm 0 0.5cm 0;
        }
        .reference h3 {
            margin:0;
        }
        .reference p {
            margin:0;
        }
        .reference td {
            vertical-align:top;
            width:8.5cm;
            padding-right:0.5cm;
        }
        .reference-index {
            margin-right: 10px;
        }
        .page-break {
            page-break-after: always;
        }
        header {
            font-family:'Calibre';
            font-weight: normal;
            position:fixed;
            top:-3cm;
            left:-1cm;
            width:21cm;
            height:1cm;
            padding:0.5cm 1cm 0.5cm 1cm;
            font-size:12pt;
        }
        header img.logo {
            position:absolute;
            right:3cm;
            top:0.5cm;
            height:1cm;
            width:auto;
        }
        .cover {
            height:25.7cm;
            width:17cm;
            background:white;
            position:absolute;
            top:-3cm;
            left:-1cm;
            padding:2cm;
            page-break-after: always;
        }
        .cover {
            height:25.7cm;
            width:17cm;
            background:white;
            position:absolute;
            top:-3cm;
            left:-1cm;
            padding:2cm;
            page-break-after: always;
        }
        .cover .cover_logo {
            text-align:right;
            margin-bottom:0.75cm;
        }
        .cover .cover_date {
            position:absolute;
            top:3.5cm;
            left:2cm;
            color:#A1A1A1;
            font-family:'Calibre';
            font-weight: normal;
            font-size:12pt;
        }
        .cover h1 {
            font-family:'Calibre';
            color:#161616;
            font-weight: bold;
            font-size:100pt;
            margin:4cm 0 -0.6cm 0;
        }
        .cover h2 {
            font-size:20pt;
            font-weight:normal;
            padding-right:4cm;
            line-height:95%;
        }
        .cover .cover_contact {
            position:absolute;
            left:2cm;
            bottom:3.1cm;
            font-family:'DMSans';
            font-size:10pt;
            line-height:100%;
            width:7.5cm;
        }

        footer {
            font-family:'Calibre';
            position:fixed;
            bottom:-3cm;
            left:-1cm;
            width:21cm;
            height:1cm;
            padding:0.5cm 1cm 0.5cm 1cm;
            font-size:9pt;
            color:#000;
        }
        footer a {
            color:#000;
            text-decoration:none;
        }
    </style>
</head>

<body>

<header>
    Referenzen Auswahl
</header>
<footer>
    //* Alle Wetter – Studio für Design &amp; Development &nbsp;&nbsp;&nbsp;&nbsp; <a href="https://www.aw-studio.de">www.aw-studio.de</a>
</footer>

<div class="cover">
    <div class="cover_date">
        {{ \Carbon\Carbon::now()->format('M Y') }}
    </div>
    <div class="cover_logo">
        <img src="{{ request()->secure() ? 'https://' : 'http://' }}{{ request()->getHost() }}/images/aw-logo-pdf.jpg" alt="Logo" width="35%" />
    </div>
    <h1>
        Referenzen Auswahl
    </h1>
    <h2>
        Design & Development
    </h2>
    <div>
    </div>
    
</div>



    @foreach($references as $reference)
    <div class="reference">
        <h2>
            <span>
                {{ $reference->translations->first()->title }}
            </span>
        </h2>
        <table>
            <tr>
                <td>
                    <h3>
                        {{ $reference->date }}
                    </h3>
                </td>
                <td>
                    <h3>
                        {{ $reference->date }}
                    </h3>
                </td>
            </tr>
        </table>   
        
    </div>
    @endforeach

</body>
</html>