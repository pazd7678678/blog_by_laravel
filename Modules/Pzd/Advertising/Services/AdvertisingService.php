<?php

namespace Pzd\Advertising\Services;

use Pzd\Advertising\Models\Advertising;

class AdvertisingService
{
    public function store($request,$imageName, $imagePath)
    {
        return Advertising::query()->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'link' => $request->link,
            'imageName' => $imageName,
            'imagePath' => $imagePath,
            'location' => $request->location


        ]);

    }

    public function update($request , $id,$imageName, $imagePath)
    {
        return Advertising::query()->where('id',$id)->update([
            'title' => $request->title,
            'link' => $request->link,
            'imageName' => $imageName,
            'imagePath' => $imagePath,
            'location' => $request->location



        ]);

    }

}
