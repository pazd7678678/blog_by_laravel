<?php

namespace Pzd\Category\Repositories;

use Pzd\Category\Models\Category;

class CategoryRepo
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
    public function getActiveCategories()
    {
        return $this->query()->where('status',Category::STATUS_ACTIVE)->latest();
    }
    public function findCategoryBySlug($slug)
    {
        return $this->query()->where('status',Category::STATUS_ACTIVE)
            ->where('slug', $slug)->first();
    }
    public function query()
    {
        return Category::query();
    }




}
