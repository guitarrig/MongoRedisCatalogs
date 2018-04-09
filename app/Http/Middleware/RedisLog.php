<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class RedisLog
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

        $responce =  $next($request);
        if (Auth::id()) {
          Redis::lpush(Auth::user()->name, Carbon::now() . '  ' . $request->path());
        }else {
          Redis::lpush('guest', Carbon::now() . '  ' . $request->path());
        }
        return $responce;
    }
}
