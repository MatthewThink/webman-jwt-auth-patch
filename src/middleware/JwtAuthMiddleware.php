<?php

namespace bdhert\JwtAuth\middleware;

use Webman\MiddlewareInterface;
use Webman\Http\Response;
use Webman\Http\Request;
use bdhert\JwtAuth\exception\JwtException;
use bdhert\JwtAuth\handle\RequestToken;
use bdhert\JwtAuth\facade\JwtAuth;

class JwtAuthMiddleware implements MiddlewareInterface {
    public function process(Request $request, callable $next, array $params = []): Response {
        if ($request->method() === 'OPTIONS') {
            response('', 204);
        }
        $app = request()->app ?? 'default';
        try {
            $requestToken = new RequestToken();
            $handel       = JwtAuth::getConfig($app)->getType();
            $token        = $requestToken->get($handel);
            JwtAuth::verify($token);
            $request->user = JwtAuth::getUser();
            return $next($request);
        } catch (JwtException $e) {
            throw new JwtException($e->getMessage(), $e->getCode());
        }
    }
}