<?php

namespace Pzd\User\Repositories\Home;

use Pzd\Role\Models\Permission;
use Pzd\User\Models\User;

class UserRepo
{
    public function getAllAuthours()
    {
        return $this->query()->permission(Permission::PERMISSION_AUTHORS)->latest();
    }

    public function findAuthorById($id)
    {
        return $this->query()->findOrFail($id);
    }

    private function query()
    {
        return User::query();
    }



}
