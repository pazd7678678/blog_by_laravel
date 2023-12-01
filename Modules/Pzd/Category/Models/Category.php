<?php

namespace Pzd\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pzd\Article\Models\Article;
use Pzd\User\Models\User;

class Category extends Model
{
    use HasFactory;
    protected  $fillable = ['user_id',
                            'parent_id',
                            'title',
                            'slug',
                            'keywords',
                            'description',
                            'status'];

    // Variables
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

    public static array $statuses = [self::STATUS_ACTIVE , self::STATUS_INACTIVE];

    // Methods

    public static function getStatusCategory()
    {

        return self::$statuses == self::STATUS_ACTIVE ? 'active' : 'inactive';
    }
    public function status()
    {
        return $this->status == 'active' ? 'happy text-success': 'sad text-danger';
    }

    public function getSubCategory()
    {
       if($this->category)
       {
           return $this->category->title;
       }
       return  '...';
    }




    public function path()
    {
        return route('categories.detail',$this->slug);
    }

    //Relations
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public  function category()
    {
        return $this->belongsTo(__CLASS__ , 'parent_id');
    }

    public function categories()
    {
        return $this->hasMany(__CLASS__ , 'parent_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
