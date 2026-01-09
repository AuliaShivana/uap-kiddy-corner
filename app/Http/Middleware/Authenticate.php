<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        // 🔥 PAKSA API TIDAK PERNAH REDIRECT
        throw new AuthenticationException(
            'Unauthenticated.',
            [],
            'api'
        );
    }
}
