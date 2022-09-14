<?php
namespace bdhert\JwtAuth\exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Token 过期且继续. 无奈策略
 */
class TokenContinueException extends JwtException {
    public function __construct(string $token, int $refresh_at) {
        parent::__construct(json_encode([
            'Access-Control-Expose-Headers'     => 'Automatic-Renewal-Token,Automatic-Renewal-Token-RefreshAt',
            'Automatic-Renewal-Token'           => $token,
            'Automatic-Renewal-Token-RefreshAt' => $refresh_at
        ], JSON_UNESCAPED_UNICODE), Response::HTTP_CONTINUE);
    }
}