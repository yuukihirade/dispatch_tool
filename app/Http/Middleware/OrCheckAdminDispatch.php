<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OrCheckAdminDispatch
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
        if($request->user()->department_id != 1 && $request->user()->department_id != 3)
        {
            abort(403);
        }
        
        return $next($request);
    }
}
