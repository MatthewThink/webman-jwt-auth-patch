<?php

namespace xiuxin\JwtAuth\handle;

class Url extends RequestToken
{
    public function handle()
    {
        return request()->get('token');
    }
}
