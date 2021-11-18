<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class blockMobileDevice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Str::contains($request->header("user-agent"), ['Android', 'iPhone ']) == false) {
            return $next($request);
        }
        dd("Tu es sur un mobile device");
        return false;
    }
}
