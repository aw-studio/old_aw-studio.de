<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use Ignite\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ReferencesPdfController extends Controller
{
    public function showView()
    {
        $references = Reference::orderBy('date', 'DESC')->get();

        return view('references_pdf', [
            'references' => $references,
        ]);
    }

    public function createSingleReferencePdf($slug, Request $request)
    {

        $reference = Reference::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->with('translations')->first();

        if($request->tender) {
            $reference->setAttribute('tender',true);
        }

        $pdf = Pdf::loadView('reference_pdf', ['reference'=>$reference]);
        $pdfFilename = 'alle-wetter-referenz-'.$slug.'.pdf';

        return $pdf->download($pdfFilename);
    }

}
