<?php

namespace App\Http\Controllers\Wechat;

use Log;
use App\Http\Controllers\Controller;

class WechatController extends Controller {

    public function __construct() {
        $this->middleware('wechat');

        $this->wechat = app('wechat');
        view()->share('js', $this->wechat->js);
    }

    public function serve() {
        return $this->wechat->server->serve();
    }
}
