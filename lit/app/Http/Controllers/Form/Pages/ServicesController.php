<?php

namespace Lit\Http\Controllers\Form\Pages;

use Ignite\Crud\Controllers\FormController;
use Illuminate\Contracts\Auth\Access\Authorizable;

class ServicesController extends FormController
{
    /**
     * Authorize request for authenticated lit-user and permission operation.
     * Operations: read, update.
     *
     * @param Authorizable $user
     * @param string $operation
     * @return bool
     */
    public function authorize(Authorizable $user, string $operation): bool
    {
        return true;
    }
}
