<?php

namespace App\Core;

use App\Security\SecurityMiddleware;
use App\Security\User\UserDto;

class Server
{
    public function __construct(
        private SecurityMiddleware $middleware,
    ) {

    }

    public function logIn(string $email, string $password): bool
    {
        return $this->middleware->check(new UserDto($email, $password));
    }
}
