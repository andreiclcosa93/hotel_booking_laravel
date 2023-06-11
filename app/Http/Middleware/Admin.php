<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Admin extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    protected function redirectTo(Request $request) {
        // return $request->expectsJson() ? null : route('admin_login');
        if (! $request->expectsJson()) {
            return route('admin_login');
        }
    }
}
