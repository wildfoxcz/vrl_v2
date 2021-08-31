<?php

namespace App\Http\Middleware;

use Closure;

class VerifyRole
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next, $requiredRole)
    {
        if(!auth()->user())
            return redirect()->route('login');
            // @todo Show some alert on the login form

        if(!auth()->user()->isAuthorised($requiredRole))
            abort(401, 'Na zobrazení této stránky nemáte dostatečná oprávnění.');

        return $next($request);
    }
}
