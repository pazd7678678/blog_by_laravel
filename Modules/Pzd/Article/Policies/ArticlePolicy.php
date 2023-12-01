<?php

namespace Pzd\Article\Policies;

use Pzd\Role\Models\Permission;
use Pzd\User\Models\User;

class ArticlePolicy
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
        return $user->hasPermissionTo(Permission::PERMISSION_ARTICLES) ? true : null ;
    }
}
