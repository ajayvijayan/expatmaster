<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Response;

class deoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next)
    {

         if (Auth::user() && Auth::user()->usertype != 'Data entry operator')
        {
            abort(403, 'Unauthorized action. You do not have sufficient privilege to access this resource.');

        }
        return $next($request);
    }
}
