<?php

namespace App\Http\Middleware;

use Closure;

class RememberMeHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\https\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::viaRemember()){    // Remember Meでの認証時
            Log::notice('Remember Me Logged in');
            // 行いたい処理を書く
        }
        return $next($request);
    }
}
