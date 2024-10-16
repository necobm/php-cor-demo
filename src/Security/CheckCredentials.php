<?php

namespace App\Security;

use App\Security\User\UserDto;
use App\Security\User\UserRepository;

/**
 * This Concrete Middleware checks whether a user with given credentials exists and have valid credentials.
 */
class CheckCredentials extends SecurityMiddleware
{
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    public function check(UserDto $userDto): bool
    {
        $user = $this->userRepository->find($userDto->username);
        if (\is_null($user)) {
            echo "CheckCredentials: This email is not registered!\n";

            return false;
        }

        if ($user->getPassword() !== $userDto->password) {
            echo "CheckCredentials: Wrong password!\n";

            return false;
        }

        return parent::check($userDto);
    }
}
