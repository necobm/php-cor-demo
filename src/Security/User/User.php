<?php

namespace App\Security\User;

class User
{
    public const ROLE_USER = 'ROLE_USER';
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    public function __construct(
        private string $username,
        private string $password,
        private array $roles = [self::ROLE_USER],
    ) {
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function addRole(string $role): self
    {
        if (!in_array($role, $this->roles)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    public function removeRole(string $role): void
    {
        $key = array_search($role, $this->roles);
        if ($key !== false) {
            unset($this->roles[$key]);
        }
    }
}
