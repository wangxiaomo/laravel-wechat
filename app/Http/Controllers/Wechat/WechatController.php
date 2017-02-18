<?php

namespace App\Http\Controllers\Wechat;

use Log;
use App\Http\Controllers\Controller;
use App\CacheKey;

class WechatController extends Controller {
    public function __construct() {
        $this->middleware('wechat')->except('test');
        $this->middleware('wechat_snsapi_userinfo')->only('user');

        $this->wechat = wechat();
        view()->share('js', $this->wechat->js);
    }

    public function serve() {
        return $this->wechat->server->serve();
    }

    public function user() {
        return "wechat user";
    }
}
