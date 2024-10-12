<?php

namespace App\Core;

use App\Security\Middleware;

class Server
{
    public function __construct(
        private Middleware $middleware,
    ) {

    }

    public function logIn(string $email, string $password): bool
    {
        return $this->middleware->check($email, $password);
    }
}
