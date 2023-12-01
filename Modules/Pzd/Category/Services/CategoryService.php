<?php

namespace Pzd\Category\Services;

use Pzd\Category\Models\Category;

class CategoryService
{
    public function store($request)
    {
        return Category::query()->create([
            'user_id'=> auth()->id(),
            'parent_id' => $request->parent_id ,
            'title' => $request->title ,
            'slug' => $this->makeSlug($request->title) ,
            'keywords' => $request->keywords ,
            'description' => $request->description ,
            'status' => $request->status ,
        ]);
    }

    public function makeSlug($title)
    {
        return str_replace(' ' , '_' ,$title );
    }

    public function update($request, $id)
    {
        return Category::query()->where('id' , $id)->update([
            'user_id'=> auth()->id(),
            'parent_id' => $request->parent_id ,
            'title' => $request->title ,
            'slug' => $this->makeSlug($request->title) ,
            'keywords' => $request->keywords ,
            'description' => $request->description ,
            'status' => $request->status ,

        ]);
    }



}
