<?php

namespace App\Http\Middleware;

use Closure;

class Wechat
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
        $openid = session('openid');
        if(!$openid) {
            if(request('_openid')){
                session(['openid' => request('_openid')]);
                return $next($request);
            }
            $wechat = app('wechat');
            try{
                $user = $wechat->oauth->user();
                session(['openid' => $user->id]);
            }catch(\Exception $e){
                abort(403, 'need wechat');
            }
        }
        return $next($request);
    }
}
