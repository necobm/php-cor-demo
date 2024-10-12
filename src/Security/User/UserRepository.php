<?php

namespace App\Security\User;

class UserRepository
{
    public function __construct(
        /** @var User[] $userCollection */
        private array $userCollection = [],
    ) {
    }

    public function getUserCollection(): array
    {
        return $this->userCollection;
    }

    public function find(string $username): ?User
    {
        foreach ($this->userCollection as $user) {
            if ($user->getUsername() === $username) {
                return $user;
            }
        }

        return null;
    }

    public function add(User $user): void
    {
        $this->userCollection[] = $user;
    }
}
