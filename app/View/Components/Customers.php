<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Customer;

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
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
      $customers_groups = Customer::sort('category_id')->sort('name')->get()->groupBy('category_id');
        return view('components.customers')->with([
          'customer_groups' => $customers_groups
        ]);
    }
}
