<?php

namespace App\Security;

use App\Security\User\UserDto;

abstract class SecurityMiddleware
{
    private ?SecurityMiddleware $next = null;

    /**
     * This method can be used to build a chain of middleware objects.
     */
    public function linkWith(SecurityMiddleware $next): SecurityMiddleware
    {
        $this->next = $next;

        return $next;
    }

    /**
     * Subclasses must override this method to provide their own checks. A
     * subclass can fall back to the parent implementation if it can't process a
     * request.
     */
    public function check(UserDto $user): bool
    {
        if (\is_null($this->next)) {
            return true;
        }

        return $this->next->check($user);
    }
}
