<?php

namespace App\Http\Middleware;

use Closure;

class Xframe
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
        $response = $next($request);
        $response->headers->remove('X-Frame-Options');

        $response->headers->set('X-Frame-Options', 'ALLOW-FROM *');

        return $response;
    }
}
