<?php

namespace Pzd\Category\Policies;

use Pzd\Role\Models\Permission;
use Pzd\User\Models\User;

class CategoryPolicy
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
        return $user->hasPermissionTo(Permission::PERMISSION_CATEGORIES) ? true : null;
    }
}
