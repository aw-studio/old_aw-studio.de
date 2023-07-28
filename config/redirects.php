<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Redirect Model
    |--------------------------------------------------------------------------
    |
    | This model is responsible for handling redirects stored in the databse.
    |
    */

    'model' => \AwStudio\Redirects\Models\Redirect::class,

    /*
    |--------------------------------------------------------------------------
    | Cache duration
    |--------------------------------------------------------------------------
    | This option controls how long redirects are stored in cache, before the
    | database is queried again. Adding or updating a database redirect will
    | reset this interval.
    | The setting is specified in seconds. Defaults to 24 hours.
    |
    |
    */

    'ttl' => 60 * 60 * 24,

    /*
    |--------------------------------------------------------------------------
    | Preconfigured redirects
    |--------------------------------------------------------------------------
    |
    | You may also configure static redirects by specifying them in this array.
    | Laravel's route parameters can be applied.
    |
    */
    'redirects' => [
        // '/old' => '/new',
        // 'blog/{url}' => 'news/{url}',
        '/de/{url}' => '/{url}',
    ],
];
