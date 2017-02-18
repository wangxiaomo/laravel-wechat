<?php

namespace App\Http\Middleware\Wechat;

use Closure;
use App\CacheKey;

class WechatUserInfo
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
        $wechat = wechat();
        $user = $wechat->oauth->user();
        redis_set(CacheKey::USER_INFO, $user->id, $user);

        return $next($request);
    }
}
