<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Deepl API-URL
    |--------------------------------------------------------------------------
    |
    | This option controls the API-URL that should be taken for outgoing requests
    | to DeepL.
    |
    */
    'api_url' => 'https://api-free.deepl.com/v2/translate',

    /*
    |--------------------------------------------------------------------------
    | Deepl API-Authentification Token
    |--------------------------------------------------------------------------
    |
    | This option controls the auth-token which can be found in your account
    | settings.
    |
    */
    'api_token' => env('DEEPL_SECRET', ),

    /*
    |--------------------------------------------------------------------------
    | Translated Models
    |--------------------------------------------------------------------------
    |
    | Here you can set all models that should be auto-translated when running
    | the deeplable:run command. Remember that these models must implment the
    | Astrotomic\Translatable\Contracts\Translatable Contract.
    |
    */
    'translated_models' => [
        App\Models\Reference::class,
        App\Models\Post::class,
    ],
];
