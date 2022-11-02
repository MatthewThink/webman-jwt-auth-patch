<?php

namespace xiuxin\JwtAuth\handle;

class Cookie extends RequestToken
{
    public function handle()
    {
        return request()->cookie('token');
    }
}
