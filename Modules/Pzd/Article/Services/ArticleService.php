<?php

namespace Pzd\Article\Services;

use Pzd\Article\Models\Article;

class ArticleService
{
    public function store($request,$userId, $imageName , $imagePath)
    {
        Article::query()->create([
            'user_id' => $userId,
            'category_id' => $request-> category_id ,
            'title' => $request-> title ,
            'slug' => $this->makeSlug($request->title) ,
            'time_to_read' => $request-> time_to_read ,
            'imageName' => $imageName,
            'imagePath' => $imagePath ,
            'score' => $request-> score ,
            'status' => $request-> status ,
            'type' => $request-> type ,
            'description' => $request-> description ,
            'keywords' => $request->keywords ,
            'body' => $request-> body ,
        ]);
    }

    public function update($request , $id , $imageName,$imagePath)
    {
        return Article::query()->where('id' , $id)->update([
            'category_id' => $request-> category_id ,
            'title' => $request-> title ,
            'slug' => $this->makeSlug($request->title) ,
            'time_to_read' => $request-> time_to_read ,
            'imageName' => $imageName,
            'imagePath' => $imagePath ,
            'score' => $request-> score ,
            'status' => $request-> status ,
            'type' => $request-> type ,
            'description' => $request-> description ,
            'keywords' => $request->keywords ,
            'body' => $request-> body ,
        ]);
    }


    public function makeSlug($title)
    {
        return str_replace(' ' , '_' , $title);
    }


}
