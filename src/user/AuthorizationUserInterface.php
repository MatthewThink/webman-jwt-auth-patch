<?php

namespace xiuxin\JwtAuth\user;

interface AuthorizationUserInterface
{
    public function getUserById($id);
}
