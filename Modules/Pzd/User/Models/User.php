<?php

namespace Pzd\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Overtrue\LaravelLike\Traits\Liker;
use Pzd\Advertising\Models\Advertising;
use Pzd\Article\Models\Article;
use Pzd\Category\Models\Category;
use Pzd\Comment\Models\Comment;
use Pzd\Role\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles , Liker;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telegram',
        'linkedin',
        'twitter',
        'instagram',
        'bio',
        'imageName',
        'imagePath',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE];

    // methods

    public function  getStatusVerifyEmail()
    {
        return $this->email_verified_at ? 'happy text-success' : 'sad text-danger';
    }

    public function path()
    {
        if($this->hasPermissionTo(Permission::PERMISSION_AUTHORS))
        {
            return route('users.author',$this->id);
        }
    }
    public function image()
    {
        return asset('assets/imgs/authors/author-2.png');
    }

    // Relations

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class );
    }
    public function advertisings()
    {
        return $this->hasMany(Advertising::class );
    }
}
