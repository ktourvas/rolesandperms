<?php

namespace ktourvas\rolesandperms\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthorizeUserRole
{

    public function handle( Request $request, Closure $next, ...$role ) {

        if( !$request->user()->userIs($role) ) {
            abort(401);
        }

        return $next($request);

    }

}
