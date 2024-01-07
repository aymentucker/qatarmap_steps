<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ExtraPeram
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $expires = $request->expires;
        $signature = $request->signature;
        $removeExtraQueryUrl = url()->current().'?expires='.$expires.'&signature='.$signature;
        $request = Request::create($removeExtraQueryUrl,'get');
        return $next($request);
    }
}
