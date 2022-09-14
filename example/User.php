<?php

use support\Model;

class User extends Model implements \bdhert\JwtAuth\user\AuthorizationUserInterface
{
    public function getUserById($id)
    {
        return $this->find($id);
    }
}