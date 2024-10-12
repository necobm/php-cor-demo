<?php

namespace App\Security;

use App\Security\User\User;
use App\Security\User\UserDto;
use App\Security\User\UserRepository;

/**
 * This Concrete Middleware checks whether a user have Admin role to access restricted sections of the app.
 */
class CheckAdminAccess extends SecurityMiddleware
{
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    public function check(UserDto $userDto): bool
    {
        $user = $this->userRepository->find($userDto->username);
        if (\is_null($user)) {
            echo "CheckAdminAccess: User not found!\n";

            return false;
        }

        if (!in_array(User::ROLE_ADMIN, $user->getRoles())) {
            echo "CheckAdminAccess: Access forbidden!\n";

            return false;
        }

        return parent::check($userDto);
    }
}
