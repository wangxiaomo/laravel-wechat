<?php

function redis_set() {
    $args = func_get_args();
    $key = array_shift($args);
    $value = array_pop($args);
    $key = vsprintf($key, $args);
    
    Illuminate\Support\Facades\Redis::set($key, serialize($value));
}

function redis_get() {
    $args = func_get_args();
    $key = array_shift($args);
    $key = vsprintf($key, $args);
    
    return unserialize(Illuminate\Support\Facades\Redis::get($key));
}
