<?php

namespace App\Http\Middleware;

use Closure;

class Leveluser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $leveluser=null)
    {

        if(session("leveluser")<=$leveluser){
            return $next($request);
        } else {
            return response('Unauthorized.', 401);
        }

        
    }
}
