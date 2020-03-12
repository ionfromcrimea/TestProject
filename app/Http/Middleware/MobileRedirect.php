<?php

namespace App\Http\Middleware;

use Closure;

class MobileRedirect
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
        // check if the request is from mobile device
//dd($request->mobile);
            if ($request->mobile == "1") {
            return redirect('mobile-site-url-goes-here');
        }

        return $next($request);
    }
}
