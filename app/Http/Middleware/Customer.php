<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Customer extends Middleware
{


    // protected function redirectTo(Request $request): ?string
    protected function redirectTo(Request $request) {
        // return $request->expectsJson() ? null : route('admin_login');
        if (! $request->expectsJson()) {
            return route('customer_login');
        }
    }
}
