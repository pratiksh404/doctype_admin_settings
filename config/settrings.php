<?php

return [
    /*
        |--------------------------------------------------------------------------
        | Doctype Admin Settings Route Prefix
        |--------------------------------------------------------------------------
        |
        | Option for settings prefix for doctype admin settings.
        | Recommended prefix "admin"
        | 
        */
    "prefix" => 'admin',

    /*
        |--------------------------------------------------------------------------
        | Doctype Admin Settings Route Middleware
        |--------------------------------------------------------------------------
        |
        | Option for defining all middlware used in doctype admin setting plugin 
        | 
        | 
        */
    "middleware" => ['web', 'auth', 'activity', 'role:admin']
];
