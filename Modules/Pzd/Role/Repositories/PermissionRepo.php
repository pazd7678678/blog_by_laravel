<?php

namespace Pzd\Role\Repositories;

use Spatie\Permission\Models\Permission;

class PermissionRepo
{

    public function all()
    {
        return $this->query()->latest()->get();
    }
    public function query()
    {
        return Permission::query();
    }

}
