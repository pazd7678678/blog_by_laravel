<?php

namespace Pzd\Share\Services;

use Illuminate\Support\Facades\Storage;

class ShareService
{

    public static function uploadImage( $file)
    {
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('images', $file , $imageName);
        $imagePath = asset('storage/images/' . $imageName);
        return [$imageName , $imagePath];
    }
    public static function deleteImage($article)
    {
        if(Storage::disk('public')->exists(base_path($article->imagename)))
        {
            return  Storage::disk('public')->deleteDirectory('images');
        }
        return null;
    }


}
