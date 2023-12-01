<?php

namespace Pzd\Comment\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pzd\User\Models\User;

class Comment extends Model
{
    use HasFactory ;

    protected $fillable = [
        'user_id',
        'comment_id',
        'commentable_id',
        'commentable_type',
        'status',
        'body',
    ];

    // Variables
    public const COMMENT_ACTIVE = 'active';
    public const COMMENT_INACTIVE = 'inactive';

    public static array $statuses = [ self::COMMENT_ACTIVE  , self::COMMENT_INACTIVE];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function comment()
    {
        return $this->belongsTo(__CLASS__ , 'comment_id');
    }

    public function comments()
    {
        return $this->hasMany(__CLASS__ , 'comment_id');
    }


    public function commentable()
    {
        return $this->morphTo();
    }


    // Methods
    public function getStatusComment()
    {
        if($this->status == 'active') return 'happy text-success';
        if($this->status == 'inactive') return  'sad text-danger';
    }



}
