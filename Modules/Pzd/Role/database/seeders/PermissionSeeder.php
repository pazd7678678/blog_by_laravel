<?php

namespace Pzd\Role\database\seeders;

use Illuminate\Database\Seeder;
use Pzd\Role\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run(): void
    {
        foreach (Permission::$permissions as $permission)
        {
            \Spatie\Permission\Models\Permission::findOrCreate($permission);
        }
    }
}
