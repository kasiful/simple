<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class Autentikasi
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
        
        if(session()->has('token')){
            $token = addslashes(session('token'));
            $ada = false;
            
            $hasil = DB::select("select token from user_token where token = '$token'");
            foreach ($hasil as $x){
                $ada = true;
                break;
            }
            
            if($ada){
                return $next($request);
            } else {
                return redirect('login');
            }
            
        } else {
            return redirect('login');
        }
        
    }
}
