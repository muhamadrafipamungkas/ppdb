<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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
        $isLogin = Auth::user();

        //This will be excecuted if the new authentication fails.
        if (!$isLogin){
            return redirect()->route('login')->with('message', 'Authentication Error.');
        } else if ($isLogin && $isLogin->role != 'admin') {
            return redirect()->route('/');
        }
        return $next($request);
    }
}
