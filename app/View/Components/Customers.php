<?php

namespace App\View\Components;

use App\Models\Customer;
use Illuminate\View\Component;

class Customers extends Component
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
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.customers')->with([
            'customer_groups' => Customer::sort('category_id')->sort('name')->get()->groupBy('category_id'),
        ]);
    }
}
