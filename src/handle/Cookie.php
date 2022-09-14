<?php

namespace bdhert\JwtAuth\handle;

class Cookie extends RequestToken
{
    public function handle()
    {
        return request()->cookie('token');
    }
}