<?php

namespace App\Security\User;

class UserDto
{
    public function __construct(
        public string $username,
        public string $password,
        public array $roles = [User::ROLE_USER],
    ) {
    }
}
