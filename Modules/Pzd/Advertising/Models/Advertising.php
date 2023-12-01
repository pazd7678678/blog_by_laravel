<?php

namespace Pzd\Advertising\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pzd\User\Models\User;

class Advertising extends Model
{
    use HasFactory;

    protected  $fillable = ['user_id',
                            'title',
                            'link',
                            'imagePath',
                            'imageName',
                            'locations'
    ];

    // Variables

    public const LOCATION_TO_MAIN_PAGE = 'location top main page';
    public const LOCATION_BOTTOM_MAIN_PAGE = 'location bottom main page';
    public const LOCATION_DETAIL_ARTICLE = 'location detail article';


    public static array $locations = [
        self::LOCATION_TO_MAIN_PAGE ,
        self::LOCATION_BOTTOM_MAIN_PAGE ,
        self::LOCATION_DETAIL_ARTICLE
    ];




    // Relations
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }


    // Methods


}
