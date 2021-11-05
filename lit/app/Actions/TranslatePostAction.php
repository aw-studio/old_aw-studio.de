<?php

namespace Lit\Actions;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class TranslatePostAction
{
    /**
     * Run the action.
     *
     * @param  Collection  $models
     * @return JsonResponse
     */
    public function run(Collection $models)
    {
        
        $models->first()->sections()->get()->each(function($item) {
            dd($item);
            $item->translateTo('en');
        });
        $models->first()->translateTo('en');
       
        return response()->success('Action executed.');
    }
}
