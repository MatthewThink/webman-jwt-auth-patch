<?php

namespace xiuxin\JwtAuth;

use xiuxin\JwtAuth\event\EventHandler;
use xiuxin\JwtAuth\exception\TokenInvalidException;

class Event
{
    /**
     * @var EventHandler
     */
    protected $handle;

    public function __construct($handle = null)
    {
        if ($handle) {
            $class = new $handle;
            if ($class instanceof EventHandler) {
                $this->handle = $class;
            } else {
                throw new TokenInvalidException('must be implements xiuxin\JwtAuth\event\EventHandler',500);
            }
        }
    }

    public function __call($name, $arguments)
    {
        if ($this->handle) {
            call_user_func_array([$this->handle, $name], $arguments);
        }
    }
}
