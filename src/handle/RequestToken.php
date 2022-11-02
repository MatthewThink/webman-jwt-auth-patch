<?php

namespace xiuxin\JwtAuth\handle;

use xiuxin\JwtAuth\exception\JwtException;

class RequestToken
{
    protected $handles = ['Header', 'Url', 'Cookie'];

    /**
     * @var string|null
     */
    protected $token;


    /**
     * 获取请求Token.
     *
     * @param string|array $handle
     *
     * @return string
     */
    public function get($handle): string
    {
        if (is_string($handle)) {
            $handles = explode('|', $handle);
        }

        foreach ($handles as $handle) {
            if (in_array($handle, $this->handles)) {
                $namespace = '\\xiuxin\\JwtAuth\\handle\\' . $handle;
                $token     = (new $namespace())->handle();
                if ($token) {
                    $this->token = $token;
                    break;
                }
            } else {
                throw new JwtException('不支持此方式获取.', 500);
            }
        }

        if (!$this->token) {
            throw new JwtException('获取Token失败.', 500);
        }

        return $this->token;
    }
}
