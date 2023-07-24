<?php

namespace Lit\Actions;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use App\Models\Reference;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadReferencePdfAction
{
    /**
     * Run the action.
     *
     * @param  Collection  $models
     * @return JsonResponse
     */
    public function run(Collection $models)
    {

        $slug = $models->first()->slug;
        $reference = Reference::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->with('translations')->first();

        dd($models->first()->title);

        $pdf = Pdf::loadView('reference_pdf', ['reference'=>$reference]);
        $pdfFilename = 'alle-wetter-referenz-'.$slug.'.pdf';

        return $pdf->download($pdfFilename);
    }
}
