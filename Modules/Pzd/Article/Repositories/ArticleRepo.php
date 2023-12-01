<?php

namespace Pzd\Article\Repositories;

use Pzd\Article\Models\Article;

class ArticleRepo
{
    public function index()
    {
        return $this->query()->latest();
    }
    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }
    public function delete($id)
    {
        return $this->query()->where('id' , $id)->delete();
    }
    public function findBySlug($slug)
    {
        return $this->query()->where('slug', $slug)->first();
    }
    public function getRelatedPosts($article)
    {
        return $this->query()->where('status',Article::STATUS_ACTIVE)
            ->where('id' , '!=', $article->id)
            ->where('category_id' ,$article->category->id)->limit(3)->latest();
    }
    public function home()
    {
        return $this->query()->where('status', Article::STATUS_ACTIVE)
            ->latest();
    }
    public function getArticlesByView()
    {
        return $this->query()->where('status', Article::STATUS_ACTIVE)->orderByViews();

    }
    public function getArticlesByCategoryId($categoryId)
    {
        return $this->query()->where('status',Article::STATUS_ACTIVE)
            ->where('category_id', $categoryId)->latest();
    }
    public function query()
    {
        return Article::query();
    }




}
