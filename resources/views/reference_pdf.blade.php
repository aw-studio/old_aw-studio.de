<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referenz</title>
    
    <style>

        @page { margin: 2.5cm 1cm 0cm 1cm; }

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
            margin-top:-1cm;
            /* page-break-inside: avoid; */
        }
        .reference h2 {
            font-size: 16pt;
            font-weight:bold;
            line-height:100%;
            margin-right:3cm;
        }
        p + h2 {
            margin-top:1cm;
        }
        .reference ul {
            margin-left:0.5cm;
            padding-left:0cm;
        }
        .reference h3 {
            font-size: 14pt;
            line-height:100%;
            margin-right:3cm;
        }
        p + h3 {
            margin-top:1cm;
        }
        .reference p {
            font-size: 12pt;
            margin-right:2cm;
        }
        .reference td {
            padding-right:2cm;
            vertical-align:top;
        }
        .reference .buzzwords {
            margin-bottom:2cm;
        }
        .reference .link {
            margin-top:1cm;
        }
        .reference .link a {
            color:#161616;
            text-decoration: none;
            font-weight:bold;
        }
        .page-break {
            page-break-after: always;
        }
        header {
            font-family:'Calibre';
            font-weight: normal;
            position:fixed;
            top:-2.5cm;
            left:-1cm;
            width:21cm;
            height:1cm;
            padding:0.5cm 1cm 0.5cm 1cm;
            font-size:9pt;
        }
        .cover {
            height:28.2cm;
            width:19cm;
            background:white;
            position:absolute;
            top:-2.5cm;
            left:-1cm;
            padding:1cm;
            page-break-after: always;
        }
        .cover .cover_topline {
            position:absolute;
            left:1cm;
            top:3cm;
            font-family:'Calibre';
            color:#161616;
            font-size:16pt;
            font-weight:normal;
        }
        .cover .cover_logo {
            text-align:right;
            margin-top:0.4cm;
            margin-bottom:2cm;
        }
        .cover h1 {
            font-family:'Calibre';
            color:#161616;
            font-weight: normal;
            line-height:78%;
            font-size:44pt;
            margin:1cm 2cm 0cm 0cm;
        }
        .cover h2 {
            font-family:'Calibre';
            color:#161616;
            font-size:24pt;
            font-weight:normal;
            padding-right:2cm;
            line-height:95%;
            margin-bottom:0cm;
        }
        .cover .cover_excerpt {
            font-family:'Calibre';
            color:#161616;
            font-size:16pt;
            font-weight:normal;
            padding-right:2cm;
            line-height:100%;
        }

        footer {
            font-family:'Calibre';
            position:fixed;
            bottom:0cm;
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
    <strong>Referenz</strong> &nbsp;&nbsp;&nbsp;&nbsp; {{ $reference->title }}
</header>
<footer>
    <strong>//* Alle Wetter</strong> &nbsp;–&nbsp; Studio für Design &amp; Development &nbsp;&nbsp;&nbsp;&nbsp; Burgstr. 4, 24103 Kiel &nbsp;&nbsp;&nbsp;&nbsp; <a href="https://www.aw-studio.de">www.aw-studio.de</a>
</footer>

<div class="cover">
    <div class="cover_topline">
        Referenz
    </div>
    <div class="cover_logo">
        <img src="{{ request()->secure() ? 'https://' : 'http://' }}{{ request()->getHost() }}/images/aw-logo-pdf.jpg" alt="Logo" width="35%" />
    </div>
    <div class="cover_image">
        <img src="{{$reference->image->getFullUrl()}}" width="100%" height="auto" />             
    </div>
    <h1>
        {{ $reference->title }}
    </h1>
    <h2>
        {{ $reference->subtitle }}
    </h2>
    <div class="cover_excerpt">
        {!! $reference->excerpt !!}
    </div>
</div>

    <div class="reference">

        <div style="margin-top:1cm;">
        {!! $reference->text !!}
        </div>

        <table style="margin-bottom:1cm;">
            <tr>
                <td style="width:7cm;">
                    @if($reference->customers->count() > 0)
        <h3>Auftraggeber:in</h3>
            <ul>
                @foreach($reference->customers as $customer)
                <li>{{ $customer->name }} @if($customer->suffix) – {{ $customer->suffix }}@endif</li>
                @endforeach
            </ul>
        @endif
                </td>
                <td>
                    <h3>Umsetzung</h3>
                    {!! $reference->date !!}
                </td>
            </tr>

            <tr>
                <td style="width:7cm;">
                    @if($reference->services->count() > 0)
                    <h3>Leistungen</h3>
                        <ul>
                            @foreach($reference->services as $service)
                            <li>{{ $service->title }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    @if($reference->technologies->count() > 0)
                    <h3>Technologien</h3>
                        <ul>
                            @foreach($reference->technologies as $technology)
                            <li class="text-sm">{{ $technology->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
        </table>

        <div class="buzzwords">
        {!! $reference->buzzwords !!}
        </div>

        @foreach ($reference->details as $detail)

        @if ($detail->type == 'image_1xfull')   
        
        <div style="border:0.5pt solid #BBB;margin-bottom:1cm;">
            <img src="{{$detail->image->getFullUrl()}}" width="100%" height="auto" />             
        </div>
        @endif

        @if ($detail->type == 'image_2xhalf')
        <div style="border:0.5pt solid #BBB;margin-bottom:1cm;">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width:50%;padding-right:0;">
                            <img src="{{$detail->image1->getFullUrl()}}" width="100%" height="auto" />
                        </td>
                        <td style="width:50%;padding-right:0;">
                            <img src="{{$detail->image2->getFullUrl()}}" width="100%" height="auto" />
                        </td>
                    </tr>
                </table>
        </div>
        @endif

        @if ($detail->type == 'text')
        {!! $detail->text !!}
        @endif

@endforeach

@if($reference->link_href)
<div class="link">
    <a href="{{ $reference->link_href }}">{{ $reference->link_text }}</a>
</div>
@endif

    </div>

</body>
</html>