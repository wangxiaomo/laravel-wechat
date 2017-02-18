<?php

namespace App\Http\Controllers\System;

use Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Wechat;

class SystemController extends Controller {
    public function wechat_maps() {
        $url_maps = [
            [ 'url' => '/wechat/user', 'scope' => Wechat::SNSAPI_USERINFO],
        ];

        foreach($url_maps as $u) {
            $r[env('APP_URL') . $u['url']] = wechat_url($u['url'], $u['scope']);
        }
        dump($r);
    }

    public function keys() {
        $keys = Redis::keys('orc:wechat:*');
        foreach($keys as $key){
            $r[$key] = redis_get($key);
        }
        dump($r);
    }
}
