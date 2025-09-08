<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as MiddlewareAuthenticate;

class Authenticate extends MiddlewareAuthenticate
{
    /**
     * Handle an unauthenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return never
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function unauthenticated($request, array $guards)
    {
        foreach ($guards as $guard) {
            switch ($guard) {
                case 'admin':
                    throw new AuthenticationException(redirectTo: route('admin.login'));
                    break;
                default:
                    throw new AuthenticationException(redirectTo: route('login'));
            }
        }
    }
}
