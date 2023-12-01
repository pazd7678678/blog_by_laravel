<?php

namespace Pzd\Comment\Services;

use Pzd\Comment\Models\Comment;
use Pzd\Role\Models\Permission;

class CommentService
{

    public function store($request)
    {
        return Comment::query()->create([
            'user_id' => auth()->id(),
            'commentable_id' => $request->commentable_id ,
            'commentable_type' => $request->commentable_type,
            'body' => $request->body,
            'status' => $this->setStatus($request->status),

        ]);
    }

    private function setStatus($status)
    {
        if(auth()->user()->hasPermissionTo(Permission::PERMISSION_SUPER_ADMIN))
        {
          return Comment::COMMENT_ACTIVE;
        }
        return Comment::COMMENT_INACTIVE;
    }

}
