<?php

return [
    'enable'  => true,
    'manager' => [
        'blacklist_enabled'      => false,       // 是否开启黑名单，单点登录和多点登录的注销、刷新使原token失效，必须要开启黑名单
        'blacklist_prefix'       => 'bdhert',    // 黑名单缓存的前缀
        'blacklist_grace_period' => 0,           // 黑名单的宽限时间 单位为：秒，注意：如果使用单点登录，该宽限时间无效
        'redis_driver'           => 'default',   // redis引擎渠道
        'automatic_tips'         => 'token已续签' // 续签提示 refresh_ttL为0时表示永久续签
    ],
    'stores'  => [
        // 单应用
        'default' => [
            'login_type'    => 'mpo', //  登录方式，sso为单点登录，mpo为多点登录
            'signer_key'    => env('APP_API_KEY', 'oP0qmqzHS4Vvml5a'),
            'public_key'    => 'file://path/public.key',
            'private_key'   => 'file://path/private.key',
            'expires_at'    => 3600,
            'refresh_ttL'   => 7200,
            'leeway'        => 0,
            'signer'        => 'HS256',
            'type'          => 'Header',
            'auto_refresh'  => true,
            'iss'           => 'webman.client.api',
            'event_handler' => '',
            'user_model'    => ''
        ],
        // 多应用
        'admin'   => [
            'login_type'    => 'mpo', //  登录方式，sso为单点登录，mpo为多点登录
            'signer_key'    => env('APP_API_KEY', 'oP0qmqzHS4Vvml5a'),
            'public_key'    => 'file://path/public.key',
            'private_key'   => 'file://path/private.key',
            'expires_at'    => 3600,
            'refresh_ttL'   => 7200,
            'leeway'        => 0,
            'signer'        => 'HS256',
            'type'          => 'Header',
            'auto_refresh'  => false,
            'iss'           => 'webman.client.admin',
            'event_handler' => '',
            'user_model'    => ''
        ],
    ]
];