<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if ($request->user() === null) {
            return redirect('/home');
        }
        $admin = Auth::user()->is_admin();
        if(!$request->user() === $admin) {
            return response("Insufficient permissions, please contact an admin", 401);
        }
        
        return $next($request);
    }
}
