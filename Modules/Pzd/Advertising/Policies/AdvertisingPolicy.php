<?php

namespace Pzd\Advertising\Policies;

use Pzd\Role\Models\Permission;

class AdvertisingPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return auth()->user()->hasPermissionTo(Permission::PERMISSION_ADVERTISING) ? true : null;
    }
}
