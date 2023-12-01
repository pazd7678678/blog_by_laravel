<?php

namespace Pzd\Comment\Repositories;

use Pzd\Comment\Models\Comment;

class CommentRepo
{
    public function index()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->first()->delete();
    }

    public function changeStatus($id, $status)
    {
        $comment=$this->findById($id);
        if ($status == 'inactive') return $comment->update(['status'=>Comment::COMMENT_ACTIVE]);
        if ($status == 'active') return $comment->update(['status'=>Comment::COMMENT_INACTIVE]);

    }
    public function getLatestComments()
    {
        return $this->query()->where('status',Comment::COMMENT_ACTIVE)
            ->limit(4)->latest();
    }


    public function query()
    {
        return Comment::query();
    }




}
