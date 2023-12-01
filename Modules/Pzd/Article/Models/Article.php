<?php

namespace Pzd\Article\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;
use Pzd\Category\Models\Category;
use Pzd\Comment\Trait\HaveComment;
use Pzd\User\Models\User;

class Article extends Model implements Viewable
{
    use HasFactory ,InteractsWithViews , Likeable, HaveComment;

    // Variables
    protected $fillable = [
                'user_id' ,
                'category_id' ,
                'title' ,
                'slug' ,
                'time_to_read' ,
                'imageName' ,
                'imagePath' ,
                'score' ,
                'status' ,
                'type' ,
               'description',
               'keywords',
                'body' ] ;


    public const STATUS_ACTIVE = 'active' ;
    public const  STATUS_INACTIVE = 'inactive';

    public const STATUS_PENDING = 'pending';

    public const TYPE_NORMAL = 'normal';
    public const TYPE_VIP = 'vip';
    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE , self::STATUS_PENDING] ;
    public static array $types = [self::TYPE_NORMAL , self::TYPE_VIP] ;



    //Relation

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }


    // Methods

    public function cssStatus()
    {

        if($this->status == 'active') return 'happy text-success';
        if($this->status == 'inactive') return 'sad text-danger';
        return 'sad text-warning';

    }

    public function path()
    {
        return route('articles.details', $this->slug);
    }

    public function getCommentCount()
    {
        if(! is_null($this->comments))
        {
            return $this->comments->count();
        }
        return 0;

    }




}



