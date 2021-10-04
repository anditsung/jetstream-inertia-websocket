<?php

if (! function_exists('websocket_url')) {
    function websocket_url() {
        $hostname = request()->getHttpHost();

        $scheme = request()->secure() ? "wss://" : "ws://";

        $port = config('broadcasting.connections.pusher.options.port');

        $key = config('broadcasting.connections.pusher.key');

        return "{$scheme}{$hostname}:{$port}/app/{$key}";
    }
}
