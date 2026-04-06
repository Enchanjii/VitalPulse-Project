<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CSRF Token Field Name
    |--------------------------------------------------------------------------
    |
    | This is the name of the form field that will be used to send the CSRF
    | tokens. For security reasons, this field name should be obscure and
    | difficult to guess. The framework defaults to _token.
    |
    */

    'field' => '_token',

    /*
    |--------------------------------------------------------------------------
    | CSRF Header Field Name
    |--------------------------------------------------------------------------
    |
    | This is the name of the HTTP header that will be set to the CSRF token
    | value. This is the name used in JavaScript headers like X-CSRF-TOKEN.
    |
    */

    'header' => 'X-CSRF-TOKEN',

];
