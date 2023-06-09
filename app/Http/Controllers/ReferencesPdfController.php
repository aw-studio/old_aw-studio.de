<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use Illuminate\Support\Carbon;
use PDF;

class ReferencesPdfController extends Controller
{
    public function showView()
    {
        $references = Reference::orderBy('date', 'DESC')->get();

        return view('references_pdf', [
            'references' => $references,
        ]);
    }

    // public function createPdf()
    // {
    //     $references = Reference::orderBy('date', 'DESC')->get();

    //     view()->share('references', $references);
    //     $pdf = PDF::loadView('references_pdf', $references->toArray());
    //     $pdfFilename = 'Alle-Wetter-Referenzen-Auswahl '.Carbon::now()->format('M Y').'.pdf';

    //     return $pdf->download($pdfFilename);
    // }

    public function createSingleReferencePdf($slug)
    {
        $reference = Reference::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->with('translations')->first();

        view()->share('reference', $reference);
        $pdf = PDF::loadView('reference_pdf', $reference->toArray());
        $pdfFilename = 'alle-wetter-referenz-'.$slug.'.pdf';

        return $pdf->download($pdfFilename);
    }
}
