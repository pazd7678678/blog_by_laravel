<?php

namespace Pzd\User\Policies;

use Pzd\Role\Models\Permission;
use Pzd\User\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        return $user->hasPermissionTo(Permission::PERMISSION_USERS) ? true : null ;
    }
}
