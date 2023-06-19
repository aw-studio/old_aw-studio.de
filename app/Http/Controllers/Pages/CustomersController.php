<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function index()
    {
        return view('pages.customers.index')->with([
            'customers'    => Customer::active()->get(),
       ]);
    }

    public function show($slug)
    {

        $customer = Customer::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->active()->with('translations')->first();

        if (! $customer || ! $customer->active) {
            return redirect()->route(app()->getLocale().'.customers.index');
        }

        $slugs = $customer->translations->mapWithKeys(function ($item) {
            return [$item->locale => $item->slug];
        })->toArray();

        return view('pages.customers.show')->with([
            'customer'           => $customer,
            'routeParameters'     => ['slug' => $slugs],
        ]);
    }

    /**
     * Looks up the translated slug for a crud in the translation table.
     *
     * @return slug
     */
    public function getCustomerSlug($locale, $slug)
    {
        $slug = Customer::whereTranslation('slug', $slug)
            ->first()
            ->translate($locale)
            ->slug;

        return ['slug' => $slug];
    }
}
