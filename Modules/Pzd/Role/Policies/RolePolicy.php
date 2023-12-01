<?php

namespace Pzd\Role\Policies;

use Pzd\Role\Models\Permission;
use Pzd\User\Models\User;

class RolePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index(User  $user)
    {
        return $user->hasPermissionTo(Permission::PERMISSION_ROLES) ? true : null ;
    }
}
