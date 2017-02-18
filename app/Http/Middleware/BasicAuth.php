<?php

namespace App\Http\Middleware;

use Closure;

class BasicAuth {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(request()->getUser() != 'wangxiaomo' && request()->getPassword() != 'coldwar2'){
            $headers = ['WWW-Authenticate' => 'Basic'];
            return response()->make('Invalid credentials.', 401, $headers);
        }
        return $next($request);
    }
}
