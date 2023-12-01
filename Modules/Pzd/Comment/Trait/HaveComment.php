<?php

namespace Pzd\Comment\Trait;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Pzd\Comment\Models\Comment;

trait HaveComment
{
    use HasRelationships;

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }
    public function activeComments()
    {
        return $this->morphMany(Comment::class , 'commentable')
            ->where('status', Comment::COMMENT_ACTIVE)
            ->with('comments')
            ->whereNull('comment_id');
    }
}
