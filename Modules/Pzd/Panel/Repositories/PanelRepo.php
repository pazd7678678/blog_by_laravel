<?php

namespace Pzd\Panel\Repositories;

use Pzd\Advertising\Models\Advertising;
use Pzd\Article\Models\Article;
use Pzd\Category\Models\Category;
use Pzd\Role\Models\Permission;
use Pzd\User\Models\User;

class PanelRepo
{

    public function countUsers()
    {
        return User::query()->where('status', User::STATUS_ACTIVE)->count();
    }

    public function countUsersToday()
    {
        return User::query()->where('status', User::STATUS_ACTIVE)->whereDay('created_at', now()->day)->count();
    }

    public function articleCount()
    {
        return Article::query()->where('status',Article::STATUS_ACTIVE)->count();
    }
    public function articleCountToday()
    {
        return Article::query()->where('status',Article::STATUS_ACTIVE)->whereDay('created_at', now()->day)->count();
    }
    public function countCategory()
    {
        return Category::query()->where('status',Category::STATUS_ACTIVE)->count();
    }
    public function countCategoryToday()
    {
        return Category::query()->where('status',Category::STATUS_ACTIVE)->whereDay('created_at', now()->day)->count();
    }
    public function countAdvertising()
    {
        return Advertising::query()->count();
    }
    public function countAdvertisingToday()
    {
        return Advertising::query()->whereDay('created_at', now()->day)->count();
    }
    public function getlatestAuthors()
    {
        return User::query()->where('status',User::STATUS_ACTIVE)->permission(Permission::PERMISSION_AUTHORS)->latest()->limit(4)->get();
    }
}

