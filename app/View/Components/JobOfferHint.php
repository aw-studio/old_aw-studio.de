<?php

namespace App\View\Components;

use App\Models\JobOffer;
use Illuminate\View\Component;

class JobOfferHint extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.job-offer-hint')->with([
            'job_offers' => JobOffer::active()->get(),
        ]);
    }
}
