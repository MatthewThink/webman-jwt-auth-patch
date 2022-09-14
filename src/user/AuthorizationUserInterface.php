<?php

namespace bdhert\JwtAuth\user;

interface AuthorizationUserInterface
{
    public function getUserById($id);
}
