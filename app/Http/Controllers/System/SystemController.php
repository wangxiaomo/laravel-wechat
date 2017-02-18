<?php

namespace App\Http\Controllers\System;

use Log;
use App\Http\Controllers\Controller;
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
}
