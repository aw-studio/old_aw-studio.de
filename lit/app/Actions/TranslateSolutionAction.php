<?php

namespace Lit\Actions;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class TranslateSolutionAction
{
    /**
     * Run the action.
     *
     * @param  Collection  $models
     * @return JsonResponse
     */
    public function run(Collection $models)
    {
        $models->first()->sections()->get()->each(function ($item) {
            $item->translateTo('en');
        });
        $models->first()->translateTo('en');

        return response()->success('Solution translated.');
    }
}
