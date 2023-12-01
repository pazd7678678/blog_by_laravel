<?php

namespace Pzd\Panel\Policies;

use Pzd\Role\Models\Permission;
use Pzd\User\Models\User;

class PanelPolicy
{

    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        return $user->hasPermissionTo(Permission::PERMISSION_PANEL) ? true : null;
    }
}
