<?php

function wechat() {
    return app('wechat');
}

function wechat_url($callback, $scope='snsapi_base') {
    $appid = wechat()->config->app_id;
    $format = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=%s&response_type=code&scope=$scope&state=event#wechat_redirect";
    return sprintf($format, urlencode(env('APP_URL') . $callback));
}
