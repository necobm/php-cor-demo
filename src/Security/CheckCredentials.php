<?php

namespace App\Security;

use App\Security\User\UserRepository;

/**
 * This Concrete Middleware checks whether a user with given credentials exists and have valid credentials.
 */
class CheckCredentials extends Middleware
{
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    public function check(string $email, string $password): bool
    {
        $user = $this->userRepository->find($email);
        if (\is_null($user)) {
            echo "CheckCredentials: This email is not registered!\n";

            return false;
        }

        if ($user->getPassword() !== $password) {
            echo "CheckCredentials: Wrong password!\n";

            return false;
        }

        return parent::check($email, $password);
    }
}
