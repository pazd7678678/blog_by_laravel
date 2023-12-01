<?php

namespace Pzd\Home\Repositories;

use Pzd\Article\Models\Article;
use Pzd\Category\Models\Category;
use Pzd\Role\Models\Permission;
use Pzd\User\Models\User;

class HomeRepo
{

    public function vip_posts()
    {
        return Article::query()->where('status',Article::STATUS_ACTIVE)
            ->where('type',Article::TYPE_VIP)->latest();
    }

    public function getActiveCategories()
    {
        return Category::query()->where('status', Category::STATUS_ACTIVE)
            ->latest();
    }
    public function getVipArticlesOrderByView()
    {
        return Article::query()->where('type', Article::TYPE_VIP)
            ->where('status', Category::STATUS_ACTIVE)
            ->orderByViews()->latest()->limit(4)->get();
    }
    public function geyAuthorsUsers()
    {
        return User::query()->permission(Permission::PERMISSION_AUTHORS)
            ->limit(20)->latest()->get();
    }

    public function getArticlesOrderByView()
    {
        return Article::query()->where('type', Article::TYPE_NORMAL)
            ->where('status', Category::STATUS_ACTIVE)
            ->orderByViews()->latest()->limit(3)->get();
    }
    public function getLatestArticles()
    {
        return Article::query()->where('status' , Article::STATUS_ACTIVE)
            ->where('type' , Article::TYPE_NORMAL)
            ->latest()->paginate(5);
    }


}
